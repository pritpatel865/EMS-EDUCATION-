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

document.addEventListener('DOMContentLoaded', function() {
    const userTypeSelect = document.getElementById('newUserType');
    const studentFields = document.getElementById('studentFields');
    const parentFields = document.getElementById('parentFields');
    const facultyFields = document.getElementById('facultyFields');
    const adminFields = document.getElementById('adminFields');

    userTypeSelect.addEventListener('change', function() {
        // Hide all conditional fields initially
        studentFields.classList.add('hidden');
        parentFields.classList.add('hidden');
        facultyFields.classList.add('hidden');
        adminFields.classList.add('hidden');

        // Reset required attributes
        resetRequiredAttributes();

        // Show the relevant fields based on selected user type
        switch (userTypeSelect.value) {
            case 'Student':
                studentFields.classList.remove('hidden');
                setRequiredAttributes(studentFields, true);
                break;
            case 'Parent':
                parentFields.classList.remove('hidden');
                setRequiredAttributes(parentFields, true);
                break;
            case 'Faculty':
                facultyFields.classList.remove('hidden');
                setRequiredAttributes(facultyFields, true);
                break;
            case 'Admin':
                adminFields.classList.remove('hidden');
                setRequiredAttributes(adminFields, true);
                break;
        }
    });

    // Reset all required attributes for hidden fields
    function resetRequiredAttributes() {
        const allFields = [studentFields, parentFields, facultyFields, adminFields];
        allFields.forEach(fieldGroup => {
            const inputs = fieldGroup.querySelectorAll('input, select');
            inputs.forEach(input => {
                input.required = false; // Remove required attribute
            });
        });
    }

    // Set required attributes for visible fields
    function setRequiredAttributes(fieldGroup, required) {
        const inputs = fieldGroup.querySelectorAll('input, select');
        inputs.forEach(input => {
            input.required = required; // Set required attribute based on visibility
        });
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