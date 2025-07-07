<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrbytaX - Catálogo</title>
    @vite('resources/css/Catalogo.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        xintegrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <header class="main-header">
        <nav class="navbar">
            <div class="navbar-left">
                <a href="/" class="nav-button">Inicio</a>
                <a href="/catalogo" class="nav-button active">Catálogo</a>
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

    <main class="catalog-main-content">
        <section class="catalog-top-bar">
            <h1 class="catalog-title">CATÁLOGO</h1>
            <div class="filters-search-area">
                <div class="order-by-date" style="visibility: hidden">
                    <label for="order-date">Ordenar por fecha:</label>
                    <input type="date" id="order-date" class="date-picker">
                </div>
                <div class="search-input-container">
                    <form action="/catalogo" method="GET">
                    <input type="text" name="query" placeholder="Buscar productos..." class="catalog-search-input" value="{{ request('query') }}" required>
                    <button type="submit" class="catalog-search-button"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="show-items" style="display: none">
                    <label for="show-quantity">Mostrar:</label>
                    <select id="show-quantity" class="quantity-select">
                        <option value="12">12</option>
                        <option value="48">48</option>
                        <option value="64">64</option>
                        <option value="all">Todo</option>
                    </select>
                </div>
            </div>
        </section>

        <div class="catalog-grid-container">
            <aside class="catalog-sidebar">
                <div class="sidebar-card category-filter-card">
                    <h3>PERIFÉRICOS PC</h3>
                    <ul>
<!-- ajustar categoria en base a la db no olvidaarrrr-->
                        <li><a href="/teclados" data-category="teclados">Teclados</a></li>
                        <li><a href="/mouses" data-category="mouses">Mouses</a></li>
                        <li><a href="/auriculares" data-category="auriculares">Auriculares</a></li>
                        <li><a href="/microfonos" data-category="microfonos">Micrófonos</a></li>
                        <li><a href="/gamepads" data-category="gamepads">Gamepads</a></li>
                        <li><a href="/webcams" data-category="webcams">Webcams</a></li>
                        <li><a href="/monitores" data-category="monitores">Monitores</a></li>
                    </ul>
                </div>
<!-- aqui termina categoria-->
                <div class="sidebar-card availability-filter-card" style="display: none">
                    <h3>DISPONIBILIDAD</h3>
                    <div class="filter-option">
                        <span>En Stock</span>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="filter-option">
                        <span>Próximamente</span>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="filter-option">
                        <span>Oferta Limitada</span>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>

                <div class="sidebar-card price-filter-card" style="display: none">
                    <h3>PRECIO</h3>
                    <div class="price-range-slider">
                        <input type="range" min="0" max="1000" value="500" class="slider" id="price-range">
                        <div class="price-value">S/ <span id="current-price">500</span></div>
                    </div>
                </div>

                <div class="sidebar-card recommended-products-card" style="display: none">
                    <h3>TE PUEDE INTERESAR</h3>
                    <div class="recommended-product-item">
                        <img src="img/laptop msi.png" alt="Producto Recomendado 1" class="recommended-product-image">
                        <div class="recommended-product-details">
                            <p class="recommended-product-name">Msi Laptop Gaming...</p>
                            <p class="recommended-product-price">S/ 3,500.00</p>
                        </div>
                    </div>
                    <div class="recommended-product-item">
                        <img src="img/nintendo.png" alt="Producto Recomendado 2" class="recommended-product-image">
                        <div class="recommended-product-details">
                            <p class="recommended-product-name">Nintendo Switch V2, negra con Joycon OEM azul/rojo</p>
                            <p class="recommended-product-price">S/ 1,009.00</p>
                        </div>
                    </div>
                    <!-- Agrega estos 3 productos adicionales aquí -->
                    <div class="recommended-product-item">
                        <img src="img/mando PS5.png" alt="Producto Recomendado 3" class="recommended-product-image">
                        <div class="recommended-product-details">
                            <p class="recommended-product-name">Mando PS5 Theme The Last of Us Edición limitada</p>
                            <p class="recommended-product-price">S/ 350</p>
                        </div>
                    </div>
                    <div class="recommended-product-item">
                        <img src="img/metaquest.png" alt="Producto Recomendado 4" class="recommended-product-image">
                        <div class="recommended-product-details">
                            <p class="recommended-product-name">Meta Quest 3 512 GB - Gafas de Realidad Virtual</p>
                            <p class="recommended-product-price">S/ 3,499.90</p>
                        </div>
                    </div>
                    <div class="recommended-product-item">
                        <img src="img/silla gamer.png" alt="Producto Recomendado 5" class="recommended-product-image">
                        <div class="recommended-product-details">
                            <p class="recommended-product-name">Silla Gamer COUGAR ARMOR ELITE ROYAL</p>
                            <p class="recommended-product-price">S/ 3,500.00</p>
                        </div>
                    </div>
                </div>
            </aside>
        <div class="products-section featured-products">
            <section class="products-display-area">
                <div class="products-section new-products">
                    <h2>PRODUCTOS NUEVOS</h2>
                    <div class="product-grid"></div>
                    <!--iterar -->
                    @if(isset($productos))
                        @forelse($productos as $producto)
                            <div class="product-card">
                                    <a href="/detalle-producto/{{ $producto->id }}">
                                        <img src="/img/{{ $producto->imagen }}" alt="" class="product-image">
                                        <div class="product-details">
                                    </a>
                                    <p class="product-description">{{ $producto->descripcion }}</p>
                                    <div class="product-rating" style="display: none">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <p class="product-price">S/ {{ $producto->precio }}</p>
                                </div>
                            </div>
                            </div>
                        @empty
                            <h4>No se encontraron productos</h4>
                        @endforelse
                    @endif
                <!--dejar de iterar -->

                </div>
        </div>
        </div>

        <div class="products-section featured-products" style="display:none">
            <h2>PRODUCTOS DESTACADOS</h2>
            <div class="product-grid">
                <div class="product-card">
                    <a href="/detalle-producto">
                        <img src="img/producto detalle producto.png" alt="Producto Destacado Teclado"
                            class="product-image">
                        <div class="product-details">
                    </a>
                    <p class="product-description">Auriculares Asus Rog Strix Fusion 500 Virtual 7.1</p>
                    <div class="product-rating">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="product-price">S/ 550</p>
                </div>
            </div>
            <div class="product-card">
                <img src="img/producto carta monitor.png" alt="Producto Destacado Mouse" class="product-image">
                <div class="product-details">
                    <p class="product-description">Mouse gaming ambidiestro con iluminación Chroma y botones
                        programables.</p>
                    <div class="product-rating">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="far fa-star"></i>
                    </div>
                    <p class="product-price">S/ 290</p>
                </div>
            </div>
            <div class="product-card">
                <img src="img/producto carta mouse.png" alt="Producto Destacado Auriculares" class="product-image">
                <div class="product-details">
                    <p class="product-description">Auriculares inalámbricos con cancelación de ruido activa y audio de
                        alta fidelidad.</p>
                    <div class="product-rating">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star-half-alt"></i><i class="far fa-star"></i>
                    </div>
                    <p class="product-price">S/ 420</p>
                </div>
            </div>
            <div class="product-card">
                <img src="img/producto carta teclado.png" alt="Producto Destacado Webcam" class="product-image">
                <div class="product-details">
                    <p class="product-description">Webcam 4K con enfoque automático y micrófono dual integrado para
                        streaming.</p>
                    <div class="product-rating">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="product-price">S/ 650</p>
                </div>
            </div>
        </div>
        </div>

        <div class="products-section special-offers" style="display: none">
            <h2>OFERTAS ESPECIALES</h2>
            <div class="product-grid">
                <div class="product-card">
                    <img src="img/producto carta cascos.png" alt="Oferta Teclado" class="product-image">
                    <div class="product-details">
                        <p class="product-description">Teclado RGB mecánico compacto con switches táctiles, ideal para
                            gaming.</p>
                        <div class="product-rating">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                        </div>
                        <p class="product-price">S/ <del>499</del> <span>S/ 375</span></p>
                    </div>
                </div>
                <div class="product-card">
                    <img src="img/producto carta monitor.png" alt="Oferta Mouse" class="product-image">
                    <div class="product-details">
                        <p class="product-description">Mouse gaming ultraligero con sensor óptico de 16000 DPI y 6
                            botones.</p>
                        <div class="product-rating">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="far fa-star"></i>
                        </div>
                        <p class="product-price">S/ <del>180</del> <span>S/ 140</span></p>
                    </div>
                </div>
                <div class="product-card">
                    <img src="img/producto carta teclado.png" alt="Oferta Auriculares" class="product-image">
                    <div class="product-details">
                        <p class="product-description">Auriculares con cable y micrófono desmontable, para PC y
                            consolas.</p>
                        <div class="product-rating">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star-half-alt"></i><i class="far fa-star"></i>
                        </div>
                        <p class="product-price">S/ <del>250</del> <span>S/ 199</span></p>
                    </div>
                </div>
                <div class="product-card">
                    <img src="img/producto carta mouse.png" alt="Oferta Micrófono" class="product-image">
                    <div class="product-details">
                        <p class="product-description">Micrófono USB condensador para streaming y podcasting, con filtro
                            pop.</p>
                        <div class="product-rating">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="product-price">S/ <del>380</del> <span>S/ 300</span></p>
                    </div>
                </div>
            </div>
        </div>
        </section>
        </div>
        <section class="brands-section">
            <h2>MARCAS</h2>
            <div class="brands-grid">
                <a href="https://www.rog.asus.com/" target="_blank"><img src="img/asus rog.png" alt="ROG"></a>
                <a href="https://www.aoc.com/" target="_blank"><img src="img/AOC_International-Logo.wine 1.png"
                        alt="AOC"></a>
                <a href="https://www.razer.com/" target="_blank"><img src="img/logo RAZER.png" alt="Razer"></a>
                <a href="https://www.msi.com/" target="_blank"><img src="img/logo msi gaming.png" alt="MSI"></a>
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
    @vite('resources/js/Catologo.js')
</html>