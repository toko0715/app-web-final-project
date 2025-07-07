<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras - OrbytaX</title>
    @vite('resources/css/carritocompras.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header class="main-header">
        <div class="top-banner">
            <p>¿Nuevo aquí? ¡Ahorra 20%! con el código YR24</p>
        </div>
        <nav class="navbar">
            <div class="navbar-left">
                <a href="/" class="nav-button">Inicio</a>
                <a href="/catalogo" class="nav-button">Catálogo</a>
                <a href="/soporte" class="nav-button">Soporte</a>
            </div>

            <div class="navbar-logo">
                <a href="/">
                    <img src="img/LogoOrbytaX.png" alt="LogoOrbytax">
                </a>
            </div>

            <div class="navbar-right">
                <div class="dropdown">
                    <button class="dropbtn nav-button">
                        ESP <i class="fas fa-caret-down"></i></button>
                    <div class="dropdown-content">
                        <a href="/">ENG</a>
                        <a href="/">FRA</a>
                    </div>
                </div>
                <a href="/" class="nav-icon">
                    <img src="img/Whatsapp.png" alt="Whatsapp" class="custom-icon whatsapp-icon">
                </a>
                <a href="/" class="nav-icon">
                    <img src="img/Instagram.png" alt="Instagram" class="custom-icon Instagram-icon">
                </a>
                <a href="/" class="nav-icon">
                    <img src="img/X.png" alt="Twitter" class="custom-icon X-icon">
                </a>
                <a href="/carrito" class="nav-icon cart-button"> 
                    <img src="img/carritodecompras.png" alt="Carrito de Compras" class="custom-icon cart-icon-img">
                </a>
                <a href="/cuenta" class="nav-icon profile-button">
                    <img src="img/Perfil.png" alt="Perfil" class="custom-icon profile-icon-img">
                </a>
            </div>
        </nav>
    </header>

    <main class="cart-main-content">
        <h1>Carrito de compras</h1>
        <div class="cart-container">
            <div class="cart-items-section">
                <div class="cart-header">
                    <span class="header-item">Artículo</span>
                    <span class="header-price">Precio</span>
                    <span class="header-qty">Cant.</span>
                    <span class="header-subtotal">Subtotal</span>
                    <span></span>
                </div>
    @forelse ($items as $item)
        @php
            $producto = $item->producto;
        @endphp
        <div class="cart-item">
            <div class="cart-item-details">
                <img src="{{ asset('/img/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="cart-item-image">
                <span class="cart-item-name">{{ $producto->nombre }}</span>
            </div>
            <span class="cart-item-price">S/ {{ number_format($item->precio_unitario, 2) }}</span>
            <div class="cart-item-qty-controls">
                <span>{{ $item->cantidad }}</span>
            </div>
            <span class="cart-item-subtotal">S/ {{ number_format($item->subtotal, 2) }}</span>
        </div>
    @empty
        <p>No tienes productos en el carrito.</p>
    @endforelse
                <div class="cart-actions">
                    <div class="coupon-section" style="display:none">
                        <input type="text" id="coupon-input" placeholder="Código cupón">
                        <button id="apply-coupon-btn">APLICAR DESCUENTO</button>
                    </div>

                    <form action="{{ route('carrito.vaciar') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" id="clear-cart-btn" class="clear-cart-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>

                    <button id="update-cart-btn" style="display:none">ACTUALIZAR CARRITO</button>
                </div>
            </div>

            <div class="cart-summary-section">
                <h2>Resumen</h2>
            @php
                $total = collect($items)->sum(fn($item) => $item->cantidad * $item->precio_unitario);
            @endphp

            <span id="summary-total">S/ {{ number_format($total, 2) }}</span>

            <form action="{{ route('carrito.checkout') }}" method="POST">
                @csrf
                <button type="submit" id="checkout-btn">REALIZAR PEDIDO</button>
            </form>

            </div>
        </div>

        <section class="features-section">
            <div class="feature-item">
                <i class="fas fa-truck"></i>
                <h3>Envío a todo el Perú</h3>
                <p>Envíos rápidos y seguros a nivel nacional.</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-store"></i>
                <h3>Showroom exclusivo</h3>
                <p>Visítanos en nuestra tienda física.</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-headset"></i>
                <h3>Atención al cliente</h3>
                <p>Te ayudamos en lo que necesites.</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-shield-alt"></i>
                <h3>Compra segura</h3>
                <p>Tus datos protegidos en cada compra.</p>
            </div>
        </section>
    </main>

    <footer class="main-footer">
        <div class="footer-content">
            <div class="footer-column">
                <h4>Únete a OrbytaX Futuristic Website</h4>
                <div class="newsletter-form">
                    <input type="email" placeholder="Your Email">
                    <input type="email" placeholder="Enter your Email">
                    <button type="submit">Suscribir</button>
                </div>
                <div class="social-icons">
                    <a href="/"><i class="fab fa-facebook-f"></i></a>
                    <a href="/"><i class="fab fa-instagram"></i></a>
                    <a href="/"><i class="fab fa-twitter"></i></a>
                    <a href="/"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <div class="footer-column">
                <h4>Company</h4>
                <ul>
                    <li><a href="/">About Us</a></li>
                    <li><a href="/">Careers</a></li>
                    <li><a href="/">Press & Media</a></li>
                    <li><a href="/">Blog</a></li>
                    <li><a href="/">Investor Relations</a></li>
                    <li><a href="/">Sustainability</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h4>Support</h4>
                <ul>
                    <li><a href="/">Help Center</a></li>
                    <li><a href="/">Contact Us</a></li>
                    <li><a href="/">FAQs</a></li>
                    <li><a href="/">Service Status</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h4>Futuristic AI & Technology</h4>
                <p>Norch is your premier destination for groundbreaking AI and technology solutions.</p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>Norte - Futuristic AI Website</p>
            <div class="contact-info">
                <span><i class="fas fa-map-marker-alt"></i> Tecsup, Santa Anita, Software design and development innovations</span>
                <span><i class="fas fa-envelope"></i> alexis0101@gmail.com</span>
                <span><i class="fas fa-phone"></i> +51 997 406 726</span>
            </div>
        </div>
    </footer>

</body>
    @vite('resources/js/carritocompras.js')
</html>