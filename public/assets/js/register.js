document.addEventListener("DOMContentLoaded", function() {
    const nextButton = document.getElementById("next");
    const previousButton = document.getElementById("previous");
    const firstFormDiv = document.getElementById("firstPage");
    const secondFormDiv = document.getElementById("secondPage");

    const firstNameInput = document.getElementById("firstname");
    const lastNameInput = document.getElementById("lastname");
    const emailInput = document.getElementById("email");
    const phoneNumInput = document.getElementById("phone_num");
    const fullMobileNumberInput = document.getElementById("fullMobileNumber");
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("password_confirmation");

    const form = document.getElementById("registerForm");
    const message = document.getElementById("errorMessage");

    // Initialize intlTelInput with geoIpLookup and utilsScript
    const phoneInput = window.intlTelInput(phoneNumInput, {
        initialCountry: "auto",
        geoIpLookup: function(success, failure) {
            fetch('https://ipinfo.io?token=<your_token>')
                .then(response => response.json())
                .then(data => success(data.country))
                .catch(() => success('US'));
        },
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@23.1.0/build/js/utils.js",
    });

    secondFormDiv.style.display = "none";

    nextButton.addEventListener("click", function(event) {
        firstFormDiv.style.display = "none";
        secondFormDiv.style.display = "block";
    });

    previousButton.addEventListener("click", function(event) {
        secondFormDiv.style.display = "none";
        firstFormDiv.style.display = "block";
    });

    form.addEventListener("submit", function(event) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Simple email regex for demonstration

        if (!firstNameInput.value) {
            message.innerHTML = "First name is required. Please try again.";
            event.preventDefault();
        } else if (!lastNameInput.value) {
            message.innerHTML = "Last name is required. Please try again.";
            event.preventDefault();
        } else if (!emailRegex.test(emailInput.value)) {
            message.innerHTML = "Invalid email format. Please try again.";
            event.preventDefault();
        } else if (!phoneInput.isValidNumber()) {
            alert("Invalid phone number. Please try again.");
            event.preventDefault();
        } else if (passwordInput.value.length < 8) {
            message.innerHTML = "Password must be at least 8 characters long. Please try again.";
            event.preventDefault();
        } else if (passwordInput.value !== confirmPasswordInput.value) {
            message.innerHTML = "Passwords do not match. Please try again.";
            event.preventDefault();
        } else {
            // Set the full phone number value
            const fullNumber = phoneInput.getNumber();
            fullMobileNumberInput.value = fullNumber;
        }
    });
});
