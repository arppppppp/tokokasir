<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Toko Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .glass-effect {
            background: rgba(17, 17, 17, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .gradient-bg {
            background: linear-gradient(135deg, #0c0c0c 0%, #1a1a1a 50%, #2d1b69 100%);
        }
        .floating-animation {
            animation: floating 8s ease-in-out infinite;
        }
        .floating-animation-delayed {
            animation: floating 8s ease-in-out infinite;
            animation-delay: -3s;
        }
        .floating-animation-slow {
            animation: floating 10s ease-in-out infinite;
            animation-delay: -5s;
        }
        @keyframes floating {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-15px) rotate(1deg); }
            66% { transform: translateY(-25px) rotate(-1deg); }
        }
        .input-focus {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(30, 30, 30, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .input-focus:focus {
            transform: translateY(-1px);
            box-shadow: 0 8px 30px rgba(139, 92, 246, 0.3);
            background: rgba(40, 40, 40, 0.9);
            border: 1px solid rgba(139, 92, 246, 0.5);
        }
        .btn-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 50%, #6d28d9 100%);
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.2);
        }
        .btn-hover:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(139, 92, 246, 0.4);
            background: linear-gradient(135deg, #9333ea 0%, #7c3aed 50%, #6d28d9 100%);
        }
        .slide-in {
            animation: slideIn 1s cubic-bezier(0.4, 0, 0.2, 1);
        }
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        .error-shake {
            animation: shake 0.6s ease-in-out;
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20% { transform: translateX(-8px); }
            40% { transform: translateX(8px); }
            60% { transform: translateX(-8px); }
            80% { transform: translateX(8px); }
        }
        .glow-effect {
            position: relative;
        }
        .glow-effect::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, transparent, rgba(139, 92, 246, 0.3), transparent);
            border-radius: inherit;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .glow-effect:hover::before {
            opacity: 1;
        }
        .particle {
            position: absolute;
            background: rgba(139, 92, 246, 0.6);
            border-radius: 50%;
            pointer-events: none;
            animation: particle-float 4s ease-in-out infinite;
        }
        @keyframes particle-float {
            0%, 100% { transform: translateY(0px) translateX(0px); opacity: 0.3; }
            50% { transform: translateY(-100px) translateX(50px); opacity: 1; }
        }
        .text-gradient {
            background: linear-gradient(135deg, #ffffff 0%, #e5e7eb 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .label-glow {
            color: #d1d5db;
            transition: color 0.3s ease;
        }
        .input-group:focus-within .label-glow {
            color: #a78bfa;
        }
    </style>
</head>
<body class="h-full gradient-bg">
    <!-- Background Decorations -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <!-- Floating Orbs -->
        <div class="absolute top-1/4 left-1/4 w-80 h-80 bg-purple-600 opacity-5 rounded-full floating-animation blur-xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-64 h-64 bg-violet-500 opacity-8 rounded-full floating-animation-delayed blur-xl"></div>
        <div class="absolute top-3/4 left-1/6 w-48 h-48 bg-indigo-500 opacity-6 rounded-full floating-animation-slow blur-xl"></div>
        
        <!-- Particles -->
        <div class="particle w-2 h-2 top-1/3 left-1/3" style="animation-delay: 0s;"></div>
        <div class="particle w-1 h-1 top-2/3 left-2/3" style="animation-delay: 1s;"></div>
        <div class="particle w-3 h-3 top-1/2 left-1/4" style="animation-delay: 2s;"></div>
        <div class="particle w-1 h-1 top-1/4 right-1/3" style="animation-delay: 3s;"></div>
    </div>

    <div class="min-h-full flex items-center justify-center py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Header -->
            <div class="text-center slide-in">
                <div class="mx-auto h-20 w-20 bg-gradient-to-br from-purple-600 to-violet-700 rounded-2xl flex items-center justify-center shadow-2xl mb-6 glow-effect">
                    <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h2 class="text-4xl font-bold text-gradient mb-3">Buat Akun Toko</h2>
                <p class="text-gray-400 text-lg">Bergabunglah dengan ribuan penjual sukses</p>
            </div>

            <!-- Form -->
            <form class="glass-effect rounded-3xl shadow-2xl p-8 space-y-6 slide-in glow-effect" method="POST" style="animation-delay: 0.3s" action="{{ route('register') }}">
                @csrf
                <!-- Nama Pengguna -->
                <div class="input-group">
                    <label for="name" class="block text-sm font-medium label-glow mb-3">
                        Nama Pengguna
                    </label>
                    <div class="relative">
                        <input id="name" 
                               name="name" 
                               type="text" 
                               required 
                               autofocus
                               class="input-focus appearance-none rounded-2xl relative block w-full px-5 py-4 placeholder-gray-500 text-white focus:outline-none focus:z-10 sm:text-sm"
                               placeholder="Masukkan nama pengguna">
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Nama Toko -->
                <div class="input-group">
                    <label for="store_name" class="block text-sm font-medium label-glow mb-3">
                        Nama Toko
                    </label>
                    <div class="relative">
                        <input id="store_name" 
                               name="store_name" 
                               type="text" 
                               required
                               class="input-focus appearance-none rounded-2xl relative block w-full px-5 py-4 placeholder-gray-500 text-white focus:outline-none focus:z-10 sm:text-sm"
                               placeholder="Masukkan nama toko">
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="input-group">
                    <label for="email" class="block text-sm font-medium label-glow mb-3">
                        Email
                    </label>
                    <div class="relative">
                        <input id="email" 
                            name="email" 
                            type="email" 
                            required
                            class="input-focus appearance-none rounded-2xl relative block w-full px-5 py-4 placeholder-gray-500 text-white focus:outline-none focus:z-10 sm:text-sm"
                            placeholder="nama@email.com"
                            value="{{ old('email') }}">
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                        </div>
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="input-group">
                    <label for="password" class="block text-sm font-medium label-glow mb-3">
                        Password
                    </label>
                    <div class="relative">
                        <input id="password" 
                               name="password" 
                               type="password" 
                               required
                               class="input-focus appearance-none rounded-2xl relative block w-full px-5 py-4 placeholder-gray-500 text-white focus:outline-none focus:z-10 sm:text-sm"
                               placeholder="Masukkan password">
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                            <button type="button" class="text-gray-400 hover:text-purple-400 transition-colors duration-200" onclick="togglePassword()">
                                <svg id="eye-icon" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="flex items-center space-x-3 text-xs text-gray-400">
                            <div class="flex space-x-1">
                                <div id="strength-1" class="w-3 h-3 rounded-full bg-gray-600 transition-all duration-300"></div>
                                <div id="strength-2" class="w-3 h-3 rounded-full bg-gray-600 transition-all duration-300"></div>
                                <div id="strength-3" class="w-3 h-3 rounded-full bg-gray-600 transition-all duration-300"></div>
                                <div id="strength-4" class="w-3 h-3 rounded-full bg-gray-600 transition-all duration-300"></div>
                            </div>
                            <span id="strength-text" class="font-medium">Kekuatan password</span>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" 
                            class="btn-hover group relative w-full flex justify-center py-4 px-6 border border-transparent text-sm font-semibold rounded-2xl text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-4">
                            <svg class="h-5 w-5 text-purple-200 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </span>
                        Daftar Sekarang
                    </button>
                </div>

                <!-- Login Link -->
                <div class="text-center pt-4">
                    <p class="text-sm text-gray-400">
                        Sudah punya akun?
                        <a href="/login" class="font-medium text-purple-400 hover:text-purple-300 transition-colors duration-200 ml-1">
                            Masuk di sini
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Password visibility toggle
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                `;
            }
        }

        // Password strength indicator
        document.getElementById('password').addEventListener('input', function(e) {
            const password = e.target.value;
            const strength = calculatePasswordStrength(password);
            updatePasswordStrength(strength);
        });

        function calculatePasswordStrength(password) {
            let score = 0;
            if (password.length >= 8) score++;
            if (/[a-z]/.test(password)) score++;
            if (/[A-Z]/.test(password)) score++;
            if (/[0-9]/.test(password)) score++;
            if (/[^A-Za-z0-9]/.test(password)) score++;
            return Math.min(score, 4);
        }

        function updatePasswordStrength(strength) {
            const indicators = ['strength-1', 'strength-2', 'strength-3', 'strength-4'];
            const colors = ['bg-red-500', 'bg-orange-500', 'bg-yellow-500', 'bg-green-500'];
            const texts = ['Sangat Lemah', 'Lemah', 'Sedang', 'Kuat'];
            
            indicators.forEach((id, index) => {
                const element = document.getElementById(id);
                element.className = `w-3 h-3 rounded-full transition-all duration-300 ${index < strength ? colors[strength - 1] : 'bg-gray-600'}`;
            });
            
            const strengthText = document.getElementById('strength-text');
            if (strength > 0) {
                strengthText.textContent = texts[strength - 1];
                strengthText.className = `font-medium ${strength === 4 ? 'text-green-400' : strength === 3 ? 'text-yellow-400' : strength === 2 ? 'text-orange-400' : 'text-red-400'}`;
            } else {
                strengthText.textContent = 'Kekuatan password';
                strengthText.className = 'font-medium text-gray-400';
            }
        }

        // Form validation and animation
        document.querySelector('form').addEventListener('submit', function(e) {
            const requiredFields = this.querySelectorAll('input[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('error-shake', 'border-red-500');
                    isValid = false;
                    
                    setTimeout(() => {
                        field.classList.remove('error-shake');
                    }, 600);
                } else {
                    field.classList.remove('border-red-500');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
            }
        });

        // Input focus effects
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        // Add loading state to submit button
        document.querySelector('form').addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Mendaftar...
            `;
            submitBtn.disabled = true;
        });
    </script>
</body>
</html>