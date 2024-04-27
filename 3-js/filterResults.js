// Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
// Date: 31 March 2024
// Section: 313
// This js file is used to filter the search results based on which check block is clicked.

// Code Author(s): 

// Js - Luxsan Jeyasingam


document.addEventListener("DOMContentLoaded", function() {

    var filters = document.querySelectorAll(".filter-checkbox");
    var products = document.querySelectorAll(".product")
    var productContainer = document.querySelector(".product-container")

    filters.forEach(function(filter) {
        filter.addEventListener('change', function() {
            if (Array.from(filters).every((e) => {
                return !e.checked
            })) {
                productContainer.innerHTML = "";
                products.forEach(function(product) {
                    productContainer.appendChild(product);
                });
            } else {
                let filteredProducts = Array.from(products).filter((e) => {
                    let category = e.classList[1].split('-')[1];
                    let price =  e.classList[2].split('-')[1];
                    let activeFilters = Array.from(filters).filter((elt) => {
                        return elt.checked
                    })
                    let activeFiltersIds = activeFilters.map((elt) => {
                        return elt.id.split('-')[1]
                    })

                    let validCategory = false;
                    let validPrice = false;

                    let prices = ['0', '50', '100', '150', '200', '200plus']
                    let priceRanges = [['0', '50'], ['50', '100'], ['100', '150'], ['150', '200'], ['200', '200plus']]
                    let priceFilters = activeFiltersIds.filter((elt) => {
                        return prices.includes(elt)
                    })

                    let categoryFilters = activeFiltersIds.filter((elt) => {
                        return !priceFilters.includes(elt)
                    })

                    if (categoryFilters.length == 0 || activeFiltersIds.includes(category.toLowerCase())) {
                        validCategory = true;
                    }

                    if (priceFilters.length == 0) {
                        validPrice = true;
                    } else {
                        priceRanges = priceRanges.filter((elt) => {
                            return priceFilters.includes(elt[1])
                        })
                        if (priceFilters[priceFilters.length - 1] == "200plus" && parseInt(price) > 200) {
                            validPrice = true;
                        } else {
                        validPrice = priceRanges.some((elt) => {
                            return (parseInt(elt[0]) < parseInt(price) && parseInt(price) < parseInt(elt[1]))
                        });
                        }
                    }
                    
                    return validCategory && validPrice;
                })            
                productContainer.innerHTML = "";
                filteredProducts.forEach(function(product) {
                    productContainer.appendChild(product);
                });    
            }
        });
    });
})

function categorizeResults(category) {
    console.log(category)
    let filter = document.getElementById('checkbox-' + category.toLowerCase())
    console.log(filter)
    filter.checked = true
    var products = document.querySelectorAll(".product")
    console.log(products)
    filteredProducts = Array.from(products).filter((e) => {
        return e.classList.contains('category-' + category);
    })
    console.log(filteredProducts)
    var productContainer = document.getElementById("product-container")
    productContainer.innerHTML = "";
    filteredProducts.forEach(function(product) {
        productContainer.appendChild(product);
    });
    let categories = document.querySelector(".category-container")
    categories.style.display = "none"
}