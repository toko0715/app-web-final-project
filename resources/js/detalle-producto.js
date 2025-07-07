document.addEventListener('DOMContentLoaded', () => {
    // --- Lógica para el selector de cantidad ---
    const quantityInput = document.querySelector('.quantity-input');
    const minusBtn = document.querySelector('.minus-btn');
    const plusBtn = document.querySelector('.plus-btn');

    if (quantityInput && minusBtn && plusBtn) {
        minusBtn.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) { // Asegura que no baje de 1
                quantityInput.value = currentValue - 1;
            }
        });

        plusBtn.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        });

        // Opcional: Validar que solo se ingresen números y el mínimo sea 1
        quantityInput.addEventListener('change', () => {
            let currentValue = parseInt(quantityInput.value);
            if (isNaN(currentValue) || currentValue < 1) {
                quantityInput.value = 1;
            }
        });
    }

    // --- Lógica para el botón "Agregar al Carrito" ---
    const addToCartBtn = document.querySelector('.add-to-cart-btn');
    // Asumiendo que tienes un contador global en el navbar, necesitarías pasarlo o actualizarlo
    // Por ahora, solo haremos un log en consola.
    if (addToCartBtn) {
        addToCartBtn.addEventListener('click', () => {
            const productName = document.querySelector('.product-title').textContent;
            const quantity = quantityInput ? quantityInput.value : 1;
            console.log(`"${productName}" (Cantidad: ${quantity}) añadido al carrito!`);
            // Aquí se integraría la lógica real para añadir al carrito (por ejemplo, con localStorage o una API)
            
            // Opcional: Feedback visual al usuario
            addToCartBtn.textContent = '¡Añadido!';
            addToCartBtn.style.backgroundColor = '#4CAF50'; // Verde
            setTimeout(() => {
                addToCartBtn.innerHTML = '<i class="fas fa-shopping-cart"></i> AGREGAR AL CARRITO';
                addToCartBtn.style.backgroundColor = ''; // Restaura el color original
            }, 1500);
        });
    }

    // --- Lógica para el botón "Agregar a Lista de Deseos" ---
    const addToWishlistBtn = document.querySelector('.add-to-wishlist-btn');
    if (addToWishlistBtn) {
        addToWishlistBtn.addEventListener('click', () => {
            addToWishlistBtn.classList.toggle('active'); // Alterna la clase 'active'
            const isAdded = addToWishlistBtn.classList.contains('active');
            addToWishlistBtn.querySelector('i').className = isAdded ? 'fas fa-heart' : 'far fa-heart'; // Cambia el icono

            const productName = document.querySelector('.product-title').textContent;
            if (isAdded) {
                console.log(`"${productName}" añadido a la lista de deseos.`);
            } else {
                console.log(`"${productName}" eliminado de la lista de deseos.`);
            }
            // Aquí integrarías la lógica para añadir/eliminar de una lista de deseos real
        });
    }

    // --- Lógica para los botones de scroll de productos relacionados ---
    const relatedProductsGrid = document.querySelector('.related-products-grid');
    const rightScrollBtn = document.querySelector('.related-products-grid .right-btn');
    // const leftScrollBtn = document.querySelector('.related-products-grid .left-btn'); // Puedes añadir un botón izquierdo si lo necesitas

    if (relatedProductsGrid && rightScrollBtn) {
        rightScrollBtn.addEventListener('click', () => {
            // Desplaza el grid horizontalmente. Ajusta el valor (ej. 300) para controlar la cantidad de scroll
            relatedProductsGrid.scrollBy({
                left: 300, 
                behavior: 'smooth' 
            });
        });

        // Si añades un botón izquierdo:
        // if (leftScrollBtn) {
        //     leftScrollBtn.addEventListener('click', () => {
        //         relatedProductsGrid.scrollBy({
        //             left: -300, 
        //             behavior: 'smooth' 
        //         });
        //     });
        // }
    }
});

console.log("hello world si funcione xd");
