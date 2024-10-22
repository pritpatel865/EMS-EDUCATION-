document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission
    
    //code on submit click

});

document.getElementById('registrationForm').addEventListener('submit', function(event) {
    
    const passwordInput = document.getElementById('newPassword');
    const confirmPasswordInput = document.getElementById('confirmPassword');

    if (passwordInput.value !== confirmPasswordInput.value) {
        alert("Passwords do not match. Please try again.");
        confirmPasswordInput.focus();
        event.preventDefault();
    } else {
        alert("account has been created");
        document.getElementById("registrationForm").classList.add("hidden"); // Hide registration form
        document.getElementById("loginForm").classList.remove("hidden"); // Show login form
    }

});

// Show registration form and hide login form
document.getElementById("create-account-link").addEventListener("click", function(event) {
    event.preventDefault(); // Prevent default anchor behavior
    document.getElementById("loginForm").classList.add("hidden"); // Hide login form
    document.getElementById("registrationForm").classList.remove("hidden"); // Show registration form
    document.getElementById("login-containerId").classList.add("hidden");
    document.getElementById("register-containerId").classList.remove("hidden");
});

// Show login form and hide registration form
document.getElementById("backToLoginLink").addEventListener("click", function(event) {
    event.preventDefault(); // Prevent default anchor behavior
    document.getElementById("registrationForm").classList.add("hidden"); // Hide registration form
    document.getElementById("loginForm").classList.remove("hidden"); // Show login form
    document.getElementById("login-containerId").classList.remove("hidden");
    document.getElementById("register-containerId").classList.add("hidden");
});