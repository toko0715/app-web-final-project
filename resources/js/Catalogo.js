document.addEventListener('DOMContentLoaded', () => {
    // --- Lógica para el rango de precios deslizante ---
    const priceRange = document.getElementById('price-range');
    const currentPriceSpan = document.getElementById('current-price');

    if (priceRange && currentPriceSpan) {
        // Inicializar el valor actual al cargar la página
        currentPriceSpan.textContent = priceRange.value;

        // Actualizar el valor al mover el slider
        priceRange.oninput = function() {
            currentPriceSpan.textContent = this.value;
            // Opcional: Actualizar el color de la barra de rango
            const value = (this.value - this.min) / (this.max - this.min) * 100;
            this.style.background = `linear-gradient(to right, #00e6e6 0%, #00e6e6 ${value}%, #555 ${value}%, #555 100%)`;
        };

        // Para inicializar el color de la barra al cargar la página (si el valor no es 0)
        const initialValue = (priceRange.value - priceRange.min) / (priceRange.max - priceRange.min) * 100;
        priceRange.style.background = `linear-gradient(to right, #00e6e6 0%, #00e6e6 ${initialValue}%, #555 ${initialValue}%, #555 100%)`;
    }

    // --- Lógica para los interruptores de palanca (Toggle Switches) ---
    const toggleSwitches = document.querySelectorAll('.availability-filter-card .switch input');
    toggleSwitches.forEach(switchInput => {
        switchInput.addEventListener('change', function() {
            const status = this.checked ? 'activado' : 'desactivado';
            const optionName = this.closest('.filter-option').querySelector('span').textContent;
            console.log(`${optionName} ${status}`);
            // Aquí puedes añadir lógica para filtrar productos según la disponibilidad
            // Por ejemplo, enviar una petición a un servidor o filtrar elementos HTML
        });
    });

    // --- Lógica para el selector de cantidad de elementos a mostrar ---
    const showQuantitySelect = document.getElementById('show-quantity');
    if (showQuantitySelect) {
        showQuantitySelect.addEventListener('change', function() {
            const selectedQuantity = this.value;
            console.log(`Mostrar ${selectedQuantity} productos por página.`);
            // Aquí puedes añadir lógica para actualizar la paginación o el número de productos mostrados
        });
    }

    // --- Lógica para el botón de Añadir al Carrito (ejemplo) ---
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    const cartCountSpan = document.querySelector('.cart-count');
    let cartItemCount = 0;

    addToCartButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Evita el comportamiento por defecto del enlace/botón
            cartItemCount++;
            cartCountSpan.textContent = cartItemCount;
            // Opcional: Una pequeña animación o feedback visual al añadir
            button.classList.add('added');
            setTimeout(() => {
                button.classList.remove('added');
            }, 500); // Quitar la clase después de un tiempo
            console.log('Producto añadido al carrito. Total: ' + cartItemCount);

            // Aquí puedes añadir lógica para añadir el producto a un array de carrito
            // o a localStorage para persistencia.
        });
    });
});
