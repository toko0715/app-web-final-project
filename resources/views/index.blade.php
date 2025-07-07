<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orbytax - Mi Página</title>
    @vite('resources/css/style.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    <section class="hero-section">
        <div class="carousel-background">
            <img src="img/Fondo Wallpapper 1.png" alt="Fondo 1" class="carousel-image active">
            <img src="img/Fondo Wallpapper 2.png" alt="Fondo 2" class="carousel-image">
            <img src="img/Fondo Wallpapper 3.png" alt="Fondo 3" class="carousel-image">
            <img src="img/Fondo Wallpapper 4.png" alt="Fondo 4" class="carousel-image">

            <div class="product-presentation-container">
                <img src="img/producto 1.png" alt="Producto 1" class="product-image active">
                <img src="img/producto 2.png" alt="Producto 2" class="product-image">
                <img src="img/producto 3.png" alt="Producto 3" class="product-image">
                <img src="img/producto 4.png" alt="Producto 4" class="product-image">
            </div>
        </div>
    </section>

    <main class="main-content">
        <section class="features-section">
            <div class="feature-item">
                <i class="fas fa-shipping-fast feature-icon"></i>
                <h3>Envío a todo el Perú</h3>
                <p>Trabajamos con las mejores empresas logísticas.</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-store feature-icon"></i>
                <h3>Showroom exclusivo</h3>
                <p>Visítanos en nuestra tienda física.</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-headset feature-icon"></i>
                <h3>Atención al cliente</h3>
                <p>Te ayudamos en lo que necesites.</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-shield-alt feature-icon"></i>
                <h3>Compras seguras</h3>
                <p>Todas tus compras están protegidas.</p>
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
@vite('resources/js/script.js')
</html>