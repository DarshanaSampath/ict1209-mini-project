document.addEventListener("DOMContentLoaded", function () {
    const contactForm = document.getElementById("contactForm");
    const nameInput = document.getElementById("name");
    const emailInput = document.getElementById("email");
    const messageInput = document.getElementById("message");

    // Helper function to show error
    function showError(input, message) {
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        let errorDiv = input.nextElementSibling;
        if (!errorDiv || !errorDiv.classList.contains("invalid-feedback")) {
            errorDiv = document.createElement("div");
            errorDiv.className = "invalid-feedback";
            input.parentNode.insertBefore(errorDiv, input.nextSibling);
        }
        errorDiv.innerText = message;
    }

    // Helper function to show success
    function showSuccess(input) {
        input.classList.remove("is-invalid");
        input.classList.add("is-valid");
    }

    // Real-time Email Validation
    emailInput.addEventListener("input", function () {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailInput.value.trim() === "") {
            showError(emailInput, "Email address is required.");
        } else if (!emailPattern.test(emailInput.value.trim())) {
            showError(emailInput, "Please enter a valid email address (e.g., name@example.com).");
        } else {
            showSuccess(emailInput);
        }
    });

    // Real-time Name Validation
    nameInput.addEventListener("input", function () {
        if (nameInput.value.trim().length < 3) {
            showError(nameInput, "Name must be at least 3 characters long.");
        } else {
            showSuccess(nameInput);
        }
    });

    // Real-time Message Validation
    messageInput.addEventListener("input", function () {
        if (messageInput.value.trim().length < 10) {
            showError(messageInput, "Message must be at least 10 characters long.");
        } else {
            showSuccess(messageInput);
        }
    });

    // Form Submit Event
    contactForm.addEventListener("submit", function (e) {
        e.preventDefault(); // Prevent default submission for now
        
        // Trigger all inputs to validate
        let isValid = true;
        
        if (nameInput.value.trim().length < 3) {
            showError(nameInput, "Name must be at least 3 characters long.");
            isValid = false;
        }
        
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(emailInput.value.trim())) {
            showError(emailInput, "Please enter a valid email address.");
            isValid = false;
        }
        
        if (messageInput.value.trim().length < 10) {
            showError(messageInput, "Message must be at least 10 characters long.");
            isValid = false;
        }

        if (isValid) {
            alert("Thank you! Your message has been sent successfully.");
            contactForm.reset();
            // Remove validation classes after reset
            nameInput.classList.remove("is-valid");
            emailInput.classList.remove("is-valid");
            messageInput.classList.remove("is-valid");
        }
    });
});
