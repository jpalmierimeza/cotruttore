<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/x-icon" href="./img/favicon-log.png" rel="icon" />
    <title>Inicio de Sesión</title>
    <script src="https://cdn.jsdelivr.net/npm/crypto-js@3.1.9-1/crypto-js.js"></script>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100%;
            background: linear-gradient(to right,rgb(58, 58, 83),rgb(88, 88, 87));
            display: flex;
            justify-content: center;
            align-items: center;
            
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            width: 100%;
            max-width: 280px;
        }

        h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 10px;
        }

        .register-btn {
            background-color: #28a745;
            color: white;
        }

        .login-btn {
            background-color: #007bff;
            color: white;
        }

        .toggle-btn {
            background-color: #f7f7f7;
            color: #333;
            border: none;
            cursor: pointer;
            padding: 8px;
            border-radius: 6px;
            font-size: 14px;
            width: 100%;
            margin-top: 20px;
        }
        .social-buttons {
      display: flex;
      justify-content:space-between;
      margin-top: 30px;
      padding-left: 10px;
    }
    </style>
</head>
<body>

<div class="container">
<span style="cursor: pointer;" class="close" onclick="closeModal()">&times;</span>
    
    <h2 id="formTitle">Inicio de sesión</h2>
    <img src="img/logo-user.png">
    <form id="form">
        <input type="email" id="email" placeholder="Correo electrónico" required>
        <input type="password" id="password" placeholder="Contraseña" required>
        <input type="text" id="name" placeholder="Nombre" style="display: none;">
        
        <!--<div class="social-buttons">
        <button style="margin:10px" class="google-btn"><img width="48" height="48" src="https://img.icons8.com/fluency/48/google-logo.png" alt="google-logo"/></button><br>
        <button style="margin:10px" class="facebook-btn"><img width="48" height="48" src="https://img.icons8.com/fluency/48/facebook-new.png" alt="facebook-new"/></button>
      </div>-->

        <button type="button" id="actionBtn" class="login-btn" onclick="submitForm()">Iniciar sesión</button>

        <button type="button" class="toggle-btn" onclick="toggleForm()">¿No tienes cuenta? Regístrate</button>
    </form>

    <div id="alertMessage" style="color: red; display: none;"></div>
</div>

<script>
    let isLogin = true;
   
    function encryptSHA1(password) {
        return CryptoJS.SHA1(password).toString(CryptoJS.enc.Hex);
    }

    async function submitForm() {
        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const encryptedPassword = encryptSHA1(password);
        

        

        const url = "auth.php"; // URL de tu archivo PHP
        const data = new FormData();
        
        if (isLogin) {
            data.append('action', 'login');
            data.append('correo', email);
            data.append('contrasena', encryptedPassword);
            
            
            
            

           
        } else {
            data.append('action', 'register');
            data.append('nombre', name);
            data.append('correo', email);
            data.append('contrasena', encryptedPassword);

        }

        try {
            const response = await fetch(url, {
                method: 'POST',
                body: data
            });

            const result = await response.json();
            if (result.mensaje) {
                showMessage(result.mensaje, 'green');
                window.location.href = ("index..php");
                
                
            } else {
                showMessage(result.error, 'red');
            }
        } catch (error) {
            showMessage('Ocurrió un error, intenta de nuevo.', 'red');
        }
    }

    

    function toggleForm() {
        isLogin = !isLogin;
        const formTitle = document.getElementById("formTitle");
        const actionBtn = document.getElementById("actionBtn");
        const nameInput = document.getElementById("name");
        const toggleBtn = document.querySelector(".toggle-btn");
      

        if (isLogin) {
            formTitle.textContent = "Inicio de sesión";
            actionBtn.textContent = "Iniciar sesión";
            nameInput.style.display = "none";
            toggleBtn.textContent = "¿No tienes cuenta? Regístrate";
          
            
        } else {
            formTitle.textContent = "Registro";
            actionBtn.textContent = "Registrar";
            nameInput.style.display = "block";
            toggleBtn.textContent = "¿Ya tienes cuenta? Inicia sesión";
        }
    }

    function showMessage(message, color) {
        const alertMessage = document.getElementById("alertMessage");
        alertMessage.style.color = color;
        alertMessage.textContent = message;
        alertMessage.style.display = 'block';

        setTimeout(() => {
            alertMessage.style.display = 'none';
        }, 3000);
    }

    function closeModal() {
        window.location.href = 'index.php';  // Redirige a la página index.php
        }
</script>

</body>
</html>
