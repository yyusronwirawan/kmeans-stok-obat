<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RSIA Bhakti Persada</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.login-container {
    display: grid;
    grid-template-columns: 1fr;
    max-width: 1200px;
    width: 100%;
    min-height: 100vh;
    background: #fff;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
}

@media (min-width: 768px) {
    .login-container {
        grid-template-columns: 1fr 1fr;
        border-radius: 24px;
        margin: 20px;
        min-height: 600px;
    }
}

.login-form-section {
    background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 50%, #0ea5e9 100%);
    padding: 2rem;
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: relative;
}

.welcome-content {
    max-width: 480px;
    text-align: center;
    margin-bottom: 2rem;
    z-index: 2;
}

.welcome-title {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 1rem;
    background: linear-gradient(45deg, #fff, #e0e7ff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.welcome-subtitle {
    font-size: 1rem;
    color: rgba(255,255,255,0.9);
}

.login-card {
    background: rgba(255,255,255,0.95);
    padding: 2rem;
    border-radius: 20px;
    max-width: 400px;
    width: 100%;
    z-index: 2;
    position: relative;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

.form-group {
    margin-bottom: 1.5rem;
    position: relative;
    z-index: 2;
}

.form-label {
    font-weight: 600;
    font-size: 0.95rem;
    margin-bottom: 0.5rem;
    display: block;
    color: #374151;
}

.input-group {
    position: relative;
    z-index: 2;
}

.input-group::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    border-radius: 16px;
    background: linear-gradient(45deg, #4f46e5, #3b82f6, #0ea5e9, #10b981);
    background-size: 400% 400%;
    animation: gradientShift 4s ease infinite;
    z-index: 0;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.input-group:focus-within::before {
    opacity: 1;
}

.input-group::after {
    content: '';
    position: absolute;
    top: 2px; left: 2px; right: 2px; bottom: 2px;
    background: #fff;
    border-radius: 14px;
    z-index: 1;
}

.form-input {
    position: relative;
    width: 100%;
    padding: 1rem 1.25rem;
    padding-left: 3.5rem;
    border: 2px solid #e5e7eb;
    border-radius: 16px;
    font-size: 1.05rem;
    color: #374151;
    background: transparent;
    z-index: 2;
}

.form-input:focus {
    outline: none;
    border-color: #4f46e5;
    background: #fefefe;
    box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.15);
}

.form-input::placeholder {
    color: #9ca3af;
    font-weight: 500;
}

.input-icon {
    position: absolute;
    left: 1.2rem;
    top: 50%;
    transform: translateY(-50%);
    font-size: 1.2rem;
    color: #6b7280;
    z-index: 3;
    pointer-events: none;
}

.input-icon.glow {
    animation: iconGlow 2s ease-in-out infinite alternate;
}

@keyframes iconGlow {
    0% { color: #4f46e5; text-shadow: 0 0 5px rgba(79, 70, 229, 0.5); }
    100% { color: #3b82f6; text-shadow: 0 0 15px rgba(59, 130, 246, 0.8); }
}

.login-button {
    width: 100%;
    padding: 1.25rem;
    background: linear-gradient(135deg, #4f46e5, #3b82f6, #0ea5e9, #10b981);
    border: none;
    color: white;
    font-weight: 700;
    border-radius: 16px;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.4s ease;
    margin-top: 1.5rem;
    animation: gradientShift 4s ease infinite;
    position: relative;
    z-index: 2;
}

.login-button:hover {
    transform: scale(1.03);
    box-shadow: 0 10px 30px rgba(79, 70, 229, 0.3);
}

@keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.alert {
    padding: 1rem;
    border-radius: 12px;
    font-size: 0.9rem;
    margin-bottom: 1rem;
}

.alert-success {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

.alert-warning {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
}

.image-section {
    display: none;
    position: relative;
    overflow: hidden;
    border-radius: 0 20px 20px 0;
    background: #f8fafc;
}

@media (min-width: 768px) {
    .image-section {
        display: block;
        width: 100%;
        height: auto;
    }
}

.hero-image {
    width: 100%;
    height: 100%;
    min-height: 400px;
    max-height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.3s ease;
    border-radius: 0 20px 20px 0;
}

.hero-image:hover {
    transform: scale(1.03);
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(90deg, rgba(0,0,0,0.1), rgba(0,0,0,0.15));
    z-index: 1;
    pointer-events: none;
}


.close {
    position: absolute;
    right: 1rem;
    top: 0.5rem;
    font-size: 1.2rem;
    background: none;
    border: none;
    cursor: pointer;
    color: white;
}

    </style>
</head>
<body>
    <div class="login-container">
        <!-- Form Section -->
        <div class="login-form-section">
            <div class="floating-shapes">
                <div class="shape"></div>
                <div class="shape"></div>
                <div class="shape"></div>
            </div>
            
            <div class="welcome-content">
                <h1 class="welcome-title">
                    <i class="fas fa-hospital-user"></i>
                    Selamat Datang
                </h1>
                <p class="welcome-subtitle">
                    Implementasi Algoritma K-Means Untuk Klasterisasi Pengelolaan Persediaan Stok Obat Pada Rsia Bhakti Persada Barat
                </p>
            </div>

            <div class="login-card">
                <div id="login">
                    <form name="form1" method="post" action="" enctype="multipart/form-data">
                        
                        <?php
                        error_reporting(0);
                        session_start();
                        include_once("koneksi.php");
                        
                        if($_POST["login"] != ""){ //jika tombol Login diklik
                            $user = $_POST["username"];
                            $pass = $_POST["password"];
                            
                            if($user != "" && $pass != ""){
                                include_once("koneksi.php");
                                $em = mysql_query("select * from admin where password = '$pass' AND username = '$user'");
                                $data = mysql_fetch_assoc($em);
                                
                                if ($data["username"] == $user && $data["password"] == $pass) {
                                    echo "<div class='alert alert-success alert-dismissable'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                            <i class='fas fa-check-circle'></i> Data Telah Ditemukan!!
                                          </div>";
                                    
                                    $_SESSION["useradmin"] = $data["username"];
                                    $_SESSION["passadmin"] = $data["password"];
                                    $_SESSION["nmadmin"] = $data["nm_lengkap"];
                                    
                                    echo "<script>window.location.href='index.php'</script>";
                                } else {
                                    echo "<div class='alert alert-warning alert-dismissable'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                            <i class='fas fa-exclamation-triangle'></i> <b>Data Tidak Ditemukan!!</b>
                                          </div>";
                                }
                            }
                        }
                        ?>

                        <div class="form-group">
                            <label for="username" class="form-label">
                                <i class="fas fa-user-circle"></i> Username
                            </label>
                            <div class="input-group">
                                <i class="fas fa-user-astronaut input-icon glow"></i>
                                <input 
                                    name="username" 
                                    type="text" 
                                    id="username" 
                                    class="form-input with-icon"
                                    placeholder="Enter your username"
                                    required
                                    autocomplete="username"
                                >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">
                                <i class="fas fa-shield-alt"></i> Password
                            </label>
                            <div class="input-group">
                                <i class="fas fa-key input-icon glow"></i>
                                <input 
                                    name="password" 
                                    type="password" 
                                    id="password" 
                                    class="form-input with-icon"
                                    placeholder="Enter your password"
                                    required
                                    autocomplete="current-password"
                                >
                            </div>
                        </div>

                        <input 
                            name="login" 
                            type="submit" 
                            value="LOGIN"
                            class="login-button"
                            id="loginBtn"
                        >
                    </form>
                </div>
            </div>
        </div>

        <!-- Image Section -->
        <div class="image-section">
            <img 
                src="bg.webp"
                alt="RSIA Bhakti Persada - Medical Facility"
                class="hero-image"
            >
            <div class="image-overlay"></div>
        </div>
    </div>

<script>
    // Tambah animasi partikel
    function createParticles(element) {
        const rect = element.getBoundingClientRect();
        const particles = 5;

        for (let i = 0; i < particles; i++) {
            const particle = document.createElement('div');
            particle.style.cssText = `
                position: fixed;
                width: 4px;
                height: 4px;
                background: linear-gradient(45deg, #4f46e5, #3b82f6);
                border-radius: 50%;
                pointer-events: none;
                z-index: 9999;
                left: ${rect.left + Math.random() * rect.width}px;
                top: ${rect.top + rect.height}px;
                animation: particleFloat 1s ease-out forwards;
            `;
            document.body.appendChild(particle);
            setTimeout(() => particle.remove(), 1000);
        }
    }

    // Animasi partikel keyframes
    const style = document.createElement('style');
    style.textContent = `
        @keyframes particleFloat {
            0% { opacity: 1; transform: translateY(0) scale(1); }
            100% { opacity: 0; transform: translateY(-50px) scale(0); }
        }
        .alert { transition: all 0.3s ease-in-out; }
    `;
    document.head.appendChild(style);

    // Efek alert khusus
    function showCustomAlert(message, type = 'info') {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} alert-dismissable`;
        alertDiv.innerHTML = `
            <button type="button" class="close">&times;</button>
            ${message}
        `;
        const container = document.querySelector('.login-card') || document.body;
        container.insertBefore(alertDiv, container.firstChild);
        setTimeout(() => {
            alertDiv.style.opacity = '0';
            setTimeout(() => alertDiv.remove(), 300);
        }, 3000);
    }
    
    // Spinner animation (pure CSS)
    const style = document.createElement('style');
    style.innerHTML = `
        .spinner {
            border: 3px solid rgba(255,255,255,0.3);
            border-top: 3px solid white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            animation: spin 0.8s linear infinite;
            display: inline-block;
            margin-right: 8px;
            vertical-align: middle;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    `;
    document.head.appendChild(style);

    // Optional: fungsi alert
    function showCustomAlert(message, type = 'info') {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} alert-dismissable`;
        alertDiv.innerHTML = `
            <button type="button" class="close">&times;</button>
            ${message}
        `;
        const container = document.querySelector('.login-card') || document.body;
        container.insertBefore(alertDiv, container.firstChild);
        setTimeout(() => {
            alertDiv.style.opacity = '0';
            setTimeout(() => alertDiv.remove(), 300);
        }, 3000);
    }
});

    // Tutup alert manual
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('close')) {
            const alert = e.target.closest('.alert');
            if (alert) {
                alert.style.transform = 'translateX(100%)';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 300);
            }
        }
    });

    // Efek input glow & partikel
    document.querySelectorAll('.form-input').forEach(input => {
        input.addEventListener('focus', function () {
            this.parentElement.classList.add('focused');
            const icon = this.parentElement.querySelector('.input-icon');
            if (icon) icon.classList.add('glow');
            createParticles(this);

            // Hentikan typing effect saat user fokus
            this.dataset.typingStopped = "true";
        });

        input.addEventListener('blur', function () {
            this.parentElement.classList.remove('focused');
            const icon = this.parentElement.querySelector('.input-icon');
            if (icon && this.value === '') icon.classList.remove('glow');
        });

        // Support Enter
        input.addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                document.getElementById('loginBtn').click();
            }
        });
    });


    // Efek ketik typing ke placeholder
    function typeEffect(element, text, speed = 100) {
        let index = 0;
        element.placeholder = '';
        element.dataset.typingStopped = "false";

        function type() {
            if (element.dataset.typingStopped === "true") return; // stop jika user sudah mulai ngetik
            if (index < text.length) {
                element.placeholder += text.charAt(index);
                index++;
                setTimeout(type, speed);
            }
        }

        type();
    }

    // Aktifkan typing effect saat halaman load
    window.addEventListener('load', () => {
        setTimeout(() => {
            const usernameInput = document.getElementById('username');
            const passwordInput = document.getElementById('password');

            typeEffect(usernameInput, 'Enter your username', 60);
            setTimeout(() => {
                typeEffect(passwordInput, 'Enter your password', 60);
            }, 1000);
        }, 500);
    });
</script>
</body>
</html>