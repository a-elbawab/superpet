(function () {
    let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

    // Save the cart to localStorage
    function saveCart() {
        localStorage.setItem('cartItems', JSON.stringify(cartItems));
        updateNavCartCount(); // Update the cart count in the navigation
    }

    // Load the cart from localStorage and display it in both the checkout table and the offcanvas
    function loadCart() {
        loadCartInOffcanvas();
        const cartTableBody = document.querySelector('#cartTable tbody');
        if (!cartTableBody) return; // Check if cartTableBody exists

        cartTableBody.innerHTML = ''; // Clear the table before adding items
        cartItems.forEach(product => {
            if (product.name) {
                addCartItemToTable(product); // Ensure product has a name before adding
            }
        });
        updateTotalAmount();
        updateNavCartCount(); // Update the cart count when loading the cart
    }

    // Load cart items in the offcanvas
    function loadCartInOffcanvas() {
        const cartItemsContainer = document.querySelector('#cartItems');
        if (!cartItemsContainer) return; // Check if offcanvas element exists

        cartItemsContainer.innerHTML = ''; // Clear offcanvas items

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
                <span>${(product.price * product.quantity).toFixed(2)} ${currencySymbol}</span>
                <button class="btn btn-danger btn-sm" onclick="removeFromCart('${product.name}')">x</button>
            `;

            cartItemsContainer.appendChild(cartItem);
        });
        updateTotalAmount();
    }

    // Function to add a product to the cart
    function carting(product) {
        let existingProduct = cartItems.find(item => item.id === product.id);

        if (existingProduct) {
            existingProduct.quantity += product.quantity;
        } else {
            cartItems.push({ ...product });
        }

        saveCart();
        reloadCartDisplay();
    }

    // Change the quantity of a product in the cart
    function changeQuantity(productName, newQuantity) {
        const product = cartItems.find(item => item.name === productName);

        if (product) {
            product.quantity = Math.max(1, newQuantity); // Ensure quantity doesn't go below 1
            saveCart();
            reloadCartDisplay();
        }
    }

    // Reload the cart display after any update
    function reloadCartDisplay() {
        loadCartInOffcanvas();
        const cartTableBody = document.querySelector('#cartTable tbody');
        if (!cartTableBody) return;

        cartTableBody.innerHTML = ''; // Clear the table
        cartItems.forEach(product => {
            if (product.name) {
                addCartItemToTable(product); // Ensure product has a name
            }
        });
        updateTotalAmount();
    }

    // Add a product to the checkout table
    function addCartItemToTable(product) {
        const cartTableBody = document.querySelector('#cartTable tbody');
        if (!cartTableBody) return; // Check if cartTableBody exists

        const cartRow = document.createElement('tr');
        cartRow.setAttribute('data-product-name', product.name);

        // Use the currencySymbol variable defined in the Blade file
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
            <span>${(product.price * product.quantity).toFixed(2)} ${currencySymbol}</span>
        </td>
        <td>
            <button class="btn btn-danger btn-sm" onclick="removeFromCart('${product.name}')">x</button>
        </td>
    `;

        cartTableBody.appendChild(cartRow);
    }



    // Update the total amount displayed in the checkout section
    function updateTotalAmount() {
        const totalAmount = cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        const totalAmountElement = document.querySelector('.totalPriceAmount');
        let hatemPrice = $('#hatemPrice');
        if (totalAmountElement) {
            totalAmountElement.textContent = `${currencySymbol} ${totalAmount.toFixed(2)}`;
            if (hatemPrice.length) {
                hatemPrice.html(`${currencySymbol} ${totalAmount.toFixed(2)}`);
            }
        }
    }

    // Update the cart count displayed in the navigation
    function updateNavCartCount() {
        const cartCountElement = document.querySelector('.iconcart');
        const totalCount = cartItems.reduce((sum, item) => sum + item.quantity, 0);
        if (cartCountElement) {
            cartCountElement.textContent = totalCount > 0 ? totalCount : '';
        }
    }

    // Remove a product from the cart
    function removeFromCart(productName) {
        cartItems = cartItems.filter(item => item.name !== productName);
        saveCart();
        reloadCartDisplay();
    }

    // Load the cart on page load
    window.onload = function () {
        loadCart(); // Load cart items when the page loads
        updateNavCartCount(); // Ensure nav cart count is updated on page load
        updateTotalAmount();
    };

    // Checkout function placeholder
    function checkout() {
        if (cartItems.length === 0) {
            alert('Your cart is empty. Please add items to checkout.');
            return;
        }
    }

    function incrementValue() {
        const quantityInput = document.querySelector('#quantity');
        if (quantityInput) {
            let currentValue = parseInt(quantityInput.value, 10) || 1;
            quantityInput.value = currentValue + 1; // زيادة الكمية
        }
    }

    function decrementValue() {
        const quantityInput = document.querySelector('#quantity');
        if (quantityInput) {
            let currentValue = parseInt(quantityInput.value, 10) || 1;
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1; // تقليل الكمية بشرط ألا تقل عن 1
            }
        }
    }

    // Function to get the current quantity from the input field
    function getQuantity() {
        const quantityInput = document.querySelector('#quantity'); // تأكد أن الـ ID يطابق الموجود في HTML
        return quantityInput ? parseInt(quantityInput.value, 10) || 1 : 1; // القيمة الافتراضية 1 في حال عدم وجود input
    }

    // Expose the function globally for usage in HTML
    window.getQuantity = getQuantity;


    // Expose these functions globally for button click handling
    window.incrementValue = incrementValue;
    window.decrementValue = decrementValue;


    // Expose necessary functions to global scope for button handlers
    window.carting = carting;
    window.changeQuantity = changeQuantity;
    window.removeFromCart = removeFromCart;
    window.checkout = checkout;
})();


