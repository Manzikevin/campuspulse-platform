<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Student Portal') | CampusPulse</title>

    <!-- Tailwind CSS v4 CDN & Outfit Font -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Outfit', 'sans-serif'] },
                    colors: {
                        brand: {
                            50: '#f0f9ff', 100: '#e0f2fe', 400: '#38bdf8',
                            500: '#0ea5e9', 600: '#0284c7', 900: '#0c4a6e',
                        }
                    }
                }
            }
        }
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="h-full font-sans text-slate-800 antialiased selection:bg-brand-500 selection:text-white flex flex-col justify-between">

    <div>
        <!-- Student Header Bar -->
        <header class="bg-white border-b border-slate-200/80 sticky top-0 z-40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    
                    <!-- Brand & Portal Tag -->
                    <div class="flex items-center gap-6">
                        <a href="{{ route('student.dashboard') }}" class="flex items-center gap-2.5">
                            <div class="w-9 h-9 bg-brand-500 rounded-xl flex items-center justify-center font-black text-white text-lg shadow-sm shadow-brand-500/20">
                                CP
                            </div>
                            <span class="text-xl font-bold tracking-tight text-slate-900">
                                Campus<span class="text-brand-500">Pulse</span>
                            </span>
                        </a>
                        <span class="hidden md:inline-flex px-2.5 py-1 bg-slate-100 border border-slate-200 text-slate-600 font-bold text-[11px] rounded-full uppercase tracking-wider">
                            Student Portal
                        </span>
                    </div>

                    <!-- Navigation Links -->
                    <nav class="hidden md:flex items-center gap-1">
                        <a href="{{ route('student.dashboard') }}" 
                           class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ request()->routeIs('student.dashboard') ? 'bg-brand-50 text-brand-600' : 'text-slate-600 hover:bg-slate-50' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('student.notices.index') }}" 
                           class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ request()->routeIs('student.notices.*') ? 'bg-brand-50 text-brand-600' : 'text-slate-600 hover:bg-slate-50' }}">
                            Notice Archive
                        </a>
                        <a href="{{ route('student.bookmarks.index') }}" 
                           class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ request()->routeIs('student.bookmarks.*') ? 'bg-brand-50 text-brand-600' : 'text-slate-600 hover:bg-slate-50' }}">
                            Bookmarks
                        </a>
                    </nav>

                    <!-- Right Controls (Real-Time Notification Center & Profile) -->
                    <div class="flex items-center gap-3">
                        <!-- Livewire WebSocket Notification Bell Widget -->
                        <livewire:student.notification-center />

                        <!-- Profile Dropdown -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="flex items-center gap-2.5 p-1.5 rounded-2xl border border-slate-200 hover:border-slate-300 transition-all bg-white">
                                <div class="w-7 h-7 bg-brand-500 text-white font-bold text-xs rounded-xl flex items-center justify-center">
                                    {{ substr(auth()->user()->name ?? 'S', 0, 1) }}
                                </div>
                                <span class="text-xs font-bold text-slate-800 pr-1 hidden sm:inline-block">
                                    {{ auth()->user()->name ?? 'Alex Morgan' }}
                                </span>
                            </button>

                            <div x-show="open" @click.outside="open = false" 
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-slate-200 py-2 z-50">
                                
                                <div class="px-4 py-2 border-b border-slate-100">
                                    <p class="text-xs font-bold text-slate-900">{{ auth()->user()->name ?? 'Alex Morgan' }}</p>
                                    <p class="text-[11px] text-slate-500 truncate">{{ auth()->user()->email ?? 'alex.m@univ.edu' }}</p>
                                </div>

                                <a href="{{ route('student.profile.show') }}" class="block px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50">
                                    Academic Profile Settings
                                </a>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-xs font-semibold text-red-600 hover:bg-red-50">
                                        Sign Out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <!-- Main Page View Container -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @yield('content')
        </main>
    </div>

    <!-- Student Footer -->
    <footer class="bg-white border-t border-slate-200/80 py-6 text-xs text-slate-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center gap-3">
            <p>&copy; {{ date('Y') }} CampusPulse. Official University Information Engine.</p>
            <div class="flex items-center gap-4">
                <span class="inline-flex items-center gap-1.5 font-medium text-slate-600">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    Reverb Socket Active
                </span>
            </div>
        </div>
    </footer>

</body>
</html>