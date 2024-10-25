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


//student update branch option according to the institute
function stuUpdateBranchOption() {
    const instituteSelect = document.getElementById("institute");
    const branchSelect = document.getElementById("stubranch");
    const selectedInstitute = instituteSelect.value;
    
    // Clear the previous branch options
    branchSelect.innerHTML = "";

    // Populate branch options based on the selected institute
    if (selectedInstitute === "Institute 1") {
        branchSelect.innerHTML = `
            <option value="" disabled selected>Select Branch</option>
            <option value="comp">Computer Engineering</option>
            <option value="it">Information Technology</option>
            <option value="mech">Mechanical Engineering</option>
            <option value="civil">Civil Engineering</option>
            <option value="ele">Electrical Engineering</option>
            <option value="cse">Computer Science and Engineering</option>
        `;
    } else if (selectedInstitute === "Institute 2") {
        branchSelect.innerHTML = `
            <option value="" disabled selected>Select Branch</option>
            <option value="bcom">B.Com</option>
            <option value="mcom">M.Com</option>
            <option value="bba">BBA</option>
            <option value="mba">MBA</option>
        `;
    } else if (selectedInstitute === "Institute 3") {
        branchSelect.innerHTML = `
            <option value="" disabled selected>Select Branch</option>
            <option value="bsc">B.Sc</option>
            <option value="msc">M.Sc</option>
        `;
    } else if (selectedInstitute === "Institute 4") {
        branchSelect.innerHTML = `
            <option value="" disabled selected>Select Branch</option>
            <option value="bpharm">B.Pharm</option>
            <option value="mpharm">M.Pharm</option>
        `;
    } else {
        // Default option if no institute is selected
        branchSelect.innerHTML = `<option value="">Select Branch</option>`;
    }
}

//faculty update department option according to the institute
function facUpdateBranchOption() {
    const instituteSelect = document.getElementById("facInstitute");
    const branchSelect = document.getElementById("facDepartment");
    const selectedInstitute = instituteSelect.value;
    
    // Clear the previous branch options
    branchSelect.innerHTML = "";

    // Populate branch options based on the selected institute
    if (selectedInstitute === "Institute 1") {
        branchSelect.innerHTML = `
            <option value="" disabled selected>Select Department</option>
            <option value="comp">Computer Engineering</option>
            <option value="it">Information Technology</option>
            <option value="mech">Mechanical Engineering</option>
            <option value="civil">Civil Engineering</option>
            <option value="ele">Electrical Engineering</option>
            <option value="cse">Computer Science and Engineering</option>
        `;
    } else if (selectedInstitute === "Institute 2") {
        branchSelect.innerHTML = `
            <option value="" disabled selected>Select Department</option>
            <option value="bcom">B.Com</option>
            <option value="mcom">M.Com</option>
            <option value="bba">BBA</option>
            <option value="mba">MBA</option>
        `;
    } else if (selectedInstitute === "Institute 3") {
        branchSelect.innerHTML = `
            <option value="" disabled selected>Select Department</option>
            <option value="bsc">B.Sc</option>
            <option value="msc">M.Sc</option>
        `;
    } else if (selectedInstitute === "Institute 4") {
        branchSelect.innerHTML = `
            <option value="" disabled selected>Select Department</option>
            <option value="bpharm">B.Pharm</option>
            <option value="mpharm">M.Pharm</option>
        `;
    } else {
        // Default option if no institute is selected
        branchSelect.innerHTML = `<option value="">Select Department</option>`;
    }
}

//change login username according to user type
function updateUsernameField() {
    const userType = document.getElementById('userType').value;
    const usernameInput = document.getElementById('username');
    const usernameLabel = document.getElementById('usernameLabel');

    // Update input type and label based on selected user type
    switch (userType) {
        case 'Student':
            usernameLabel.textContent = 'Enrollment No';
            usernameInput.type = 'text'; // Setting type to text
            break;
        case 'Parent':
            usernameLabel.textContent = 'Email ID';
            usernameInput.type = 'email'; // Setting type to email
            break;
        case 'Faculty':
        case 'Admin':
            usernameLabel.textContent = 'Employee No';
            usernameInput.type = 'text'; // Setting type to text
            break;
        default:
            usernameLabel.textContent = 'Username';
            usernameInput.type = 'text';
    }
}