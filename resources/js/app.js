document.querySelectorAll('[data-toggle-password]').forEach((button) => {
    button.addEventListener('click', () => {
        const input = document.getElementById(button.dataset.togglePassword);
        const show = input.type === 'password';

        input.type = show ? 'text' : 'password';
        button.querySelector('[data-icon-eye]').classList.toggle('hidden', show);
        button.querySelector('[data-icon-eye-off]').classList.toggle('hidden', !show);
        button.setAttribute('aria-label', show ? 'Ocultar senha' : 'Mostrar senha');
    });
});

document.querySelectorAll('[data-file-drop]').forEach((wrapper) => {
    const dropzone = wrapper.querySelector('[data-dropzone]');
    const input = wrapper.querySelector('[data-file-input]');
    const emptyState = wrapper.querySelector('[data-empty-state]');
    const filledState = wrapper.querySelector('[data-filled-state]');
    const fileName = wrapper.querySelector('[data-file-name]');
    const removeButton = wrapper.querySelector('[data-remove-file]');
    const activeClasses = (wrapper.dataset.activeClass ?? '').split(' ').filter(Boolean);

    const setFilled = (filled, name = '') => {
        emptyState.style.display = filled ? 'none' : 'flex';
        filledState.style.display = filled ? 'flex' : 'none';
        fileName.textContent = name;
        document.dispatchEvent(new CustomEvent('audit-files-changed'));
    };

    input.addEventListener('change', () => {
        const file = input.files[0];
        setFilled(Boolean(file), file ? file.name : '');
    });

    ['dragenter', 'dragover'].forEach((event) => {
        dropzone.addEventListener(event, (e) => {
            e.preventDefault();
            dropzone.classList.add(...activeClasses);
        });
    });

    ['dragleave', 'drop'].forEach((event) => {
        dropzone.addEventListener(event, (e) => {
            e.preventDefault();
            dropzone.classList.remove(...activeClasses);
        });
    });

    dropzone.addEventListener('drop', (e) => {
        const file = e.dataTransfer.files[0];

        if (file) {
            input.files = e.dataTransfer.files;
            input.dispatchEvent(new Event('change'));
        }
    });

    removeButton.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        input.value = '';
        setFilled(false);
    });
});

const submitAuditButton = document.querySelector('[data-submit-audit]');

if (submitAuditButton) {
    const auditFileInputs = document.querySelectorAll('[data-file-drop] [data-file-input]');

    const refreshSubmitState = () => {
        submitAuditButton.disabled = ![...auditFileInputs].every((input) => input.files.length > 0);
    };

    document.addEventListener('audit-files-changed', refreshSubmitState);
    refreshSubmitState();
}
