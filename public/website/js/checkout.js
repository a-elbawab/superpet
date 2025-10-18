let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

// Load the cart from localStorage and display it in the checkout
function loadCart() {
    const cartTableBody = document.querySelector('#cartTable tbody');
    cartTableBody.innerHTML = ''; // Clear the table before adding items
    cartItems.forEach(product => addCartItemToTable(product));
    updateTotalAmount();
}

// Add a product to the checkout table
function addCartItemToTable(product) {
    const cartTableBody = document.querySelector('#cartTable tbody');

    const cartRow = document.createElement('tr');
    cartRow.setAttribute('data-product-name', product.name);

    cartRow.innerHTML = `
            <td>
                <div class="d-flex align-items-center">
                    <img src="${product.image}" alt="${product.name}" style="width: 50px; height: 50px; margin-right: 10px;">
                    <span>${product.name}</span>
                </div>
            </td>
            <td class="tr-none">
                <input type="number" value="${product.quantity}" min="1" onchange="changeQuantity('${product.name}', this.value)">
            </td>
            <td>
                <span>${(product.price * product.quantity).toFixed(2)} L.E</span>
            </td>
            <td>
                <button class="btn btn-danger btn-sm" onclick="removeFromCart('${product.name}')">Remove</button>
            </td>
        `;

    cartTableBody.appendChild(cartRow);
}

// Remove a product from the cart
function removeFromCart(productName) {
    cartItems = cartItems.filter(item => item.name !== productName);
    localStorage.setItem('cartItems', JSON.stringify(cartItems));
    loadCart();
}

// Change the quantity of a product in the cart
function changeQuantity(productName, newQuantity) {
    const product = cartItems.find(item => item.name === productName);

    if (product) {
        product.quantity = Math.max(1, newQuantity); // Ensure quantity doesn't go below 1
        localStorage.setItem('cartItems', JSON.stringify(cartItems));
        loadCart();
    }
}

// Checkout function placeholder
function checkout() {
    if (cartItems.length === 0) {
        alert('Your cart is empty. Please add items to checkout.');
        return;
    }
    // Redirect to the checkout page or perform the checkout process
    alert('Proceeding to checkout...');
}
