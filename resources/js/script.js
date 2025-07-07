document.addEventListener('DOMContentLoaded', function() {
    const carouselImages = document.querySelectorAll('.carousel-image');
    const productImages = document.querySelectorAll('.product-image'); // Selecciona las imágenes de producto
    let currentIndex = 0;

    function showImage(index) {
        // Oculta todas las imágenes de fondo
        carouselImages.forEach((img, i) => {
            img.classList.remove('active');
        });
        // Oculta todas las imágenes de producto
        productImages.forEach((img, i) => {
            img.classList.remove('active');
        });

        // Muestra la imagen de fondo actual
        carouselImages[index].classList.add('active');
        // Muestra la imagen de producto correspondiente
        productImages[index].classList.add('active');
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % carouselImages.length;
        showImage(currentIndex);
    }

    // Inicializa mostrando la primera imagen
    showImage(currentIndex);

    // Cambia de imagen cada 3 segundos (o el tiempo que desees)
    setInterval(nextImage, 3000); // 3000ms = 3 segundos

    // ***** NUEVO CÓDIGO PARA LA APARICIÓN DE SECCIONES *****

    const featuresSection = document.querySelector('.features-section');

    // Opciones para el Intersection Observer
    const observerOptions = {
        root: null, // Observar el viewport
        rootMargin: '0px', // No hay margen extra
        threshold: 0.2 // Cuando el 20% de la sección sea visible
    };

    // Crear el observador
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            // Si la sección es visible
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in'); // Agrega la clase para animar
                observer.unobserve(entry.target); // Deja de observar una vez que se ha animado
            }
        });
    }, observerOptions);

    // Empezar a observar la sección de características
    if (featuresSection) {
        observer.observe(featuresSection);
    }
});