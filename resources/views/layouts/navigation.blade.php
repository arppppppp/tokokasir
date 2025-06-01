<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online - Navigator</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dark-purple': '#2D1B69',
                        'deep-purple': '#1E1042',
                        'accent-purple': '#8B5CF6'
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background: linear-gradient(135deg, #1E1042 0%, #2D1B69 50%, #4C1D95 100%);
            min-height: 100vh;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .nav-link {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }
        
        .nav-link:hover::before {
            left: 100%;
        }
        
        .nav-link:hover {
            background: rgba(139, 92, 246, 0.3);
            transform: translateY(-1px);
        }
        
        .logo-glow {
            filter: drop-shadow(0 0 10px rgba(139, 92, 246, 0.5));
        }
        
        .mobile-menu {
            background: rgba(30, 16, 66, 0.95);
            backdrop-filter: blur(20px);
        }
        
        .dropdown-menu {
            background: rgba(30, 16, 66, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(139, 92, 246, 0.3);
        }
    </style>
</head>
<body class="font-sans">
    <nav class="glass-effect text-white shadow-2xl sticky top-0 z-50">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a class="flex items-center space-x-2">
                            <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-purple-600 rounded-xl flex items-center justify-center logo-glow">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                </svg>
                            </div>
                            <span class="text-xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent">
                                {{ Auth::user()->store_name }}
                            </span>
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden md:flex md:ml-10 space-x-1">
                        <a href="{{ route('items.index') }}" class="nav-link px-4 py-2 rounded-lg text-white hover:text-purple-200 font-medium">
                            Kelola Barang
                        </a>
                        <a href="{{ route('sales.create') }}" class="nav-link px-4 py-2 rounded-lg text-white hover:text-purple-200 font-medium">
                            Penjualan
                        </a>
                        <a href="{{ route('sales.index') }}" class="nav-link px-4 py-2 rounded-lg text-white hover:text-purple-200 font-medium">
                            Riwayat Penjualan
                        </a>
                    </div>
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden md:flex md:items-center md:ml-6">
                    <div class="relative">
                        <button onclick="toggleDropdown()" class="flex items-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-purple-600 to-purple-700 rounded-lg hover:from-purple-700 hover:to-purple-800 transition-all duration-200 shadow-lg">
                            <div class="w-8 h-8 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <span class="text-xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent">
                                {{ Auth::user()-> name}}
                            </span>
                            <svg class="ml-2 w-4 h-4 transition-transform duration-200" id="dropdown-arrow" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <div id="dropdown-menu" class="hidden absolute right-0 mt-2 w-48 dropdown-menu rounded-xl shadow-2xl py-2">
                            <div class="border-t border-purple-500/30 my-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-3 py-2 rounded-lg text-white hover:bg-red-600/50 transition-colors">
                                Log Out
                            </button>
                        </form>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button onclick="toggleMobileMenu()" class="p-2 rounded-lg text-white hover:bg-purple-600/50 transition-colors">
                        <svg class="w-6 h-6" id="mobile-menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobile-menu" class="hidden md:hidden mobile-menu border-t border-purple-500/30">
            <div class="px-4 py-3 space-y-2">
                <a href="{{ route('items.index') }}" class="block px-3 py-2 rounded-lg text-white hover:bg-purple-600/50 transition-colors font-medium">
                    Kelola Barang
                </a>
                <a href="{{ route('sales.create') }}" class="block px-3 py-2 rounded-lg text-white hover:bg-purple-600/50 transition-colors font-medium">
                    Penjualan
                </a>
                <a href="{{ route('sales.index') }}" class="block px-3 py-2 rounded-lg text-white hover:bg-purple-600/50 transition-colors font-medium">
                    Riwayat Penjualan
                </a>
            </div>

            <!-- Mobile Settings -->
            <div class="border-t border-purple-500/30 px-4 py-3">
                <div class="flex items-center px-3 py-2 mb-2">
                    <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-white font-medium">{{ Auth::user()-> name}}</div>
                        <div class="text-purple-200 text-sm">{{ Auth::user()-> email}}</div>
                    </div>
                </div>

                <div class="space-y-1">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-3 py-2 rounded-lg text-white hover:bg-red-600/50 transition-colors">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <script>
        function toggleDropdown() {
            const menu = document.getElementById('dropdown-menu');
            const arrow = document.getElementById('dropdown-arrow');
            
            menu.classList.toggle('hidden');
            arrow.style.transform = menu.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
        }

        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            const icon = document.getElementById('mobile-menu-icon');
            
            menu.classList.toggle('hidden');
            
            if (menu.classList.contains('hidden')) {
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>';
            } else {
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>';
            }
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('dropdown-menu');
            const button = event.target.closest('button');
            
            if (!button || !button.onclick) {
                dropdown.classList.add('hidden');
                document.getElementById('dropdown-arrow').style.transform = 'rotate(0deg)';
            }
        });
    </script>
</body>
</html>