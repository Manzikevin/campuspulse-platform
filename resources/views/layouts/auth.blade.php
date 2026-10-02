<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Authentication') | CampusPulse</title>

    <!-- Tailwind CSS CDN (or compiled via Vite) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            900: '#0c4a6e',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Google Font: Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body class="h-full bg-slate-50 font-sans text-slate-800 antialiased selection:bg-brand-500 selection:text-white">

    <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <!-- Top Logo Header -->
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center mb-8">
            <a href="/" class="inline-flex items-center gap-3">
                <div
                    class="w-10 h-10 bg-brand-500 rounded-2xl flex items-center justify-center font-black text-white text-xl shadow-md shadow-brand-500/20">
                    CP
                </div>
                <span class="text-2xl font-bold tracking-tight text-slate-900">
                    Campus<span class="text-brand-500">Pulse</span>
                </span>
            </a>
        </div>

        <!-- Split Layout Wrapper -->
        <div class="max-w-5xl mx-auto w-full px-4 sm:px-6 lg:px-8">
            <div
                class="grid grid-cols-1 lg:grid-cols-12 bg-white rounded-3xl border border-slate-200 shadow-xl overflow-hidden">

                <!-- Form View Area (Left) -->
                <div class="lg:col-span-7 p-8 sm:p-12 flex flex-col justify-between">
                    <div>
                        @yield('content')
                    </div>

                    <div class="mt-8 pt-6 border-t border-slate-100 text-center text-xs text-slate-500">
                        &copy; {{ date('Y') }} CampusPulse. Official University Information System.
                    </div>
                </div>

                <!-- Feature Sidebar Card (Right) -->
                <div
                    class="hidden lg:flex lg:col-span-5 bg-gradient-to-br from-slate-900 via-slate-900 to-brand-900 p-12 flex-col justify-between text-white relative overflow-hidden">
                    <!-- Background Accent Circle -->
                    <div
                        class="absolute -bottom-12 -right-12 w-64 h-64 bg-brand-500/20 rounded-full blur-3xl pointer-events-none">
                    </div>

                    <div class="relative z-10">
                        <span
                            class="px-3 py-1 bg-brand-500/20 border border-brand-400/30 text-brand-400 font-bold text-xs rounded-full uppercase tracking-wider">
                            Campus Pulse Secured
                        </span>
                        <h3 class="text-2xl font-extrabold tracking-tight mt-6 leading-snug">
                            Centralized, targeted, and real-time university notifications.
                        </h3>
                        <p class="text-slate-400 text-xs mt-3 leading-relaxed">
                            Access verified announcements, examination timetables, department updates, and academic
                            attachments through your role-based portal.
                        </p>
                    </div>

                    <div class="relative z-10 pt-8 border-t border-slate-800/80">
                        <div class="flex items-center gap-3">
                            <div class="w-2.5 h-2.5 bg-emerald-400 rounded-full animate-pulse"></div>
                            <span class="text-xs font-semibold text-slate-300">Role-Based Access Control Enabled[cite:
                                1]</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>