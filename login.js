document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission
    
    const userType = document.getElementById("userType");
    const username = document.getElementById("username");
    const password = document.getElementById("password");
    
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
