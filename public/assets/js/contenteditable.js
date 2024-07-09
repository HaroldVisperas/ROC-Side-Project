
document.querySelectorAll('.edit-icon').forEach(icon => {
    icon.addEventListener('click', function () {
        const td = this.closest('tr').querySelector('td.text-end');
        td.setAttribute('contenteditable', td.getAttribute('contenteditable') === 'true' ? 'false' : 'true');
        td.focus();
    });
});