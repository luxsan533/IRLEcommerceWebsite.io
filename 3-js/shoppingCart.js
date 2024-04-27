// Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
// Date: 31 March 2024
// Section: 313
// This js file is used on the shopping cart page and used to change the number show in total price element based on which cart items are selected.

// Code Author(s): 

// Js - Luxsan Jeyasingam

document.addEventListener("DOMContentLoaded", function() {
    let products = document.querySelectorAll('.cart-item')
    let prices = document.querySelectorAll('.item-price')
    let totalPrice = 0
    let totalPriceElement = document.getElementById('total-price')

    totalPriceElement.innerText = "$" + totalPrice


    var checkAllBoxes = document.getElementById("checkbox-all");
    var itemCheckBoxes = document.querySelectorAll(".item-checkbox");
    var quantitySelects = document.querySelector(".quantity")

    itemCheckBoxes.forEach(function(itemCheckBox) {
        itemCheckBox.addEventListener('change', function() {
            let price = parseFloat(itemCheckBox.parentNode.querySelector(".item-detail").innerText.substring(1))
            let quantityElt = itemCheckBox.parentNode.querySelector(".quantity")
            let quantity = parseInt(quantityElt.value)

            quantityElt.addEventListener('change', function() {
                var newQuantity = parseInt(this.value)
                let changeInQuantity = newQuantity - quantity 
                console.log(changeInQuantity)


                totalPrice += price * changeInQuantity 
                totalPriceElement.innerText = "$" + totalPrice.toFixed(2)
                quantity = newQuantity
            })
            

            if (this.checked) {
                totalPrice += price * quantity
                totalPriceElement.innerText = "$" + totalPrice.toFixed(2)
            } else {
                totalPrice -= price * quantity
                totalPriceElement.innerText = "$" + totalPrice.toFixed(2)
            }
        })})

    checkAllBoxes.addEventListener('change', function() {
        itemCheckBoxes.forEach(function(itemCheckBox) {
            itemCheckBox.checked = checkAllBoxes.checked
        })

        if (this.checked) {
            products.forEach((productElt) => {
                let priceElt = productElt.querySelector(".item-price")
                let quantityElt = productElt.querySelector(".quantity")

                let price = parseFloat(priceElt.innerText.substring(1));
                let quantity = parseInt(productElt.querySelector(".quantity").value)
                quantityElt.addEventListener('change', function() {
                    var newQuantity = parseInt(this.value)
                    let changeInQuantity = newQuantity - quantity 
                    console.log(changeInQuantity)
    
    
                    totalPrice += price * changeInQuantity 
                    totalPriceElement.innerText = "$" + totalPrice.toFixed(2)
                    quantity = newQuantity
                })
    
                totalPrice += price * quantity

            })
        } else {
            totalPrice = 0
        }
        totalPriceElement.innerText = "$" + totalPrice.toFixed(2)
    })
    
    let purchase = document.querySelector(".checkout-btn")
    purchase.addEventListener('click', function() {
        console.log('test')
        let items = document.querySelectorAll('.cart-item')
        let checkedItems = Array.from(items).filter((e) => {
            return e.querySelector('.item-checkbox').checked
        })
        let checkedItemsInputs = checkedItems.map((e) => {
            let id = e.querySelector('.cartItemId').value
            var checkedItemInput = document.createElement("input");
            checkedItemInput.setAttribute("type", "hidden");
            checkedItemInput.setAttribute("class", "cartitemId");
            checkedItemInput.setAttribute("name", "cartitemId-" + id);
            checkedItemInput.setAttribute("value", id);
            
            return checkedItemInput
        })

        let purchaseForm = document.getElementById("purchaseForm")
        // console.log(purchaseForm)

        // Add an event listener for the form's submit event
        // purchaseForm.addEventListener("submit", function(event) {
        //     event.preventDefault();
        // });
        checkedItemsInputs.forEach((input) => {
            purchaseForm.appendChild(input)
        })

        console.log(checkedItems)
        console.log(checkedItemsInputs.map(e => {
            return e.name
        }))
        console.log(purchaseForm)
    })

})



// function deleteItem() {
//     console.log("test")
//     document.removeChild()
// }