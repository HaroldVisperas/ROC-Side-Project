function editButton(editButtonId, deleteButtonId, saveButtonId, cancelButtonId, 
    displayEmployeeId, editEmployeeId, displayPosition, editPosition) {
    const editButton = document.getElementById(editButtonId);
    const row = editButton.closest('tr');
    const cells = row.querySelectorAll('td');

    // Disable all Edit buttons except for the current one
    const editButtons = document.querySelectorAll('.btn.orange');
    editButtons.forEach(btn => btn.disabled = true);
    const deleteButtons = document.querySelectorAll('.btn.blue');
    deleteButtons.forEach(btn => btn.disabled = true);
    editButton.disabled = false;
    editButton.style.display = 'none';
    document.getElementById(deleteButtonId).style.display = 'none';
    document.getElementById(saveButtonId).style.display = 'inline-block';
    document.getElementById(cancelButtonId).style.display = 'inline-block';
    
    document.getElementById(displayEmployeeId).style.display = 'none';
    document.getElementById(editEmployeeId).style.display = 'inline-block';
    document.getElementById(displayPosition).style.display = 'none';
    document.getElementById(editPosition).style.display = 'inline-block';
}

function saveButton(editButtonId, deleteButtonId, saveButtonId, cancelButtonId, 
    displayEmployeeId, editEmployeeId, displayPosition, editPosition) {
    const saveButton = document.getElementById(saveButtonId);
    const row = saveButton.closest('tr');
    const cells = row.querySelectorAll('td');

    // Re-enable all Edit buttons
    const editButtons = document.querySelectorAll('.btn.orange');
    editButtons.forEach(btn => btn.disabled = false);
    const deleteButtons = document.querySelectorAll('.btn.blue');
    deleteButtons.forEach(btn => btn.disabled = false);

    // Change the button text back to "Edit" and update its onclick handler
    document.getElementById(editButtonId).style.display = 'inline-block';
    document.getElementById(deleteButtonId).style.display = 'inline-block';
    saveButton.style.display = 'none';
    document.getElementById(cancelButtonId).style.display = 'none';
    
    document.getElementById(displayEmployeeId).style.display = 'inline-block';
    document.getElementById(editEmployeeId).style.display = 'none';
    document.getElementById(displayPosition).style.display = 'inline-block';
    document.getElementById(editPosition).style.display = 'none';
}