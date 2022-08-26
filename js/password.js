const pwdField = document.querySelector("form .pwd-field input[type='password']");
const pwdField2 = document.querySelector("form .pwd-field2 input[type='password']");
toggleBtn = document.querySelector("form .form-group span");
toggleButton = document.querySelector("form .form-group .pwd-toggler");

if(toggleBtn !== null) {
    toggleBtn.onclick = () => {
        if(pwdField.type === "password") {
            pwdField.type = "text";
            pwdField.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
        } else {
            pwdField.type = "password";
            pwdField.innerHTML = '<i class="fa-solid fa-eye"></i>';
        }
    }
}
if(toggleButton !== null) {
    toggleButton.onclick = () => {
        if(pwdField.type === "password") {
            pwdField.type = "text";
            pwdField.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
        } else {
            pwdField.type = "password";
            pwdField.innerHTML = '<i class="fa-solid fa-eye"></i>';
        }
    }
}
if(toggleButton !== null) {
    toggleButton.onclick = () => {
        if(pwdField2.type === "password") {
            pwdField2.type = "text";
            pwdField.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
        } else {
            pwdField2.type = "password";
            pwdField.innerHTML = '<i class="fa-solid fa-eye"></i>';
        }
    }
}