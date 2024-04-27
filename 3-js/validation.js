// Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
// Date: 31 March 2024
// Section: 313
// This js file is used on the register, sign-in and forgot-password forms to create message when users give invalid input 
// which explain with the input is invalid. 

// Code Author(s): 

// Js - Luxsan Jeyasingam

document.addEventListener("DOMContentLoaded", function() {

    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z]+\.[a-zA-Z]+$/;
    const passwordRegex = /(?=.*[a-z])(?=.*[A-Z])/;
    const fullNameRegex = /^[A-Z][a-z]+ [A-Z][a-z]+$/;

    const fullName = document.getElementById("name");  
    const email = document.getElementById("email");
    const password = document.getElementById("password");    
    const password2 = document.getElementById("confirm-pw");    

    const form = document.querySelector('.form');

    form.addEventListener('submit', stopSubmission);

    clearError(email, 'invalidEmail', () => {return emailRegex.test(email.value)})
    if (form.id == 'registerForm' || form.id == 'signInForm') {
        clearError(password, 'invalidPassword', () => {return password.value.length >= 8 && passwordRegex.test(password.value)})
        if (form.id == 'registerForm') {
            clearError(fullName, 'invalidFullName', () => {return fullNameRegex.test(fullName.value)})
            clearError(password2, 'invalidPassword2', () => {return password2.value.length > 0 && password2.value == password.value})
        }}      

})

function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
  }


function stopSubmission(event) {
    event.preventDefault();
}

function clearError(input, errorId, conditionFunc) {
    input.addEventListener("change", function() {
        if (conditionFunc()) {
            input.parentNode.removeChild(document.getElementById(errorId))
            input.style.borderColor = 'black';
        }
    })
}

function validate () {
    const email = document.getElementById("email");
    const password = document.getElementById("password");    
    const password2 = document.getElementById("confirm-pw");  
    const fullName = document.getElementById("name");  
    var validation = true;

    const form = document.querySelector('.form');
 
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z]+\.[a-zA-Z]+$/;
    const passwordRegex = /(?=.*[a-z])(?=.*[A-Z])/;
    const fullNameRegex = /^[A-Z][a-z]+ [A-Z][a-z]+$/;

    if (!emailRegex.test(email.value)) {
        validationError(email, 'invalidEmail', "Email address should be non-empty with the format xyz@xyz.xyz.")
    }   

    if (form.id == 'registerForm' || form.id == 'signInForm') {

        if (password.value.length < 8 || !passwordRegex.test(password.value)) {
            validationError(password, 'invalidPassword', "Password should be at least 8 characters: 1 uppercase, 1 lowercase.")
        }

        if (form.id == 'registerForm') {

            if (!fullNameRegex.test(fullName.value)) {
                validationError(fullName, 'invalidFullName', "First and last name should be two words, first letter capitalized, seperated by a space and only composed of letters.")
            }   
            if (password2.value.length == 0 || password2.value != password.value) {
                validationError(password2, 'invalidPassword2', "Please retype password.")
            }
        }
    }

    if (validation) {
        form.removeEventListener('submit', stopSubmission)
        console.log('Submitted')
    }

    function validationError(input, errorId, errorMessage) {
        input.style.borderColor = 'red';
        let errorMessageElement = document.createElement('div')
    
        if (input.parentNode.lastElementChild.id != errorId) {
            errorMessageElement.setAttribute('id', errorId)
            errorMessageElement.style.color = 'red'     
            errorMessageElement.textContent = errorMessage
            input.parentNode.appendChild(errorMessageElement);
        }
        validation = false;
    }
}
