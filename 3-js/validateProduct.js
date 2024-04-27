// Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
// Date: 31 March 2024
// Section: 313
// This js file is used on the sell item form to create message when users give invalid input which explain with the input is invalid. 
// Code Author(s): 

// Js - Luxsan Jeyasingam

document.addEventListener("DOMContentLoaded", function() {

    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z]+\.[a-zA-Z]+$/;
    const passwordRegex = /(?=.*[a-z])(?=.*[A-Z])/;
    const fullNameRegex = /^[A-Z][a-z]+ [A-Z][a-z]+$/;

    const productName = document.getElementById("name");  
    const price = document.getElementById("price");
    const brand = document.getElementById("brand");    
    const category = document.getElementById("category");    
    const image = document.getElementById("image");    
    const description = document.getElementById("description");    

    const form = document.querySelector('.form');

    form.addEventListener('submit', stopSubmission);

    clearError(productName, 'invalidProduct', () => {return productName.value.length != 0})
    clearError(price, 'invalidPrice', () => {return price.value != '' && !isNaN(parseFloat(price.value))})
    clearError(brand, 'invalidBrand', () => {return brand.value.length != 0})
    clearError(category, 'invalidCategory', () => {return category.value != "Choose a category"})
    clearError(image, 'invalidImage', () => {return image.value.length != 0})
    clearError(description, 'invalidDescription', () => {return description.value.length != 0 && description.value.length < 200})

    // if (form.id == 'registerForm' || form.id == 'signInForm') {
    //     clearError(password, 'invalidPassword', () => {return password.value.length >= 8 && passwordRegex.test(password.value)})
    //     if (form.id == 'registerForm') {
    //         clearError(fullName, 'invalidFullName', () => {return fullNameRegex.test(fullName.value)})
    //         clearError(password2, 'invalidPassword2', () => {return password2.value.length > 0 && password2.value == password.value})
    //     }}      

//     var currentURL = window.location.href;
//     var pass = currentURL.split('pass=')[1]

//     if (pass == "incorrect"){
//         console.log("sup")

//     }


// // Now you can use `currentURL` as needed
//     console.log("Current URL:", currentURL);
//     console.log(pass)
//     // console.log("Data 1: " + data1);
//           // console.log("Data 2: " + data2);
})

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
    // const email = document.getElementById("email");
    // const login = document.getElementById("login");
    // const password = document.getElementById("password");    
    // const password2 = document.getElementById("confirm-pw");  
    // const fullName = document.getElementById("name");  
    // const termsCheckBox = document.getElementById("terms");

    const productName = document.getElementById("name");  
    const price = document.getElementById("price");
    const brand = document.getElementById("brand");    
    const category = document.getElementById("category");    
    const image = document.getElementById("image");    
    const description = document.getElementById("description");    

    var validation = true;

    const form = document.querySelector('.form');
    // form.addEventListener('submit', stopSubmission);
    // document.getElementById("loginButton").disabled = true;
 
    // const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z]+\.[a-zA-Z]+$/;
    // const passwordRegex = /(?=.*[a-z])(?=.*[A-Z])/;
    // const fullNameRegex = /^[A-Z][a-z]+ [A-Z][a-z]+$/;

    if (productName.value.length == 0) {
        validationError(productName, 'invalidProduct', "Product name should be non-empty.")
    }   

    if (price.value == '' || isNaN(parseFloat(price.value))) {
        validationError(price, 'invalidPrice', "Price should be non-empty and of floating point type.")
    }

    if (brand.value.length == 0) {
        validationError(brand, 'invalidBrand', "Brand name should be non-empty.")
    }   

    if (category.value == "Choose a category") {
        validationError(category, 'invalidCategory', "A category must be selected.")
    }

    if (image.value.length == 0) {
        validationError(image, 'invalidImage', "Image should be non-empty.")
    }

    if (description.value.length == 0 || description.value.length > 200) {
        validationError(description, 'invalidDescription', "Description should be non-empty and less than 200 characters.")
    }

    // if (form.id == 'registerForm' || form.id == 'signInForm') {

    //     if (password.value.length < 8 || !passwordRegex.test(password.value)) {
    //         validationError(password, 'invalidPassword', "Password should be at least 8 characters: 1 uppercase, 1 lowercase.")
    //     }

    //     if (form.id == 'registerForm') {

    //         if (!fullNameRegex.test(fullName.value)) {
    //             validationError(fullName, 'invalidFullName', "First and last name should be two words, first letter capitalized, seperated by a space and only composed of letters.")
    //         }   
    //         if (password2.value.length == 0 || password2.value != password.value) {
    //             validationError(password2, 'invalidPassword2', "Please retype password.")
    //         }
    //     }
    // }



    // if (!termsCheckBox.checked) {
    //     validationError(termsCheckBox, 'invalidTermsCheckBox', "X Please accept the terms and conditions.")
    // }
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
