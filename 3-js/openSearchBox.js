// Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
// Date: 31 March 2024
// Section: 313
// This js file is used to open the search box upon pressing the search button on smaller screens.

// Code Author(s): 

// Js - Luxsan Jeyasingam

function openSearchBox() {
    let searchBox = document.querySelector('.search')
    let searchElements = searchBox.children
    for (let i = 0; i < searchElements.length; i++) {
        let elt = searchElements[i]
        elt.style.display = 'inline'
    }
}