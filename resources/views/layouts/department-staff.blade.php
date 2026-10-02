<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Department Staff Portal') | CampusPulse</title>

    <!-- Tailwind CSS v4 CDN & Outfit Font -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Outfit', 'sans-serif'] },
                    colors: {
                        staff: {
                            50: '#f0fdf4', 100: '#dcfce7', 500: '#22c55e',
                            600: '#16a34a', 700: '#15803d', 900: '#14532d',
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
<body class="h-full font-sans text-slate-800 antialiased selection:bg-emerald-500 selection:text-white flex flex-col justify-between">

    <div>
        <!-- Department Staff Header Bar -->
        <header class="bg-white border-b border-slate-200/80 sticky top-0 z-40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    
                    <!-- Brand & Role Tag -->
                    <div class="flex items-center gap-6">
                        <a href="{{ route('dept-staff.dashboard') }}" class="flex items-center gap-2.5">
                            <div class="w-9 h-9 bg-emerald-600 rounded-xl flex items-center justify-center font-black text-white text-lg shadow-sm shadow-emerald-600/20">
                                CP
                            </div>
                            <span class="text-xl font-bold tracking-tight text-slate-900">
                                Campus<span class="text-emerald-600">Pulse</span>
                            </span>
                        </a>
                        <span class="hidden md:inline-flex px-2.5 py-1 bg-emerald-50 border border-emerald-200 text-emerald-700 font-bold text-[11px] rounded-full uppercase tracking-wider">
                            Department Staff
                        </span>
                    </div>

                    <!-- Navigation Links -->
                    <nav class="hidden md:flex items-center gap-1">
                        <a href="{{ route('dept-staff.dashboard') }}" 
                           class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ request()->routeIs('dept-staff.dashboard') ? 'bg-emerald-50 text-emerald-700' : 'text-slate-600 hover:bg-slate-50' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('dept-staff.notices.index') }}" 
                           class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ request()->routeIs('dept-staff.notices.index', 'dept-staff.notices.create', 'dept-staff.notices.edit') ? 'bg-emerald-50 text-emerald-700' : 'text-slate-600 hover:bg-slate-50' }}">
                            Notices & Submissions
                        </a>
                        <a href="{{ route('dept-staff.notices.pending-approvals') }}" 
                           class="px-4 py-2 rounded-xl text-xs font-bold transition-all relative {{ request()->routeIs('dept-staff.notices.pending-approvals') ? 'bg-emerald-50 text-emerald-700' : 'text-slate-600 hover:bg-slate-50' }}">
                            Approval Queue
                            <span class="ml-1.5 px-1.5 py-0.5 text-[10px] font-extrabold bg-emerald-100 text-emerald-800 rounded-full">3</span>
                        </a>
                        <a href="{{ route('dept-staff.resources.index') }}" 
                           class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ request()->routeIs('dept-staff.resources.*') ? 'bg-emerald-50 text-emerald-700' : 'text-slate-600 hover:bg-slate-50' }}">
                            Academic Resources
                        </a>
                    </nav>

                    <!-- Right Controls & Profile Dropdown -->
                    <div class="flex items-center gap-3">
                        <a href="{{ route('dept-staff.notices.create') }}" class="px-3.5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-xl shadow-sm transition-all hidden sm:inline-flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            New Draft Notice
                        </a>

                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="flex items-center gap-2.5 p-1.5 rounded-2xl border border-slate-200 hover:border-slate-300 transition-all bg-white">
                                <div class="w-7 h-7 bg-emerald-600 text-white font-bold text-xs rounded-xl flex items-center justify-center">
                                    {{ substr(auth()->user()->name ?? 'D', 0, 1) }}
                                </div>
                                <span class="text-xs font-bold text-slate-800 pr-1 hidden sm:inline-block">
                                    {{ auth()->user()->name ?? 'Dept. Staff' }}
                                </span>
                            </button>

                            <div x-show="open" @click.outside="open = false" 
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-slate-200 py-2 z-50">
                                
                                <div class="px-4 py-2 border-b border-slate-100">
                                    <p class="text-xs font-bold text-slate-900">{{ auth()->user()->name ?? 'Department Officer' }}</p>
                                    <p class="text-[11px] text-slate-500 truncate">{{ auth()->user()->email ?? 'staff.cs@univ.edu' }}</p>
                                </div>

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

        <!-- Main Content Area -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @yield('content')
        </main>
    </div>

    <!-- Department Staff Footer -->
    <footer class="bg-white border-t border-slate-200/80 py-6 text-xs text-slate-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center gap-3">
            <p>&copy; {{ date('Y') }} CampusPulse. Departmental Administration Portal.</p>
            <div class="flex items-center gap-4">
                <span class="inline-flex items-center gap-1.5 font-medium text-slate-600">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    Faculty of Computing & Information Technology
                </span>
            </div>
        </div>
    </footer>

</body>
</html>