<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Go-Blog - Reader Edition')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-slate-50 font-sans antialiased">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-sidebar-bg text-white flex flex-col fixed h-full transition-all duration-300">
            <div class="p-8">
                <h1 class="text-2xl font-serif font-bold tracking-tight">Go-Blog</h1>
                <p class="text-xs uppercase tracking-widest text-blue-200 mt-1 opacity-70">Reader Edition</p>
            </div>

            <nav class="flex-1 px-4 space-y-2">
                <a href="/" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-sidebar-hover transition-colors {{ request()->is('/') ? 'sidebar-active' : '' }}">
                    <i data-lucide="home" class="w-5 h-5"></i>
                    <span>Home</span>
                </a>
                <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-sidebar-hover transition-colors">
                    <i data-lucide="compass" class="w-5 h-5"></i>
                    <span>Explore</span>
                </a>
                <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-sidebar-hover transition-colors">
                    <i data-lucide="grid" class="w-5 h-5"></i>
                    <span>Categories</span>
                </a>
                <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-sidebar-hover transition-colors">
                    <i data-lucide="bookmark" class="w-5 h-5"></i>
                    <span>Bookmarks</span>
                </a>
                <a href="/profile" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-sidebar-hover transition-colors {{ request()->is('profile') ? 'sidebar-active' : '' }}">
                    <i data-lucide="user" class="w-5 h-5"></i>
                    <span>Profile</span>
                </a>
            </nav>

            <div class="p-4 px-8 space-y-4 border-t border-blue-800/30">
                <a href="#" class="flex items-center space-x-3 text-sm text-blue-100 hover:text-white transition-colors">
                    <i data-lucide="settings" class="w-4 h-4"></i>
                    <span>Settings</span>
                </a>
                <a href="#" class="flex items-center space-x-3 text-sm text-blue-100 hover:text-white transition-colors">
                    <i data-lucide="help-circle" class="w-4 h-4"></i>
                    <span>Help</span>
                </a>
                <div class="mt-8">
                    <button class="w-full py-2 px-4 bg-white text-blue-900 rounded-lg text-sm font-semibold hover:bg-blue-50 transition-colors shadow-lg">
                        Write a Story
                    </button>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64 min-h-screen">
            <!-- Header -->
            <header class="h-20 bg-white/80 backdrop-blur-md sticky top-0 z-30 flex items-center justify-between px-10 border-b border-slate-200">
                <div class="flex-1 max-w-xl">
                    <div class="relative group">
                        <i data-lucide="search" class="w-4 h-4 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-blue-500 transition-colors"></i>
                        <input type="text" placeholder="Search stories, destinations..." class="w-full bg-slate-100 border-none rounded-full py-2 pl-12 pr-4 focus:ring-2 focus:ring-blue-500/20 focus:bg-white transition-all text-sm">
                    </div>
                </div>

                <div class="flex items-center space-x-6">
                    <button class="p-2 text-slate-500 hover:text-blue-600 transition-colors relative">
                        <i data-lucide="bell" class="w-5 h-5"></i>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>
                    <div class="flex items-center space-x-3 pl-6 border-l border-slate-200">
                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-semibold text-slate-900 leading-tight">Elena Rodriguez</p>
                            <p class="text-xs text-slate-500">Explorer Level 4</p>
                        </div>
                        <img src="https://ui-avatars.com/api/?name=Elena+Rodriguez&background=0f4c81&color=fff" alt="Elena Rodriguez" class="w-10 h-10 rounded-full border-2 border-white shadow-sm ring-1 ring-slate-200">
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-10">
                @yield('content')
            </div>

            <!-- Footer -->
            <footer class="p-10 border-t border-slate-200 mt-20">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <div class="flex items-center space-x-2">
                        <span class="font-serif font-bold text-slate-800">Go-Blog</span>
                        <span class="text-sm text-slate-500">© 2024 Voyage Editorial. All rights reserved.</span>
                    </div>
                    <div class="flex space-x-8 text-sm text-slate-500">
                        <a href="#" class="hover:text-blue-600 transition-colors">About</a>
                        <a href="#" class="hover:text-blue-600 transition-colors">Privacy Policy</a>
                        <a href="#" class="hover:text-blue-600 transition-colors">Terms of Service</a>
                        <a href="#" class="hover:text-blue-600 transition-colors">Contact</a>
                    </div>
                </div>
            </footer>
        </main>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
