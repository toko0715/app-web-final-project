document.addEventListener('DOMContentLoaded', function () {
    const navItems = document.querySelectorAll('.account-sidebar .nav-item');
    const contentSections = document.querySelectorAll('.account-main-content .content-section');

    // Function to show a specific content section
    function showContent(contentId) {
        contentSections.forEach(section => {
            section.classList.remove('active');
        });
        document.getElementById(contentId + '-content').classList.add('active');
    }

    // Event listeners for sidebar navigation
    navItems.forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent default link behavior
            navItems.forEach(nav => nav.classList.remove('active')); // Remove active from all nav items
            this.classList.add('active'); // Add active to clicked nav item
            showContent(this.dataset.content); // Show corresponding content
        });
    });

    // --- Logic for showing/hiding content based on product existence ---

    // Example: Simulate having products for favorites
    // Set this to true to see favorite products and buttons, false for the "add some" message.
    const hasFavoriteProducts = false; // Change to true to test content visibility

    const noFavoritesMessage = document.getElementById('no-favorites-message');
    const hasFavoritesContent = document.getElementById('has-favorites-content');

    if (hasFavoriteProducts) {
        noFavoritesMessage.classList.add('hidden-content');
        hasFavoritesContent.classList.remove('hidden-content');
    } else {
        noFavoritesMessage.classList.remove('hidden-content');
        hasFavoritesContent.classList.add('hidden-content');
    }

    // Example: Simulate having orders for history
    // Set this to true to see order history, false for the "no orders" message.
    const hasOrders = false; // Change to true to test content visibility

    const noOrdersMessage = document.getElementById('no-orders-message');
    const hasOrdersContent = document.getElementById('has-orders-content');

    if (hasOrders) {
        noOrdersMessage.classList.add('hidden-content');
        hasOrdersContent.classList.remove('hidden-content');
    } else {
        noOrdersMessage.classList.remove('hidden-content');
        hasOrdersContent.classList.add('hidden-content');
    }

    // Initialize content visibility on page load (show "Información" by default)
    showContent('informacion');
});