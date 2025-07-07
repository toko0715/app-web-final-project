<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte Gaming - Centro de Ayuda</title>
    @vite('resources/css/Soporte.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
                </div>
            </nav>
        </a>
    </header>
    <div class="background-overlay"></div>
    
    <div class="container">
        <div class="header">
            <h1>Centro de Soporte</h1>
            <p>Encuentra soluciones rápidas para todos tus dispositivos gaming</p>
        </div>

        <div class="search-section">
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Busca tu problema o dispositivo...">
                <div class="search-icon"><img src="img/Lupa.png" alt="search-icon"></div>
            </div>
        </div>

        <div class="cards-grid">
            <!-- TECLADOS -->
            <div class="support-card" data-category="teclados">
                <div class="card-icon">
                <img src="img/producto 2.png" alt="Teclado" style="width: 140%; height: 140%; object-fit: contain;">
                </div>
                <h3 class="card-title">Teclados</h3>
                <ul class="card-topics">
                    <li>Configuración RGB</li>
                    <li>Solución de teclas</li>
                    <li>Software de macros</li>
                    <li>Mantenimiento</li>
                </ul>
            </div>

            <!-- MOUSES -->
            <div class="support-card" data-category="mouses">
                <div class="card-icon">
                <img src="img/producto 3.png" alt="Mouse" style="width: 140%; height: 140%; object-fit: contain;">
                </div>
                <h3 class="card-title">Mouses</h3>
                <ul class="card-topics">
                    <li>Configuración DPI</li>
                    <li>Problemas de conexión</li>
                    <li>Software de personalización</li>
                    <li>Limpieza</li>
                </ul>
            </div>

            <!-- AURICULARES -->
            <div class="support-card" data-category="auriculares">
                <div class="card-icon">
                <img src="img/producto 1.png" alt="Auriculares" style="width: 140%; height: 140%; object-fit: contain;">
                </div>
                <h3 class="card-title">Auriculares</h3>
                <ul class="card-topics">
                    <li>Configuración de sonido</li>
                    <li>Problemas de micrófono</li>
                    <li>Conectividad inalámbrica</li>
                    <li>Drivers</li>
                </ul>
            </div>

            <!-- MONITORES -->
            <div class="support-card" data-category="monitores">
                <div class="card-icon">
                    <img src="img/producto 4.png" alt="Monitor" style="width: 110%; height: 110%; object-fit: contain;"> 
                </div>
                <h3 class="card-title">Monitores</h3>
                <ul class="card-topics">
                    <li>Configuración de resolución</li>
                    <li>Problemas de pantalla</li>
                    <li>Calibración de color</li>
                    <li>Conectividad HDMI/DisplayPort</li>
                    <li>Frecuencia de actualización</li>
                    <li>FreeSync/G-Sync</li>
                </ul>
            </div>

            <!-- CÁMARAS WEB -->
            <div class="support-card" data-category="camaras">
                <div class="card-icon">
                <img src="img/camara web.png" alt="Cámara" style="width: 140%; height: 140%; object-fit: contain;">
                </div>
                <h3 class="card-title">Cámaras Web</h3>
                <ul class="card-topics">
                    <li>Instalación y drivers</li>
                    <li>Problemas de video</li>
                    <li>Configuración resolución/FPS</li>
                    <li>Micrófono integrado</li>
                    <li>Iluminación y entorno</li>
                    <li>Compatibilidad software</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer -->
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

    <!-- Chatbot -->
    <div class="chatbot-container">
        <button class="chatbot-toggle" id="chatbotToggle"></a></button>
        <div class="chatbot-popup" id="chatbotPopup">
            <div class="chatbot-header">
                <h3>Asistente de Soporte</h3>
                <p style="color: #b0b0b0; font-size: 0.9rem;">¿En qué puedo ayudarte?</p>
            </div>
            <div class="chatbot-messages" id="chatbotMessages">
                <div style="background: rgba(255, 107, 53, 0.1); padding: 1rem; border-radius: 10px; margin-bottom: 1rem;">
                    <p>¡Hola! Soy tu asistente de soporte. Puedo ayudarte con problemas de teclados, mouses, auriculares, monitores y cámaras web. ¿Qué necesitas?</p>
                </div>
            </div>
            <div class="chatbot-input">
                <input type="text" placeholder="Escribe tu consulta..." id="chatbotInput">
            </div>
        </div>
    </div>
</body>
@vite('resources/js/Soporte.js')
</html>