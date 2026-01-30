<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - RM Minang</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <!-- Decorative Background Elements -->
    <div class="decoration-circle circle-1"></div>
    <div class="decoration-circle circle-2"></div>
    <div class="decoration-circle circle-3"></div>
    <div class="decoration-circle circle-4"></div>
    
    <!-- Main Login Container -->
    <div class="login-container">
        
        <!-- Logo/Header Section -->
        <div class="header">
            <div class="logo">
                <div class="logo-icon">🍛</div>
            </div>
            <h1 class="title">RM Minang</h1>
            <p class="subtitle">Dashboard Administrator</p>
            <div class="divider"></div>
        </div>
        
        <!-- Login Form -->
        <form method="POST" action="">
            
            <!-- Email Input -->
            <div class="form-group">
                <label>
                    <span>📧</span> Email
                </label>
                <div class="input-wrapper">
                    <input 
                        type="email" 
                        name="email" 
                        id="email"
                        required 
                        autofocus
                        placeholder="admin@rmminang.com">
                </div>
            </div>
            
            <!-- Password Input -->
            <div class="form-group">
                <label>
                    <span>🔒</span> Password
                </label>
                <div class="password-wrapper">
                    <input 
                        type="password" 
                        name="password" 
                        id="password"
                        required
                        placeholder="••••••••">
                    <button 
                        type="button" 
                        class="toggle-password"
                        onclick="togglePassword()">
                        <span id="eyeIcon">👁️</span>
                    </button>
                </div>
            </div>
            
            <!-- Submit Button -->
            <button type="submit" class="submit-btn">
                <span>🔐</span>
                <span>Masuk ke Dashboard</span>
            </button>
        </form>
        
        <!-- Footer -->
        <div class="footer">
            <p>© 2026 Rumah Makan Minang. All rights reserved.</p>
            <p>Made with ❤️ in Indonesia</p>
        </div>
    </div>
    
    <script>
        // Toggle Password Visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.textContent = '👁️‍🗨️';
            } else {
                passwordInput.type = 'password';
                eyeIcon.textContent = '👁️';
            }
        }
    </script>
</body>
</html>