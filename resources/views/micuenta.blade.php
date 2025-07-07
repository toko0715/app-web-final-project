<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta - Orbytax</title>
    @vite('resources/css/micuenta.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <a href="/carrito" class="nav-icon cart-button"> 
                    <img src="img/carritodecompras.png" alt="Carrito de Compras" class="custom-icon cart-icon-img">
                </a>
                <a href="/cuenta" class="nav-icon profile-button">
                    <img src="img/Perfil.png" alt="Perfil" class="custom-icon profile-icon-img">
                </a>
            </div>
        </nav>
    </header>

    <div class="account-page-container">
        <aside class="account-sidebar">
            <h2 class="sidebar-title">Mi cuenta</h2>
            <nav class="sidebar-nav">
                <ul class="nav-list">
                    <li class="nav-item active" data-content="informacion">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user"></i>
                            Información
                        </a>
                    </li>
                    <li class="nav-item" data-content="favoritos">
                        <a href="#" class="nav-link">
                            <i class="fas fa-heart"></i>
                            Mis favoritos
                        </a>
                    </li>
                    <li class="nav-item" data-content="historial">
                        <a href="#" class="nav-link">
                            <i class="fas fa-history"></i>
                            Historial y detalles de mis pedidos
                        </a>
                    </li>
                    <li class="nav-item" data-content="direccion">
                        <a href="#" class="nav-link">
                            <i class="fas fa-map-marker-alt"></i>
                            Mi dirección
                        </a>
                    </li>
                    <li class="nav-item logout" data-content="logout">
                        <a href="#" class="nav-link">
                            <i class="fas fa-sign-out-alt"></i>
                            Cerrar sesión
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="account-main-content">
            <div id="informacion-content" class="content-section active">
                <h2 class="content-title">
                    <i class="fas fa-user"></i>
                    Información
                </h2>
                <div class="form-and-image-wrapper">
                    <form class="profile-form">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" id="name" placeholder="Ingresa tu nombre">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Apellidos</label>
                            <input type="text" id="lastname" placeholder="Ingresa tus apellidos">
                        </div>
                        <div class="form-group full-width">
                            <label for="email">Correo electrónico</label>
                            <input type="email" id="email" placeholder="Ingresa tu correo electrónico">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña actual</label>
                            <input type="password" id="password" placeholder="Ingresa tu contraseña actual">
                        </div>
                        <div class="form-group">
                            <label for="new-password">Nueva Contraseña</label>
                            <input type="password" id="new-password" placeholder="Ingresa una nueva contraseña">
                        </div>

                        <div class="form-footer full-width">
                            <label class="privacy-checkbox">
                                <input type="checkbox">
                                Privacidad de los datos del cliente
                            </label>
                            <button type="submit" class="save-button">GUARDAR CAMBIOS</button>
                        </div>
                    </form>

                    <div class="profile-image-container">
                        <img src="img/iconprofile.png" alt="Profile Icon" class="profile-icon">
                    </div>
                </div>
            </div>

            <div id="favoritos-content" class="content-section">
                <h2 class="content-title">
                    <i class="fas fa-heart"></i>
                    Mis favoritos
                </h2>
<!-- iterar sobre productos favoritos!!!-->
<div class="form-and-image-wrapper">
    <div class="section-main-area">
        @if($favoritos->isEmpty())
            <div id="no-favorites-message" class="info-message">
                <p>Aquí verás tus productos y servicios favoritos. ¡Añade algunos!</p>
            </div>
        @else
            <div id="has-favorites-content">
                <div class="favorite-buttons-container">
                    @foreach ($favoritos as $favorito)
                        @php $producto = $favorito->producto; @endphp
                        @if ($producto)
                            <div class="favorite-card">
                                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" width="100">
                                <h3>{{ $producto->nombre }}</h3>
                                <p>{{ $producto->descripcion }}</p>
                                <p>Precio: S/. {{ number_format($producto->precio, 2) }}</p>

                                {{-- Botón para quitar de favoritos --}}
                                <form action="{{ route('favoritos.quitar') }}" method="POST" style="margin-top: 8px;">
                                    @csrf
                                    <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                    <button type="submit" class="remove-fav-button">Quitar de favoritos</button>
                                </form>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </div>

<!-- fin de iteracion-->

                    <div class="profile-image-container">
                        <img src="img/iconprofile.png" alt="Profile Icon" class="profile-icon">
                    </div>
                </div>
            </div>

            <div id="historial-content" class="content-section">
                <h2 class="content-title">
                    <i class="fas fa-history"></i>
                    Historial y detalles de mis pedidos
                </h2>
                <div class="form-and-image-wrapper">
                    <div class="section-main-area">
                        <div id="no-orders-message" class="info-message">
                            <p>Consulta el historial de tus pedidos y sus detalles. ¡Aún no tienes pedidos registrados!
                            </p>
                        </div>
                        <div id="has-orders-content" class="hidden-content">
                            <p>Aquí está tu historial de pedidos:</p>
                            <div class="order-history">
                                <div class="order-card">
                                    <h3>Pedido #12345</h3>
                                    <div class="order-details">
                                        <p><strong>Fecha de Pedido:</strong> 15/06/2025</p>
                                        <p><strong>Dirección:</strong> Av. Siempre Viva 742, Springfield</p>
                                        <p><strong>Forma de Pago:</strong> Tarjeta de Crédito (**** **** **** 1234)</p>
                                    </div>
                                </div>
                                <div class="order-card">
                                    <h3>Pedido #12346</h3>
                                    <div class="order-details">
                                        <p><strong>Fecha de Pedido:</strong> 20/05/2025</p>
                                        <p><strong>Dirección:</strong> Calle Falsa 123, Ciudad de México</p>
                                        <p><strong>Forma de Pago:</strong> PayPal</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-image-container">
                        <img src="img/iconprofile.png" alt="Profile Icon" class="profile-icon">
                    </div>
                </div>
            </div>

            <div id="direccion-content" class="content-section">
                <h2 class="content-title">
                    <i class="fas fa-map-marker-alt"></i>
                    Mi dirección
                </h2>
                <div class="form-and-image-wrapper">
                    <div class="section-main-area">
                        <form class="profile-form address-form">
                            @csrf
                            <div class="form-group">
                                <label for="addressName">Nombre</label>
                                <input type="text" id="addressName" placeholder="Tu nombre">
                            </div>
                            <div class="form-group">
                                <label for="addressLastName">Apellidos</label>
                                <input type="text" id="addressLastName" placeholder="Tus apellidos">
                            </div>
                            <div class="form-group full-width">
                                <label for="addressLocation">Lugar donde se recibirá</label>
                                <input type="text" id="addressLocation"
                                    placeholder="Ej: Mi casa, Oficina, Casa de un amigo">
                            </div>
                            <div class="form-group full-width">
                                <label for="addressPhone">Número telefónico</label>
                                <input type="tel" id="addressPhone" placeholder="+51 987 654 321">
                            </div>
                            <div class="form-group full-width">
                                <label for="addressDetails">Dirección</label>
                                <textarea id="addressDetails" rows="4"
                                    placeholder="Av. Principal 123, Dpto 4A, Urb. El Sol, Distrito, Ciudad, País"></textarea>
                            </div>
                            <div class="form-footer full-width">
                                <button type="submit" class="save-button">Guardar dirección</button>
                            </div>
                        </form>
                    </div>
                    <div class="profile-image-container">
                        <img src="img/iconprofile.png" alt="Profile Icon" class="profile-icon">
                    </div>
                </div>
            </div>

            <div id="logout-content" class="content-section">
                <h2 class="content-title">
                    <i class="fas fa-sign-out-alt"></i>
                    Cerrar sesión
                </h2>
                <div class="form-and-image-wrapper">
                    <div class="section-main-area" style="text-align: center; padding-top: 0px; padding-bottom: 30px;">
                        <div class="favorite-buttons-container" style="justify-content: center;">
                            <a href="/salir" class="action-button logout-confirm-button"
                                style="background-color: #e74c3c; color: white;">CONFIRMAR CIERRE DE SESIÓN</a>
                        </div>
                    </div>
                    <div class="profile-image-container">
                        <img src="img/iconprofile.png" alt="Profile Icon" class="profile-icon">
                    </div>
                </div>
            </div>

        </main>
    </div>

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
@vite('resources/js/script.js')
@vite('resources/js/micuenta.js')
</html>