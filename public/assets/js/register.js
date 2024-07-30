document.addEventListener("DOMContentLoaded", function() {
    const phoneInputField = document.getElementById("mobileNumber");
    const fullMobileNumberInput = document.getElementById("fullMobileNumber");

    const phoneInput = window.intlTelInput(phoneInputField, {
        initialCountry: "auto",
        geoIpLookup: function(success, failure) {
            fetch('https://ipinfo.io?token=<your_token>')
                .then(response => response.json())
                .then(data => success(data.country))
                .catch(() => success('US'));
        },
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@23.1.0/build/js/utils.js",
    });

    document.querySelector("form").addEventListener("submit", function(event) {
        if (!phoneInput.isValidNumber()) {
            alert("Invalid phone number. Please try again.");
            event.preventDefault();
        } else {
            const fullNumber = phoneInput.getNumber();
            fullMobileNumberInput.value = fullNumber;
        }
    });
});