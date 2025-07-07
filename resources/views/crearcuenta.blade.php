<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/crearcuenta.css')
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Crear Cuenta</title>
</head>
<body>
    <div class="login-container">
        <h1 class="title">CREAR UNA CUENTA</h1>
        
        <form method="POST" action="/">
            @csrf
            <input type="hidden" name="action" value="registrar">
            <div class="form-group">
                <label class="label">Nombre de usuario</label>
                <div class="input-field-wrapper">
                    <i class="fa-solid fa-user icon"></i>
                    <input type="text" name="username" class="input-field" placeholder="@yourname">
                </div>
            </div>

            <div class="form-group">
                <label class="label">Correo electronico</label>
                <div class="input-field-wrapper">
                    <i class="fa-solid fa-envelope icon"></i>
                    <input type="email" name="email" class="input-field" placeholder="yourname@gmail.com">
                </div>
            </div>
            
            <div class="form-group">
                <label class="label">Contraseña</label>
                <div class="password-field">
                    <i class="fa-solid fa-key icon"></i>
                    <input type="password" name="password" class="password-input" placeholder="••••••••" id="passwordInput">
                    <div class="password-strength">--- Strong</div>
                </div>
            </div>

            <div class="form-group">
                <label class="label">Fecha de Nacimiento</label>
                <div class="input-field-wrapper">
                    
                    <input type="date" name="nacimiento" class="input-field date-input" placeholder="" required>
                </div>
            </div>
            <div class="register-account">
            <button type="submit" class="register-btn">REGISTRARSE</button>
        </form>
        @if (session('error'))
            <br>
            <h2>{{ session('error')}}</h2>
        @endif
        </div>
    </div>
</body>
</html>