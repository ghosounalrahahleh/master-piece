var quantityI        = document.getElementById("quantity");



function incrementValue() {
    var value = parseInt(quantityI.value, 10);
    value = isNaN(value) ? 1 : value;
    value++;
  quantityI.value = value;
}
function decrementValue() {
    var value = parseInt(quantityI.value, 10);
    value = isNaN(value) ? 1 : value;
    if (value > 1) {
        value--;
    }
    quantityI.value = value;
}

function cartIncrementValue(id) {
    var cartQuantityItem = document.getElementById(`${id}`);
    var value = parseInt(cartQuantityItem.value, 10);
    value = isNaN(value) ? 1 : value;
    value++;
    cartQuantityItem.value = value;
}
function cartDecrementValue(id) {
    var cartQuantityItem = document.getElementById(`${id}`);
    var value = parseInt(cartQuantityItem.value, 10);
    value = isNaN(value) ? 1 : value;
    if (value > 1) {
        value--;
    }
    cartQuantityItem.value = value;
}
