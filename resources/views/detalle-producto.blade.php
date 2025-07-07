<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Producto - Auriculares Asus Rog Strix Fusion 500</title>
    <!-- Enlaza tus archivos CSS aquí -->
    @vite('resources/css/style.css')
    @vite('resources/css/detalle-producto.css')
    <!-- Font Awesome para los iconos si lo usas -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <header class="main-header">
        <nav class="navbar">
            <div class="navbar-left">
                <a href="/" class="nav-button">Inicio</a>
                <a href="/catalogo" class="nav-button">Catálogo</a>
                <a href="/soporte" class="nav-button">Soporte</a>
            </div>

            <div class="navbar-logo">
                <a href="/">
                    <img src="/img/LogoOrbytaX.png" alt="LogoOrbytax">
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
                    <img src="/img/Whatsapp.png" alt="Whatsapp" class="custom-icon whatsapp-icon">
                </a>
                <a href="/" class="nav-icon">
                    <img src="/img/Instagram.png" alt="Instagram" class="custom-icon Instagram-icon">
                </a>
                <a href="/" class="nav-icon">
                    <img src="/img/X.png" alt="Twitter" class="custom-icon X-icon">
                </a>
                <a href="/carrito" class="nav-icon cart-button"> 
                    <img src="/img/carritodecompras.png" alt="Carrito de Compras" class="custom-icon cart-icon-img">
                </a>
                <a href="/cuenta" class="nav-icon profile-button">
                    <img src="/img/Perfil.png" alt="Perfil" class="custom-icon profile-icon-img">
                </a>
            </div>
        </nav>
    </header>

    <main class="product-detail-main-content">
        <section class="product-hero-section">
            <div class="product-image-container">
                <img src="{{ asset('img/' . $producto->imagen) }}" alt="{{ $producto->nombre }}">
            </div>
            <div class="product-info">
                <div>
                <h1 class="product-title">{{ $producto->nombre }}</h1>
                <p class="product-description-full">{{ $producto->descripcion }}</p>
                    <div class="product-rating" style="display: none">
                        <!-- Iconos de estrellas, por ejemplo con Font Awesome -->
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="far fa-star"></i>
                    </div>
                </div>
                <div>
                    <p class="product-price-large">S/ {{ number_format($producto->precio, 2) }}</p>
                    <div class="quantity-add-to-cart">
                        <div class="quantity-controls" style="display:none">
                            <button class="quantity-button" data-action="decrease">-</button>
                            <input type="number" class="quantity-input" value="1" min="1">
                            <button class="quantity-button" data-action="increase">+</button>
                        </div>
                        @php
                            $usuario = \App\Models\Usuario::where('name', session('user'))->first();
                            $esFavorito = false;

                            if ($usuario) {
                                $esFavorito = \App\Models\Favorito::where('usuario_id', $usuario->id)
                                            ->where('producto_id', $producto->id)
                                            ->exists();
                            }
                        @endphp
                        <form action="{{ $esFavorito ? route('favoritos.quitar') : route('favoritos.agregar') }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                            <button type="submit" class="favorite-button" title="{{ $esFavorito ? 'Quitar de favoritos' : 'Agregar a favoritos' }}">
                                <i class="{{ $esFavorito ? 'fas' : 'far' }} fa-heart"></i>
                            </button>
                        </form>

                    <form action="{{ route('carrito.agregar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                        <input type="number" name="cantidad" value="1" min="1">
                        <button type="submit">Agregar al carrito</button>
                    </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="you-might-like-section" style="display:none">
            <h2>También te puede interesar</h2>
            <div class="recommended-products-grid">
                <!-- Ejemplo de una tarjeta de producto, repite según necesites -->
                <a href="/" class="recommended-product-card">
                    <img src="/img/te puede interesar 1.png" alt="Monitor Gamer" class="recommended-product-image-small">
                    <div class="product-status">Disponible</div>
                    <h3 class="recommended-product-name-small">Audífonos Gamer Inalámbricos Astro A50 Ps4 Ps5 Pc Ngo/
                        Azul Color Negro</h3>
                    <div class="product-rating-recommended">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="recommended-product-price-small">S/ 480</p>
                </a>
                <a href="/" class="recommended-product-card">
                    <img src="/img/te puede interesar 2.png" alt="Mouse Gamer RGB"
                        class="recommended-product-image-small">
                    <div class="product-status">Disponible</div>
                    <h3 class="recommended-product-name-small">
                        Teclado ASUS XA05 ROG STRIX SCOPE RX/RD/US Rgb Gaming ROG RX RED Optical Mechanical Switch USB
                        2.0
                    </h3>
                    <div class="product-rating-recommended">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="recommended-product-price-small">S/ 400</p>
                </a>
                <a href="/" class="recommended-product-card">
                    <img src="/img/te puede interesar 3.png" alt="Teclado Mecánico"
                        class="recommended-product-image-small">
                    <div class="product-status">Disponible</div>
                    <h3 class="recommended-product-name-small">Auriculares gaming MH4V2 con innovadora tecnología
                        Sensus, sonido Surround 7.2.
                    </h3>
                    <div class="product-rating-recommended">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="recommended-product-price-small">S/ 250</p>
                </a>
                <a href="/" class="recommended-product-card">
                    <img src="/img/te puede interesar 4.png" alt="Silla Gamer Ergonómica"
                        class="recommended-product-image-small">
                    <div class="product-status">Disponible</div>
                    <h3 class="recommended-product-name-small">Mouse Razer NAGA X MMO 18K DPI 16 BOTONES CHROMA BLACK
                        (RZ01-03590100-R3U1)</h3>
                    <div class="product-rating-recommended">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="recommended-product-price-small">S/ 170</p>
                </a>
                <!-- Repite más tarjetas si es necesario -->
            </div>
        </section>

        <section class="features-section" style="display:none">
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
                <span><i class="fas fa-map-marker-alt"></i> Tecsup, Santa Anita, Software design and development
                    innovations</span>
                <span><i class="fas fa-envelope"></i> alexis0101@gmail.com</span>
                <span><i class="fas fa-phone"></i> +51 997 406 726</span>
            </div>
        </div>
    </footer>

</body>
    @vite('resources/js/detalle-producto.js')
</html>