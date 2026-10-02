<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CampusPulse | The Digital Heartbeat of University Communication</title>

    <!-- Tailwind CSS (Inject via Vite or CDN) -->
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
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased selection:bg-brand-500 selection:text-white">

    <!-- ================= NAVBAR ================= -->
    <nav x-data="{ mobileOpen: false }" class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Logo -->
                <a href="#" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-brand-500 rounded-xl flex items-center justify-center font-black text-white text-xl shadow-sm">
                        CP
                    </div>
                    <span class="text-2xl font-bold tracking-tight text-slate-900">
                        Campus<span class="text-brand-500">Pulse</span>
                    </span>
                </a>

                <!-- Desktop Navigation Links -->
                <div class="hidden md:flex items-center gap-8 text-sm font-semibold text-slate-600">
                    <a href="#features" class="hover:text-brand-600 transition-colors">Features</a>
                    <a href="#workflow" class="hover:text-brand-600 transition-colors">Workflow</a>
                    <a href="#roles" class="hover:text-brand-600 transition-colors">Roles</a>
                    <a href="#categories" class="hover:text-brand-600 transition-colors">Categories</a>
                    <a href="#faq" class="hover:text-brand-600 transition-colors">FAQ</a>
                </div>

                <!-- Desktop CTA Buttons -->
                <div class="hidden md:flex items-center gap-3">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-5 py-2.5 text-sm font-semibold text-white bg-brand-500 hover:bg-brand-600 rounded-xl transition-all shadow-sm">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="px-5 py-2.5 text-sm font-semibold text-slate-700 hover:text-slate-900 transition-colors">
                                Sign In
                            </a>
                            <a href="{{ route('register') }}" class="px-5 py-2.5 text-sm font-semibold text-white bg-brand-500 hover:bg-brand-600 rounded-xl transition-all shadow-sm">
                                Access Portal
                            </a>
                        @endauth
                    @else
                        <a href="#contact" class="px-5 py-2.5 text-sm font-semibold text-white bg-brand-500 hover:bg-brand-600 rounded-xl transition-all shadow-sm">
                            Get Started
                        </a>
                    @endif
                </div>

                <!-- Mobile Menu Toggle Button -->
                <div class="md:hidden flex items-center">
                    <button @click="mobileOpen = !mobileOpen" type="button" class="text-slate-600 hover:text-slate-900 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="!mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path x-show="mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Dropdown Menu -->
        <div x-show="mobileOpen" x-transition class="md:hidden border-b border-slate-200 bg-white">
            <div class="px-4 pt-4 pb-6 space-y-3 font-semibold text-slate-700">
                <a href="#features" @click="mobileOpen = false" class="block hover:text-brand-600">Features</a>
                <a href="#workflow" @click="mobileOpen = false" class="block hover:text-brand-600">Workflow</a>
                <a href="#roles" @click="mobileOpen = false" class="block hover:text-brand-600">Roles</a>
                <a href="#categories" @click="mobileOpen = false" class="block hover:text-brand-600">Categories</a>
                <a href="#faq" @click="mobileOpen = false" class="block hover:text-brand-600">FAQ</a>
                <div class="pt-4 border-t border-slate-100 flex flex-col gap-2">
                    <a href="{{ route('login') }}" class="w-full text-center py-2 text-slate-700 border border-slate-200 rounded-xl font-semibold">Sign In</a>
                    <a href="{{ route('register') }}" class="w-full text-center py-2 text-white bg-brand-500 rounded-xl font-semibold">Access Portal</a>
                </div>
            </div>
        </div>
    </nav>


    <!-- ================= HERO SECTION ================= -->
    <section class="relative pt-12 pb-20 md:pt-20 md:pb-28 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Left Column -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-brand-50 border border-brand-100 rounded-full text-brand-600 text-xs font-bold tracking-wide">
                        <span class="w-2 h-2 rounded-full bg-brand-500 animate-pulse"></span>
                        Centralized University Communication Engine
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-[1.1]">
                        The digital heartbeat of modern campus <span class="text-brand-500">information.</span>
                    </h1>

                    <p class="text-lg text-slate-600 font-normal leading-relaxed max-w-2xl">
                        Say goodbye to physical notice boards, buried emails, and noisy group chats. CampusPulse delivers verified, targeted, and real-time university notices straight to students and staff.
                    </p>

                    <div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
                        <a href="#features" class="px-8 py-4 bg-brand-500 hover:bg-brand-600 text-white font-bold text-center text-sm rounded-2xl shadow-lg shadow-brand-500/20 transition-all">
                            Explore Features
                        </a>
                        <a href="#categories" class="px-8 py-4 bg-white hover:bg-slate-100 text-slate-800 border border-slate-200 font-bold text-center text-sm rounded-2xl transition-all">
                            Notice Categories
                        </a>
                    </div>

                    <!-- Metric Cards -->
                    <div class="pt-8 grid grid-cols-3 gap-4 border-t border-slate-200/80">
                        <div>
                            <div class="text-2xl sm:text-3xl font-extrabold text-slate-900">100%</div>
                            <div class="text-xs text-slate-500 font-medium mt-0.5">Targeted Delivery</div>
                        </div>
                        <div>
                            <div class="text-2xl sm:text-3xl font-extrabold text-slate-900">Real-Time</div>
                            <div class="text-xs text-slate-500 font-medium mt-0.5">Push Notifications</div>
                        </div>
                        <div>
                            <div class="text-2xl sm:text-3xl font-extrabold text-slate-900">Zero</div>
                            <div class="text-xs text-slate-500 font-medium mt-0.5">Information Loss</div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Card Preview -->
                <div class="lg:col-span-5">
                    <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-xl relative">
                        <div class="flex items-center justify-between pb-4 border-b border-slate-100 mb-4">
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 bg-red-400 rounded-full inline-block"></span>
                                <span class="w-3 h-3 bg-amber-400 rounded-full inline-block"></span>
                                <span class="w-3 h-3 bg-emerald-400 rounded-full inline-block"></span>
                            </div>
                            <span class="text-xs font-semibold text-slate-400">campuspulse.edu/live</span>
                        </div>

                        <!-- Emergency Sample Card -->
                        <div class="bg-red-50 border border-red-200 rounded-2xl p-4 mb-4">
                            <div class="flex items-center justify-between text-xs mb-2">
                                <span class="px-2.5 py-1 bg-red-600 text-white font-bold rounded-lg uppercase tracking-wider text-[10px]">Emergency</span>
                                <span class="text-slate-500 text-xs font-medium">Just now</span>
                            </div>
                            <h3 class="text-sm font-bold text-slate-900 mb-1">Severe Weather Campus Closure</h3>
                            <p class="text-xs text-slate-600">All lectures after 14:00 are suspended. Regular operations resume tomorrow at 08:00 AM.</p>
                        </div>

                        <!-- Academic Sample Card -->
                        <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4">
                            <div class="flex items-center justify-between text-xs mb-2">
                                <span class="px-2.5 py-1 bg-brand-100 text-brand-600 font-bold rounded-lg uppercase tracking-wider text-[10px]">Academic</span>
                                <span class="text-slate-500 text-xs font-medium">Software Eng. • Year 3</span>
                            </div>
                            <h3 class="text-sm font-bold text-slate-900 mb-1">Final Examination Timetable Released</h3>
                            <p class="text-xs text-slate-600">The semester schedule is finalized. Download the official PDF attachment.</p>
                            <div class="mt-3 pt-3 border-t border-slate-200/80 flex items-center justify-between text-xs">
                                <span class="text-brand-600 font-semibold">timetable_v2.pdf</span>
                                <span class="text-slate-400">High Priority</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ================= BENTO GRID FEATURES ================= -->
    <section id="features" class="py-20 bg-slate-100/70 border-y border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold text-brand-600 uppercase tracking-widest bg-brand-50 px-3 py-1 rounded-full border border-brand-100">Bento Overview</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight mt-3">
                    Engineered for Campus Efficiency
                </h2>
                <p class="text-slate-600 text-sm mt-2">
                    A comprehensive suite of tools built to keep every student, lecturer, and administrative officer aligned.
                </p>
            </div>

            <!-- Bento Grid Container -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                
                <!-- Bento Box 1: Large Featured -->
                <div class="md:col-span-2 lg:col-span-2 bg-white border border-slate-200 rounded-3xl p-8 flex flex-col justify-between shadow-sm hover:shadow-md transition-all">
                    <div>
                        <div class="w-12 h-12 bg-brand-50 text-brand-600 rounded-2xl flex items-center justify-center font-bold text-lg mb-6">
                            01
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-2">Centralized Information Hub</h3>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            Consolidate scattered announcements into one reliable digital portal. Say goodbye to outdated physical bulletin boards and unread email threads.
                        </p>
                    </div>
                    <div class="mt-8 pt-6 border-t border-slate-100 flex items-center gap-2 text-xs font-semibold text-brand-600">
                        <span>Verified Single Source of Truth</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </div>
                </div>

                <!-- Bento Box 2 -->
                <div class="bg-white border border-slate-200 rounded-3xl p-8 flex flex-col justify-between shadow-sm hover:shadow-md transition-all">
                    <div>
                        <div class="w-12 h-12 bg-brand-50 text-brand-600 rounded-2xl flex items-center justify-center font-bold text-lg mb-6">
                            02
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Targeted Distribution</h3>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            Filter updates precisely by faculty, department, program, and academic year.
                        </p>
                    </div>
                    <span class="mt-6 text-xs font-semibold text-slate-400">Zero Spam</span>
                </div>

                <!-- Bento Box 3 -->
                <div class="bg-white border border-slate-200 rounded-3xl p-8 flex flex-col justify-between shadow-sm hover:shadow-md transition-all">
                    <div>
                        <div class="w-12 h-12 bg-brand-50 text-brand-600 rounded-2xl flex items-center justify-center font-bold text-lg mb-6">
                            03
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Notice Life-Cycles</h3>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            Set automatic expiration dates so outdated notices clear automatically.
                        </p>
                    </div>
                    <span class="mt-6 text-xs font-semibold text-slate-400">Auto Expiry</span>
                </div>

                <!-- Bento Box 4 -->
                <div class="bg-white border border-slate-200 rounded-3xl p-8 flex flex-col justify-between shadow-sm hover:shadow-md transition-all">
                    <div>
                        <div class="w-12 h-12 bg-brand-50 text-brand-600 rounded-2xl flex items-center justify-center font-bold text-lg mb-6">
                            04
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Instant Alerts</h3>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            In-app notifications, WebSockets, and email updates keep everyone in the loop instantly.
                        </p>
                    </div>
                    <span class="mt-6 text-xs font-semibold text-slate-400">Real-Time Sync</span>
                </div>

                <!-- Bento Box 5: Wide Feature -->
                <div class="md:col-span-2 lg:col-span-3 bg-white border border-slate-200 rounded-3xl p-8 flex flex-col justify-between shadow-sm hover:shadow-md transition-all">
                    <div>
                        <div class="w-12 h-12 bg-brand-50 text-brand-600 rounded-2xl flex items-center justify-center font-bold text-lg mb-6">
                            05
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-2">Document & Attachment Vault</h3>
                        <p class="text-slate-600 text-sm leading-relaxed max-w-xl">
                            Attach timetable PDFs, course outlines, registration guides, and policy updates directly to published notices for easy one-click student downloads.
                        </p>
                    </div>
                    <div class="mt-6 flex gap-3 text-xs font-semibold text-slate-500">
                        <span class="px-3 py-1.5 bg-slate-100 rounded-xl">PDF Attachments</span>
                        <span class="px-3 py-1.5 bg-slate-100 rounded-xl">Cloud Storage</span>
                        <span class="px-3 py-1.5 bg-slate-100 rounded-xl">Fast Search</span>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ================= PUBLISHING WORKFLOW ================= -->
    <section id="workflow" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-bold text-brand-600 uppercase tracking-widest bg-brand-50 px-3 py-1 rounded-full border border-brand-100">Governance Pipeline</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight mt-3">
                    Structured Approval Workflow
                </h2>
                <p class="text-slate-600 text-sm mt-2">Ensure all notices undergo proper review before broadcasting to students.</p>
            </div>

            <!-- Workflow Pipeline Badges -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
                <div class="p-6 bg-slate-50 border border-slate-200 rounded-2xl text-center">
                    <span class="text-xs font-bold text-slate-400">01</span>
                    <h4 class="font-bold text-slate-900 mt-2 mb-1">Draft</h4>
                    <p class="text-xs text-slate-500">Author creates notice</p>
                </div>
                <div class="p-6 bg-slate-50 border border-slate-200 rounded-2xl text-center">
                    <span class="text-xs font-bold text-slate-400">02</span>
                    <h4 class="font-bold text-slate-900 mt-2 mb-1">Submitted</h4>
                    <p class="text-xs text-slate-500">Sent to review queue</p>
                </div>
                <div class="p-6 bg-brand-50 border border-brand-200 rounded-2xl text-center shadow-sm">
                    <span class="text-xs font-bold text-brand-600">03</span>
                    <h4 class="font-bold text-brand-600 mt-2 mb-1">Pending Approval</h4>
                    <p class="text-xs text-brand-600/80">Department review</p>
                </div>
                <div class="p-6 bg-slate-50 border border-slate-200 rounded-2xl text-center">
                    <span class="text-xs font-bold text-slate-400">04</span>
                    <h4 class="font-bold text-slate-900 mt-2 mb-1">Approved</h4>
                    <p class="text-xs text-slate-500">Verification complete</p>
                </div>
                <div class="p-6 bg-slate-50 border border-slate-200 rounded-2xl text-center">
                    <span class="text-xs font-bold text-slate-400">05</span>
                    <h4 class="font-bold text-slate-900 mt-2 mb-1">Published</h4>
                    <p class="text-xs text-slate-500">Broadcasted live</p>
                </div>
                <div class="p-6 bg-slate-50 border border-slate-200 rounded-2xl text-center">
                    <span class="text-xs font-bold text-slate-400">06</span>
                    <h4 class="font-bold text-slate-900 mt-2 mb-1">Archived</h4>
                    <p class="text-xs text-slate-500">Saved to historical feed</p>
                </div>
            </div>
        </div>
    </section>


    <!-- ================= USER ROLES BENTO ================= -->
    <section id="roles" class="py-20 bg-slate-100/70 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-bold text-brand-600 uppercase tracking-widest bg-brand-50 px-3 py-1 rounded-full border border-brand-100">Role Architecture</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight mt-3">
                    Role-Based Platform Access
                </h2>
                <p class="text-slate-600 text-sm mt-2">Tailored dashboards for every university stakeholder.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Super Admin -->
                <div class="bg-white border border-slate-200 rounded-3xl p-6 flex flex-col justify-between shadow-sm">
                    <div>
                        <span class="px-2.5 py-1 bg-slate-100 text-slate-700 font-bold text-[10px] rounded-lg uppercase">System Level</span>
                        <h3 class="text-lg font-bold text-slate-900 mt-3 mb-2">Super Admin</h3>
                        <p class="text-xs text-slate-600 leading-relaxed mb-4">
                            System configurations, user management, global permissions, and security audit monitoring.
                        </p>
                    </div>
                    <span class="text-xs font-bold text-brand-600">Full System Control</span>
                </div>

                <!-- Notice Admin -->
                <div class="bg-white border border-slate-200 rounded-3xl p-6 flex flex-col justify-between shadow-sm">
                    <div>
                        <span class="px-2.5 py-1 bg-brand-50 text-brand-600 font-bold text-[10px] rounded-lg uppercase">Executive</span>
                        <h3 class="text-lg font-bold text-slate-900 mt-3 mb-2">Notice Administrator</h3>
                        <p class="text-xs text-slate-600 leading-relaxed mb-4">
                            Registrar & Academic Offices. Oversees university-wide updates and notice categories.
                        </p>
                    </div>
                    <span class="text-xs font-bold text-brand-600">Publishing Permissions</span>
                </div>

                <!-- Department Staff -->
                <div class="bg-white border border-slate-200 rounded-3xl p-6 flex flex-col justify-between shadow-sm">
                    <div>
                        <span class="px-2.5 py-1 bg-slate-100 text-slate-700 font-bold text-[10px] rounded-lg uppercase">Academic</span>
                        <h3 class="text-lg font-bold text-slate-900 mt-3 mb-2">Department Staff</h3>
                        <p class="text-xs text-slate-600 leading-relaxed mb-4">
                            Lecturers & Coordinators. Drafts and submits course timetables and module notices.
                        </p>
                    </div>
                    <span class="text-xs font-bold text-brand-600">Content Creation</span>
                </div>

                <!-- Students -->
                <div class="bg-white border border-slate-200 rounded-3xl p-6 flex flex-col justify-between shadow-sm">
                    <div>
                        <span class="px-2.5 py-1 bg-slate-100 text-slate-700 font-bold text-[10px] rounded-lg uppercase">Consumer</span>
                        <h3 class="text-lg font-bold text-slate-900 mt-3 mb-2">Students</h3>
                        <p class="text-xs text-slate-600 leading-relaxed mb-4">
                            Filterable notice feed, instant bookmarking, PDF downloads, and personal alert preferences.
                        </p>
                    </div>
                    <span class="text-xs font-bold text-brand-600">Personalized Feed</span>
                </div>

            </div>
        </div>
    </section>


    <!-- ================= CATEGORIES SECTION ================= -->
    <section id="categories" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-bold text-brand-600 uppercase tracking-widest bg-brand-50 px-3 py-1 rounded-full border border-brand-100">Taxonomy</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight mt-3">
                    Notice Categories
                </h2>
                <p class="text-slate-600 text-sm mt-2">Clear categorization for quick filtering and quick discovery.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                
                <div class="p-6 bg-slate-50 border border-slate-200 rounded-2xl hover:border-brand-500 transition-all">
                    <div class="w-8 h-8 bg-brand-50 text-brand-600 font-bold text-xs rounded-xl flex items-center justify-center mb-4">01</div>
                    <h4 class="font-bold text-slate-900 text-sm mb-1">Academic</h4>
                    <p class="text-xs text-slate-500">Exams, timetables, coursework, and deadlines.</p>
                </div>

                <div class="p-6 bg-slate-50 border border-slate-200 rounded-2xl hover:border-brand-500 transition-all">
                    <div class="w-8 h-8 bg-brand-50 text-brand-600 font-bold text-xs rounded-xl flex items-center justify-center mb-4">02</div>
                    <h4 class="font-bold text-slate-900 text-sm mb-1">Administration</h4>
                    <p class="text-xs text-slate-500">Fee clearances, university policies, and circulars.</p>
                </div>

                <div class="p-6 bg-slate-50 border border-slate-200 rounded-2xl hover:border-brand-500 transition-all">
                    <div class="w-8 h-8 bg-brand-50 text-brand-600 font-bold text-xs rounded-xl flex items-center justify-center mb-4">03</div>
                    <h4 class="font-bold text-slate-900 text-sm mb-1">Events</h4>
                    <p class="text-xs text-slate-500">Seminars, hackathons, and guest lectures.</p>
                </div>

                <div class="p-6 bg-slate-50 border border-slate-200 rounded-2xl hover:border-brand-500 transition-all">
                    <div class="w-8 h-8 bg-brand-50 text-brand-600 font-bold text-xs rounded-xl flex items-center justify-center mb-4">04</div>
                    <h4 class="font-bold text-slate-900 text-sm mb-1">Careers</h4>
                    <p class="text-xs text-slate-500">Internships, job postings, and scholarships.</p>
                </div>

                <div class="p-6 bg-red-50 border border-red-200 rounded-2xl hover:border-red-500 transition-all">
                    <div class="w-8 h-8 bg-red-100 text-red-600 font-bold text-xs rounded-xl flex items-center justify-center mb-4">05</div>
                    <h4 class="font-bold text-red-900 text-sm mb-1">Emergency</h4>
                    <p class="text-xs text-red-600/80">Campus closures and security advisories.</p>
                </div>

            </div>
        </div>
    </section>


    <!-- ================= FAQ ================= -->
    <section id="faq" class="py-20 bg-slate-100/70 border-t border-slate-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-bold text-brand-600 uppercase tracking-widest bg-brand-50 px-3 py-1 rounded-full border border-brand-100">Got Questions?</span>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight mt-3">Frequently Asked Questions</h2>
            </div>

            <div class="space-y-4" x-data="{ active: 1 }">
                
                <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
                    <button @click="active = (active === 1 ? null : 1)" class="w-full text-left p-6 flex justify-between items-center text-slate-900 font-bold text-sm">
                        <span>How does CampusPulse replace existing social media and email groups?</span>
                        <span class="text-brand-600 font-bold" x-text="active === 1 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 1" x-collapse class="px-6 pb-6 text-xs text-slate-600 leading-relaxed">
                        CampusPulse acts as the official single source of truth. All notice entries are categorized, assigned defined target audiences, and given explicit expiration dates so information stays relevant and searchable.
                    </div>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
                    <button @click="active = (active === 2 ? null : 2)" class="w-full text-left p-6 flex justify-between items-center text-slate-900 font-bold text-sm">
                        <span>Can students view notices from other faculties?</span>
                        <span class="text-brand-600 font-bold" x-text="active === 2 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 2" x-collapse class="px-6 pb-6 text-xs text-slate-600 leading-relaxed">
                        Students see notices targeted to their faculty, department, program, and year by default. They can also use the global search to look up public notices across other departments.
                    </div>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
                    <button @click="active = (active === 3 ? null : 3)" class="w-full text-left p-6 flex justify-between items-center text-slate-900 font-bold text-sm">
                        <span>How are emergency alerts handled?</span>
                        <span class="text-brand-600 font-bold" x-text="active === 3 ? '−' : '+'"></span>
                    </button>
                    <div x-show="active === 3" x-collapse class="px-6 pb-6 text-xs text-slate-600 leading-relaxed">
                        Emergency notices bypass typical moderation queues and broadcast immediate real-time browser notifications alongside urgent email updates.
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ================= CTA ================= -->
    <section class="py-20 bg-white text-center border-t border-slate-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                Ready to Upgrade Campus Communication?
            </h2>
            <p class="text-slate-600 text-sm max-w-xl mx-auto">
                Join modern universities replacing scattered notice boards with CampusPulse.
            </p>
            <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('register') }}" class="w-full sm:w-auto px-8 py-4 bg-brand-500 hover:bg-brand-600 text-white font-bold text-sm rounded-2xl shadow-lg shadow-brand-500/20 transition-all">
                    Access Portal
                </a>
                <a href="#contact" class="w-full sm:w-auto px-8 py-4 bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-sm rounded-2xl transition-all">
                    Contact Administration
                </a>
            </div>
        </div>
    </section>


    <!-- ================= FOOTER ================= -->
    <footer class="bg-slate-900 text-slate-400 text-xs py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-12 gap-8">
            
            <div class="md:col-span-5 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-brand-500 rounded-xl flex items-center justify-center font-bold text-white text-base">
                        CP
                    </div>
                    <span class="text-lg font-bold text-white tracking-tight">
                        Campus<span class="text-brand-400">Pulse</span>
                    </span>
                </div>
                <p class="text-slate-400 leading-relaxed max-w-sm">
                    The modern digital university communication and information management platform. Replacing physical notice boards with trusted digital streams.
                </p>
            </div>

            <div class="md:col-span-2 space-y-3">
                <div class="text-white font-bold uppercase tracking-wider">Navigation</div>
                <ul class="space-y-2">
                    <li><a href="#features" class="hover:text-white transition-colors">Features</a></li>
                    <li><a href="#workflow" class="hover:text-white transition-colors">Workflow</a></li>
                    <li><a href="#roles" class="hover:text-white transition-colors">Roles</a></li>
                    <li><a href="#categories" class="hover:text-white transition-colors">Categories</a></li>
                </ul>
            </div>

            <div class="md:col-span-2 space-y-3">
                <div class="text-white font-bold uppercase tracking-wider">Tech Stack</div>
                <ul class="space-y-2 text-slate-400 font-mono">
                    <li>Laravel 13+</li>
                    <li>Livewire 3</li>
                    <li>Alpine.js</li>
                    <li>Tailwind CSS v4</li>
                </ul>
            </div>

            <div class="md:col-span-3 space-y-3">
                <div class="text-white font-bold uppercase tracking-wider">System Status</div>
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 bg-emerald-400 rounded-full"></span>
                    <span class="text-slate-300 font-medium">All Services Online</span>
                </div>
                <p class="text-slate-500 text-[11px] pt-2">
                    CampusPulse Platform &copy; {{ date('Y') }}. Built for higher education.
                </p>
            </div>

        </div>
    </footer>

</body>
</html>