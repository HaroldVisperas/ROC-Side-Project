document.addEventListener("DOMContentLoaded", () => {
    const todos = document.querySelectorAll(".todo");
    const allStatus = document.querySelectorAll(".kanban-space");
    let draggableTodo = null;

    todos.forEach((todo) => {
        todo.addEventListener("dragstart", dragStart);
        todo.addEventListener("dragend", dragEnd);
        const btnClose = todo.querySelector(".btn-close");
        btnClose.addEventListener("click", deleteTodo);
    });

    function dragStart() {
        draggableTodo = this;
    }

    function dragEnd() {
        draggableTodo = null;
    }

    allStatus.forEach((status) => {
        status.addEventListener("dragover", dragOver);
        status.addEventListener("dragenter", dragEnter);
        status.addEventListener("dragleave", dragLeave);
        status.addEventListener("drop", dragDrop);
    });

    function dragOver(e) {
        e.preventDefault();
    }

    function dragEnter() {
        this.style.border = "1px dashed #ccc";
    }

    function dragLeave() {
        this.style.border = "none";
    }

    function dragDrop() {
        this.style.border = "none";
        this.appendChild(draggableTodo);
        const taskId = draggableTodo.getAttribute('data-id');
        const status = this.classList.contains('bg-todo') ? 'todo' :
                      this.classList.contains('bg-working') ? 'working' :
                      this.classList.contains('bg-approval') ? 'approval' : 'done';

        fetch(`/brand/tasks/update/${taskId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ status })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data.message);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    const todoSubmit = document.getElementById("todoSubmit");
    todoSubmit.addEventListener("click", createTodo);

    function createTodo() {
        const todoInput = document.getElementById("todoInput");
        const inputVal = todoInput.value.trim();

        if (inputVal === '') {
            event.preventDefault();
            alert('Please enter a task.');
            return;
        }

        fetch('/brand/tasks/store', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ title: inputVal })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const todoDiv = document.createElement("div");
                todoDiv.setAttribute('data-id', data.task.id);
                todoDiv.appendChild(document.createTextNode(data.task.title));
                todoDiv.classList.add("todo", "bg-white", "p-3", "mb-2", "border", "rounded");
                todoDiv.setAttribute("draggable", "true");

                const btnClose = document.createElement("button");
                btnClose.classList.add("btn-close");
                btnClose.setAttribute("aria-label", "Close");

                todoDiv.appendChild(btnClose);

                document.querySelector(".bg-todo .kanban-space").appendChild(todoDiv);

                btnClose.addEventListener("click", deleteTodo);

                todoDiv.addEventListener("dragstart", dragStart);
                todoDiv.addEventListener("dragend", dragEnd);

                todoInput.value = "";
                const todoModal = bootstrap.Modal.getInstance(document.getElementById('todoModal'));
                todoModal.hide();
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    function deleteTodo() {
        const todoDiv = this.parentElement;
        const taskId = todoDiv.getAttribute('data-id');

        fetch(`/brand/tasks/delete/${taskId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                todoDiv.remove();
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
});
