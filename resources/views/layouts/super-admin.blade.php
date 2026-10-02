<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Super Admin Dashboard') - CampusPulse</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-slate-100 text-slate-800 font-sans antialiased">
    <div class="min-h-screen flex">

        <!-- Sidebar Navigation -->
        <aside class="w-64 bg-slate-900 text-slate-300 flex flex-col justify-between p-6 flex-shrink-0">
            <div class="space-y-8">
                <!-- Branding -->
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-red-600 rounded-2xl flex items-center justify-center font-black text-white text-lg shadow-lg shadow-red-600/30">
                        CP
                    </div>
                    <div>
                        <h1 class="text-base font-extrabold text-white tracking-tight">CampusPulse</h1>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-red-400">Super Admin</span>
                    </div>
                </div>

                <!-- Navigation Links -->
                <nav class="space-y-1">
                    <span class="text-[10px] uppercase font-bold text-slate-500 tracking-wider block mb-2 px-3">Core Overview</span>
                    
                    <a href="{{ route('super-admin.dashboard') }}" 
                       class="flex items-center gap-3 px-3 py-2.5 rounded-2xl text-xs font-bold transition-all {{ request()->routeIs('super-admin.dashboard') ? 'bg-red-600 text-white shadow-md shadow-red-600/20' : 'hover:bg-slate-800 text-slate-400 hover:text-white' }}">
                        <span>Dashboard & Health</span>
                    </a>

                    <span class="text-[10px] uppercase font-bold text-slate-500 tracking-wider block mt-6 mb-2 px-3">Identity & Access</span>

                    <a href="{{ route('super-admin.users.index') }}" 
                       class="flex items-center gap-3 px-3 py-2.5 rounded-2xl text-xs font-bold transition-all {{ request()->routeIs('super-admin.users.*') ? 'bg-red-600 text-white shadow-md shadow-red-600/20' : 'hover:bg-slate-800 text-slate-400 hover:text-white' }}">
                        <span>User Management</span>
                    </a>

                    <span class="text-[10px] uppercase font-bold text-slate-500 tracking-wider block mt-6 mb-2 px-3">University Structure</span>

                    <a href="{{ route('super-admin.structure.faculties') }}" 
                       class="flex items-center gap-3 px-3 py-2.5 rounded-2xl text-xs font-bold transition-all {{ request()->routeIs('super-admin.structure.faculties') ? 'bg-red-600 text-white shadow-md shadow-red-600/20' : 'hover:bg-slate-800 text-slate-400 hover:text-white' }}">
                        <span>Faculties</span>
                    </a>

                    <a href="{{ route('super-admin.structure.departments') }}" 
                       class="flex items-center gap-3 px-3 py-2.5 rounded-2xl text-xs font-bold transition-all {{ request()->routeIs('super-admin.structure.departments') ? 'bg-red-600 text-white shadow-md shadow-red-600/20' : 'hover:bg-slate-800 text-slate-400 hover:text-white' }}">
                        <span>Departments</span>
                    </a>

                    <a href="{{ route('super-admin.structure.programs') }}" 
                       class="flex items-center gap-3 px-3 py-2.5 rounded-2xl text-xs font-bold transition-all {{ request()->routeIs('super-admin.structure.programs') ? 'bg-red-600 text-white shadow-md shadow-red-600/20' : 'hover:bg-slate-800 text-slate-400 hover:text-white' }}">
                        <span>Academic Programs</span>
                    </a>

                    <span class="text-[10px] uppercase font-bold text-slate-500 tracking-wider block mt-6 mb-2 px-3">System Control</span>

                    <a href="{{ route('super-admin.system.settings') }}" 
                       class="flex items-center gap-3 px-3 py-2.5 rounded-2xl text-xs font-bold transition-all {{ request()->routeIs('super-admin.system.settings') ? 'bg-red-600 text-white shadow-md shadow-red-600/20' : 'hover:bg-slate-800 text-slate-400 hover:text-white' }}">
                        <span>System Settings</span>
                    </a>

                    <a href="{{ route('super-admin.system.audit-logs') }}" 
                       class="flex items-center gap-3 px-3 py-2.5 rounded-2xl text-xs font-bold transition-all {{ request()->routeIs('super-admin.system.audit-logs') ? 'bg-red-600 text-white shadow-md shadow-red-600/20' : 'hover:bg-slate-800 text-slate-400 hover:text-white' }}">
                        <span>Audit Logs</span>
                    </a>
                </nav>
            </div>

            <!-- User Footer -->
            <div class="pt-6 border-t border-slate-800 flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold text-white">Root Admin</p>
                    <p class="text-[10px] text-slate-500">root@campuspulse.edu</p>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-slate-500 hover:text-red-400 text-xs font-bold">Logout</button>
                </form>
            </div>
        </aside>

        <!-- Main Content Wrapper -->
        <main class="flex-1 overflow-y-auto">
            <!-- Top Navbar -->
            <header class="bg-white border-b border-slate-200 px-8 py-4 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="px-2.5 py-1 bg-red-50 text-red-600 font-bold text-[10px] rounded-md border border-red-200 uppercase tracking-wider">
                        Super Administrator Privilege Level
                    </span>
                </div>
                <div class="text-xs text-slate-500 font-medium">
                    System Time: <span class="font-bold text-slate-800">{{ now()->format('Y-m-d H:i') }} CAT</span>
                </div>
            </header>

            <!-- Page Content Body -->
            <div class="p-8 space-y-6 max-w-7xl mx-auto">
                @if (session('status'))
                    <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold rounded-2xl">
                        {{ session('status') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    @livewireScripts
</body>
</html>