document.addEventListener('DOMContentLoaded', () => {
    const cartItemsList = document.getElementById('cart-items-list');
    const summarySubtotal = document.getElementById('summary-subtotal');
    const summaryShipping = document.getElementById('summary-shipping');
    const summaryTotal = document.getElementById('summary-total');
    const applyCouponBtn = document.getElementById('apply-coupon-btn');
    const updateCartBtn = document.getElementById('update-cart-btn');
    const couponInput = document.getElementById('coupon-input');

    // Simulate cart data. In a real application, this would come from localStorage or a server.
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Add the specific product from the image if the cart is empty for demonstration
    if (cart.length === 0) {
        cart.push({
            id: 'astro-a50',
            name: 'Audífonos Gamer Inalámbricos Astro A50 Ps4 Ps5 Pc Ngo/ Azul Color Negro',
            price: 480,
            quantity: 1,
            image: 'img/te puede interesar 1.png' // Use the image from "te puede interesar" for the product
        });
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    // Function to render cart items
    function renderCart() {
        cartItemsList.innerHTML = ''; // Clear existing items
        let currentSubtotal = 0;

        if (cart.length === 0) {
            cartItemsList.innerHTML = '<p style="text-align: center; padding: 20px; color: #ccc;">Tu carrito está vacío.</p>';
        }

        cart.forEach(item => {
            const itemSubtotal = item.price * item.quantity;
            currentSubtotal += itemSubtotal;

            const cartItemDiv = document.createElement('div');
            cartItemDiv.classList.add('cart-item');
            cartItemDiv.setAttribute('data-id', item.id);

            cartItemDiv.innerHTML = `
                <div class="cart-item-details">
                    <img src="${item.image}" alt="${item.name}" class="cart-item-image">
                    <span class="cart-item-name">${item.name}</span>
                </div>
                <span class="cart-item-price">S/ ${item.price.toFixed(0)}</span>
                <div class="cart-item-qty-controls">
                    <button class="cart-qty-button decrease-qty" data-id="${item.id}">-</button>
                    <input type="number" class="cart-qty-input" value="${item.quantity}" min="1" data-id="${item.id}">
                    <button class="cart-qty-button increase-qty" data-id="${item.id}">+</button>
                </div>
                <span class="cart-item-subtotal">S/ ${itemSubtotal.toFixed(0)}</span>
                `;
            cartItemsList.appendChild(cartItemDiv);
        });

        updateSummary(currentSubtotal);
    }

    // Function to update the summary section
    function updateSummary(subtotal) {
        const shippingCost = 0; // As per your image, shipping is S/ 0
        summarySubtotal.textContent = `S/ ${subtotal.toFixed(0)}`;
        summaryShipping.textContent = `S/ ${shippingCost.toFixed(0)}`;
        summaryTotal.textContent = `S/ ${(subtotal + shippingCost).toFixed(0)}`;
    }

    // Handle quantity changes
    cartItemsList.addEventListener('click', (event) => {
        const target = event.target;
        if (target.classList.contains('decrease-qty') || target.classList.contains('increase-qty')) {
            const itemId = target.dataset.id;
            const itemInput = cartItemsList.querySelector(`.cart-qty-input[data-id="${itemId}"]`);
            let currentQty = parseInt(itemInput.value);

            if (target.classList.contains('decrease-qty')) {
                currentQty = Math.max(1, currentQty - 1); // Minimum quantity is 1
            } else if (target.classList.contains('increase-qty')) {
                currentQty += 1;
            }
            itemInput.value = currentQty;
            updateCartItemQuantity(itemId, currentQty);
        }
        // Handle remove button if uncommented in HTML
        /*
        if (target.classList.contains('remove-item-btn')) {
            const itemId = target.dataset.id;
            removeFromCart(itemId);
        }
        */
    });

    cartItemsList.addEventListener('change', (event) => {
        const target = event.target;
        if (target.classList.contains('cart-qty-input')) {
            const itemId = target.dataset.id;
            let currentQty = parseInt(target.value);
            if (isNaN(currentQty) || currentQty < 1) {
                currentQty = 1; // Default to 1 if invalid
                target.value = 1;
            }
            updateCartItemQuantity(itemId, currentQty);
        }
    });

    function updateCartItemQuantity(id, newQuantity) {
        const itemIndex = cart.findIndex(item => item.id === id);
        if (itemIndex > -1) {
            cart[itemIndex].quantity = newQuantity;
            localStorage.setItem('cart', JSON.stringify(cart));
            renderCart(); // Re-render to update subtotals and total
        }
    }

    // Function to add a product to the cart (called from detalle-producto.html)
    window.addProductToCart = (product) => {
        const existingItemIndex = cart.findIndex(item => item.id === product.id);
        if (existingItemIndex > -1) {
            cart[existingItemIndex].quantity += product.quantity || 1;
        } else {
            cart.push({ ...product, quantity: product.quantity || 1 });
        }
        localStorage.setItem('cart', JSON.stringify(cart));
        renderCart(); // Update cart display immediately
        alert(`${product.name} ha sido agregado al carrito.`); // Optional: user feedback
    };

    // Function to remove product from cart (if needed)
    function removeFromCart(id) {
        cart = cart.filter(item => item.id !== id);
        localStorage.setItem('cart', JSON.stringify(cart));
        renderCart();
    }

    // Event listener for "APLICAR DESCUENTO"
    applyCouponBtn.addEventListener('click', () => {
        const couponCode = couponInput.value.trim();
        if (couponCode) {
            alert(`Aplicando cupón: ${couponCode}. (Funcionalidad de cupón no implementada en este demo)`);
            // Here you would implement your coupon logic (e.g., send to server, apply discount)
        } else {
            alert('Por favor, ingresa un código de cupón.');
        }
    });

    // Event listener for "ACTUALIZAR CARRITO"
    updateCartBtn.addEventListener('click', () => {
        renderCart(); // Simply re-render the cart to reflect any manual quantity changes
        alert('Carrito actualizado.');
    });

    // Event listener for "REALIZAR PEDIDO"
    document.getElementById('checkout-btn').addEventListener('click', () => {
        if (cart.length > 0) {
            alert('Procediendo al pago. (Funcionalidad de checkout no implementada en este demo)');
            // In a real app, redirect to a checkout page or start the payment process
        } else {
            alert('Tu carrito está vacío. Agrega productos antes de realizar un pedido.');
        }
    });

    // Initial render when the page loads
    renderCart();
});