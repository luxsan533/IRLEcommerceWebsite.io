// Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
// Date: 31 March 2024
// Section: 313
// This js file is used on the product description and used to change the color of the size elements and set the size inputs for the post request.

// Code Author(s): 

// Js - Luxsan Jeyasingam

document.addEventListener("DOMContentLoaded", function() {
    var sizeButtons = document.querySelectorAll('.sizeButton');
    sizeButtons[0].style.backgroundColor = "#c2c2c2";

    function selectSize(event) {
    
    sizeButtons.forEach(function(e) {
        e.style.backgroundColor = "#F5F5F5";
    })
    
    var clickedElement = event.target
    clickedElement.style.backgroundColor = "#c2c2c2"
    console.log("Clicked Element:", clickedElement);
    var sizeInput = document.getElementById("sizeInput")
    sizeInput.value = clickedElement.textContent
    console.log(sizeInput.value)
}

var sizeButtons = document.querySelectorAll('.sizeButton');
sizeButtons.forEach(function(e) {
    e.addEventListener('click', selectSize);
})})