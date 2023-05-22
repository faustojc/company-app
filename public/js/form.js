document.querySelector("#submit").addEventListener('click', () => {
    const forms = document.querySelectorAll(".needs-validation");

    forms.forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            if (!form.classList.contains('was-validated')) {
                form.classList.add('was-validated');
            }
        }, false);
    });
});
