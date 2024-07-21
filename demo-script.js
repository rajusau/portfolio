// script.js

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('contact-form');

    form.addEventListener('submit', (event) => {
        event.preventDefault(); // Prevent the form from submitting normally

        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const suggestion = document.getElementById('suggestion').value;

        if (name && email && suggestion) {
            alert(`Thank you, ${name}! Your suggestion has been received.`);
            form.reset(); // Clear the form
        } else {
            alert('Please fill in all fields.');
        }
    });
});
