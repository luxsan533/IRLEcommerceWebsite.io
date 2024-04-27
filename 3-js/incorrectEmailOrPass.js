// Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
// Date: 31 March 2024
// Section: 313
// This js file is used to create error message html elements if an incorrect email or password is provided.

// Code Author(s): 

// Js - Luxsan Jeyasingam


window.addEventListener('beforeunload', function(event) {
    console.log('Page is being refreshed!');

    var currentURL = window.location.href;

    var newURL = currentURL.split('invalid=')[0]
    var form = document.createElement("form");
    form.setAttribute("method", "post");
    form.setAttribute("action", "../server/refresh.php");

    var url = document.createElement("input");
    url.setAttribute("type", "text");
    url.setAttribute("name", "url");
    url.setAttribute("value", newURL);

    form.appendChild(inputUsername);

    form.submit()
});


document.addEventListener("DOMContentLoaded", function() {
    var formTitle = document.getElementsByClassName("title")[0]

    var currentURL = window.location.href;
    console.log(currentURL)
    var invalid = currentURL.split('invalid=')[1]
    console.log(invalid)

    if (invalid == "incorrectPass" || invalid == "emailNotExist"){
        
        var invalidText = document.createElement("p")
        invalidText.classList.add("invalidText")
        if (invalid == "incorrectPass"){
           invalidText.textContent = "That is not the correct password for that email"
        } else {
            invalidText.textContent = "There is no account with that email"
        }
        invalidText.style.color = "red";
        invalidText.style.backgroundColor = "pink";
        invalidText.style.fontSize = "18px";
        invalidText.style.border = "2px solid red";
        invalidText.style.borderRadius = "10px";
        invalidText.style.height = "50px"
        invalidText.style.lineHeight = "45px";

        formTitle.parentNode.insertBefore(invalidText, formTitle.nextElementSibling)

    }

    console.log("Current URL:", currentURL);
    console.log(pass)
})
