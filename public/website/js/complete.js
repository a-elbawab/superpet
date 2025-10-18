(function () {
    let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

    // Save the cart to localStorage
    function saveCart() {
        localStorage.setItem('cartItems', JSON.stringify(cartItems));
        updateNavCartCount();
    }

    // Load the cart from localStorage and display it in both the checkout table and the offcanvas
    function loadCart() {
        loadCartInOffcanvas();
        const cartTableBody = document.querySelector('#cartTable tbody');
        if (!cartTableBody) return;

        cartTableBody.innerHTML = '';
        cartItems.forEach(product => {
            if (product.name) {
                addCartItemToTable(product);
            }
        });
        updateTotalAmount();
        updateNavCartCount();
    }

    function loadCartInOffcanvas() {
        const cartItemsContainer = document.querySelector('#cartItems');
        if (!cartItemsContainer) return;

        cartItemsContainer.innerHTML = '';
        cartItems.forEach(product => {
            const cartItem = document.createElement('li');
            cartItem.classList.add('d-flex', 'justify-content-between', 'align-items-center', 'border-bottom', 'p-2', 'mb-3');
            cartItem.setAttribute('data-product-name', product.name);

            cartItem.innerHTML = `
                <div class="d-flex align-items-center">
                    <img src="${product.image}" alt="${product.name}" style="width: 50px; height: 50px; margin-right: 10px;">
                    <span>${product.name}</span>
                    <div class="d-flex align-items-center ml-2">
                        <button class="btn btn-secondary btn-sm" onclick="changeQuantity('${product.name}', ${product.quantity - 1})" ${product.quantity <= 1 ? 'disabled' : ''}>-</button>
                        <input type="number" value="${product.quantity}" min="1" onchange="changeQuantity('${product.name}', this.value)" style="width: 50px; text-align: center;">
                        <button class="btn btn-secondary btn-sm" onclick="changeQuantity('${product.name}', ${product.quantity + 1})">+</button>
                    </div>
                </div>
                <span>${(product.price * product.quantity).toFixed(2)} L.E</span>
                <button class="btn btn-danger btn-sm" onclick="removeFromCart('${product.name}')">x</button>
            `;

            cartItemsContainer.appendChild(cartItem);
        });
        updateTotalAmount();
    }

    function addCartItemToTable(product) {
        const cartTableBody = document.querySelector('#cartTable tbody');
        if (!cartTableBody) return;

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
                <div class="d-flex align-items-center">
                    <button class="btn btn-secondary btn-sm" onclick="changeQuantity('${product.name}', ${product.quantity - 1})" ${product.quantity <= 1 ? 'disabled' : ''}>-</button>
                    <input type="number" value="${product.quantity}" min="1" onchange="changeQuantity('${product.name}', this.value)" style="width: 50px; text-align: center; margin: 0 10px;">
                    <button class="btn btn-secondary btn-sm" onclick="changeQuantity('${product.name}', ${product.quantity + 1})">+</button>
                </div>
            </td>
            <td>
                <span>${(product.price * product.quantity).toFixed(2)} L.E</span>
            </td>
            <td>
                <button class="btn btn-danger btn-sm" onclick="removeFromCart('${product.name}')">x</button>
            </td>
        `;

        cartTableBody.appendChild(cartRow);
    }

    function updateTotalAmount() {
        const totalAmount = cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        const totalAmountElement = document.querySelector('.totalPriceAmount');
        if (totalAmountElement) {
            totalAmountElement.textContent = `${totalAmount.toFixed(2)} L.E`;
        }
    }

    function updateNavCartCount() {
        const cartCountElement = document.querySelector('.iconcart');
        const totalCount = cartItems.reduce((sum, item) => sum + item.quantity, 0);
        if (cartCountElement) {
            cartCountElement.textContent = totalCount > 0 ? totalCount : '';
        }
    }

    function carting(product) {
        let existingProduct = cartItems.find(item => item.name === product.name);
        if (existingProduct) {
            existingProduct.quantity += product.quantity;
        } else {
            cartItems.push({ ...product });
        }
        saveCart();
        reloadCartDisplay();
    }

    function changeQuantity(productName, newQuantity) {
        const product = cartItems.find(item => item.name === productName);
        if (product) {
            product.quantity = Math.max(1, newQuantity);
            saveCart();
            reloadCartDisplay();
        }
    }

    function reloadCartDisplay() {
        loadCartInOffcanvas();
        const cartTableBody = document.querySelector('#cartTable tbody');
        if (!cartTableBody) return;

        cartTableBody.innerHTML = '';
        cartItems.forEach(product => {
            if (product.name) {
                addCartItemToTable(product);
            }
        });
        updateTotalAmount();
    }

    function removeFromCart(productName) {
        cartItems = cartItems.filter(item => item.name !== productName);
        saveCart();
        reloadCartDisplay();
    }

    window.onload = function () {
        loadCart();
        updateNavCartCount();
        updateTotalAmount();
    };

    // Increment and decrement functions
    function incrementValue() {
        const quantityInput = document.querySelector('#quantity');
        if (quantityInput) {
            let currentValue = parseInt(quantityInput.value, 10) || 1;
            quantityInput.value = currentValue + 1;
        }
    }

    function decrementValue() {
        const quantityInput = document.querySelector('#quantity');
        if (quantityInput) {
            let currentValue = parseInt(quantityInput.value, 10) || 1;
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        }
    }

    window.carting = carting;
    window.incrementValue = incrementValue;
    window.decrementValue = decrementValue;
    window.removeFromCart = removeFromCart;
    window.changeQuantity = changeQuantity;
})();
