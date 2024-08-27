// resources/js/form-validation.js

document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form'); // Adjust selector based on your form
    if (form) {
        form.addEventListener('submit', function (event) {
            // Get all checkboxes with the class 'is-true-checkbox'
            const checkboxes = document.querySelectorAll('.is-true-checkbox');
            let checkedCount = 0;

            checkboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    checkedCount++;
                }
            });

            if (checkedCount > 1) {
                event.preventDefault(); // Prevent form submission
                alert('Only one answer can be marked as true.'); // Show alert or use a more user-friendly message
            }
        });
    }
});
