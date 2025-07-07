<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/iniciarsesion.css')
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Iniciar Sesión</title>
</head>
<body>
    <div class="login-container">
        <h1 class="title">Iniciar Sesión</h1>

        <form action="/" method="post">
            @csrf
            <input type="hidden" name="action" value="login">
            <div class="form-group">
                <label class="correoelectronico-label">Correo electronico</label>
                <div class="correoeletronico-field">
                <input type="email" name="email" class="input-field" placeholder="yourname@gmail.com" required>
            </div>
            
            <div class="form-group">
                <label class="password-label">Contraseña</label>
                <div class="password-field">
                    <input type="password" name="password" class="password-input" placeholder="••••••••" id="passwordInput" required>
                    <button type="button" class="password-toggle" onclick="togglePassword()">
                        <img id="toggleIcon" src="img/passwordonn.png" alt="Mostrar/Ocultar Contraseña">
                    </button>
                </div>
            </div>
            
            <button type="submit" class="login-btn">Iniciar Sesión</button>
        </form>
        @if (session('error'))
            <br>
            <h2>{{ session('error') }}</h2>
        @endif
        
        <div class="create-account">
            <p class="create-account-text">¿No tienes una cuenta? Crea una aquí</p>
            <a href="/registrar" class="create-btn">Crear Cuenta</a>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('passwordInput');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.src = 'img/passwordonn.png'; // Path to your "password visible" eye icon
            } else {
                passwordInput.type = 'password';
                toggleIcon.src = 'img/passwordoff.png'; // Path to your "password hidden" eye icon
            }
        }
    </script>
</body>
</html>