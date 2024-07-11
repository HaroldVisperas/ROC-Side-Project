function makeEditable(button) {
    const row = button.closest('tr');
    const cells = row.querySelectorAll('td');

    // Disable all Edit buttons except for the current one
    const editButtons = document.querySelectorAll('.btn.green');
    editButtons.forEach(btn => btn.disabled = true);
    button.disabled = false;

    // Change the button text to "Save" and update its onclick handler
    button.innerText = 'Save';
    button.setAttribute('onclick', 'saveRow(this)');

    // Make Employee ID, Position, and Affiliation editable (index 0, 2, 3)
    for (let i = 0; i < cells.length - 1; i++) {
        if (i === 1) continue; // Skip Full Name
        const cell = cells[i];
        const currentValue = cell.innerText;
        const input = document.createElement('input');
        input.value = currentValue;
        input.className = 'form-control form-control-sm';
        cell.innerText = '';
        cell.appendChild(input);
    }
}

function saveRow(button) {
    const row = button.closest('tr');
    const cells = row.querySelectorAll('td');

    // Save the input values back to the cell text
    for (let i = 0; i < cells.length - 1; i++) {
        if (i === 1) continue; // Skip Full Name
        const cell = cells[i];
        const input = cell.querySelector('input');
        if (input) {
            cell.innerText = input.value;
        }
    }

    // Change the button text back to "Edit" and update its onclick handler
    button.innerText = 'Edit';
    button.setAttribute('onclick', 'makeEditable(this)');

    // Re-enable all Edit buttons
    const editButtons = document.querySelectorAll('.btn.green');
    editButtons.forEach(btn => btn.disabled = false);
}