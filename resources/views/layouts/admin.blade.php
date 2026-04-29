<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Go-Blog Admin')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'admin-blue': '#1a56db',
                        'admin-dark': '#1e3a5f',
                        'admin-sidebar': '#1a3a6b',
                    }
                }
            }
        }
    </script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .sidebar-link { transition: all 0.2s ease; }
        .sidebar-link.active { background: rgba(255,255,255,0.15); }
        .sidebar-link:hover { background: rgba(255,255,255,0.1); }
        .stat-card { transition: transform 0.2s, box-shadow 0.2s; }
        .stat-card:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(0,0,0,0.1); }
    </style>
</head>
<body class="bg-slate-100 antialiased">
<div class="flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-52 bg-[#1a3a6b] text-white flex flex-col flex-shrink-0 h-full">
        <!-- Logo -->
        <div class="px-5 py-5 border-b border-white/10">
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                    <i data-lucide="feather" class="w-4 h-4 text-white"></i>
                </div>
                <div>
                    <p class="font-bold text-sm leading-none">Go-Blog</p>
                    <p class="text-[10px] text-blue-200 uppercase tracking-widest mt-0.5">Blog Administration</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-3 py-4 space-y-1">
            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i data-lucide="layout-dashboard" class="w-4 h-4 flex-shrink-0"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.posts.index') }}"
               class="sidebar-link flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                <i data-lucide="file-text" class="w-4 h-4 flex-shrink-0"></i>
                <span>Posts</span>
            </a>
            <a href="#"
               class="sidebar-link flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm">
                <i data-lucide="image" class="w-4 h-4 flex-shrink-0"></i>
                <span>Media Library</span>
            </a>
            <a href="#"
               class="sidebar-link flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm">
                <i data-lucide="bar-chart-2" class="w-4 h-4 flex-shrink-0"></i>
                <span>Analytics</span>
            </a>
            <a href="#"
               class="sidebar-link flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm">
                <i data-lucide="settings" class="w-4 h-4 flex-shrink-0"></i>
                <span>Settings</span>
            </a>
        </nav>

        <!-- New Post Button -->
        <div class="px-3 py-3">
            <a href="{{ route('admin.posts.create') }}"
               class="flex items-center justify-center space-x-2 w-full py-2.5 bg-white/10 hover:bg-white/20 border border-white/20 rounded-lg text-sm font-medium transition-all">
                <i data-lucide="plus-circle" class="w-4 h-4"></i>
                <span>New Post</span>
            </a>
        </div>

        <!-- Bottom Links -->
        <div class="px-3 pb-4 space-y-1 border-t border-white/10 pt-3">
            <a href="#" class="sidebar-link flex items-center space-x-3 px-3 py-2 rounded-lg text-sm text-blue-200 hover:text-white">
                <i data-lucide="help-circle" class="w-4 h-4"></i>
                <span>Support</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="sidebar-link flex items-center space-x-3 px-3 py-2 rounded-lg text-sm text-red-300 hover:text-white w-full text-left">
                    <i data-lucide="log-out" class="w-4 h-4"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Header -->
        <header class="h-14 bg-white border-b border-slate-200 flex items-center justify-between px-6 flex-shrink-0">
            <div class="flex-1 max-w-sm">
                <div class="relative">
                    <i data-lucide="search" class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <input type="text" placeholder="Search posts, tags, or authors..."
                           class="w-full bg-slate-100 rounded-lg py-2 pl-9 pr-4 text-sm text-slate-700 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/30">
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <button class="relative p-2 text-slate-500 hover:text-slate-700 hover:bg-slate-100 rounded-lg transition-colors">
                    <i data-lucide="bell" class="w-4 h-4"></i>
                    <span class="absolute top-1.5 right-1.5 w-1.5 h-1.5 bg-red-500 rounded-full"></span>
                </button>
                <button class="p-2 text-slate-500 hover:text-slate-700 hover:bg-slate-100 rounded-lg transition-colors">
                    <i data-lucide="settings" class="w-4 h-4"></i>
                </button>
                <a href="{{ route('admin.profile') }}" class="flex items-center space-x-2 pl-3 border-l border-slate-200">
                    <div class="text-right">
                        <p class="text-xs font-semibold text-slate-800 leading-none">{{ auth()->user()->name ?? 'Admin' }}</p>
                        <p class="text-[10px] text-slate-500 mt-0.5">Chief Editor</p>
                    </div>
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'Admin') }}&background=1a3a6b&color=fff&size=64"
                         alt="Admin" class="w-8 h-8 rounded-full ring-2 ring-slate-200">
                </a>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 overflow-y-auto p-6">
            @yield('content')
        </main>
    </div>
</div>

<script>
    lucide.createIcons();
</script>
@stack('scripts')
</body>
</html>
