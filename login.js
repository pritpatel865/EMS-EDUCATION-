document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission
    
    const userType = document.getElementById("userType");
    const username = document.getElementById("username");
    const password = document.getElementById("password");

    
    document.addEventListener('DOMContentLoaded', () => {
        const createAccountLink = document.getElementById('createAccountLink');
        const backToLoginLink = document.getElementById('backToLoginLink');
        const loginForm = document.getElementById('loginForm');
        const createAccountForm = document.getElementById('createAccountForm');
    
        createAccountLink.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent the default link behavior
            loginForm.style.display = 'none'; // Hide login form
            createAccountForm.style.display = 'block'; // Show create account form
        });
    
        backToLoginLink.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent the default link behavior
            createAccountForm.style.display = 'none'; // Hide create account form
            loginForm.style.display = 'block'; // Show login form
        });
    });
    
    // Check if any field is empty
    if (userType.value === "" || username.value === "" || password.value === "") {
        alert("Please fill in all fields");
        
        // Focus on the first empty field
        if (userType.value === "") {
            userType.focus();
        } else if (username.value === "") {
            username.focus();
        } else {
            password.focus();
        }
        
        return;
    }
    

});
