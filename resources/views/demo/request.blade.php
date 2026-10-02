<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Request Demo | CampusPulse</title>

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
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body
    class="bg-slate-50 font-sans text-slate-800 antialiased selection:bg-brand-500 selection:text-white min-h-screen flex flex-col justify-between">

    <!-- ================= NAVBAR ================= -->
    <nav class="bg-white/80 backdrop-blur-md border-b border-slate-200/80 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <a href="/" class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 bg-brand-500 rounded-xl flex items-center justify-center font-black text-white text-xl shadow-sm">
                        CP
                    </div>
                    <span class="text-2xl font-bold tracking-tight text-slate-900">
                        Campus<span class="text-brand-500">Pulse</span>
                    </span>
                </a>

                <div class="flex items-center gap-4">
                    <a href="/" class="text-xs font-semibold text-slate-600 hover:text-slate-900 transition-colors">
                        Back to Overview
                    </a>
                    <a href="{{ route('login') }}"
                        class="px-5 py-2.5 text-xs font-semibold text-white bg-brand-500 hover:bg-brand-600 rounded-xl transition-all shadow-sm">
                        Sign In
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- ================= MAIN SECTION ================= -->
    <main class="py-12 sm:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">

                <!-- Left Column: Value Proposition & Demo Expectations -->
                <div class="lg:col-span-5 space-y-8 pt-2">
                    <div>
                        <span
                            class="px-3 py-1.5 bg-brand-50 border border-brand-100 rounded-full text-brand-600 text-xs font-bold tracking-wide">
                            Institutional Onboarding
                        </span>
                        <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight mt-4 leading-tight">
                            Experience the future of campus communication.
                        </h1>
                        <p class="text-slate-600 text-sm mt-3 leading-relaxed">
                            Schedule a guided walkthrough tailored to your institution. See how CampusPulse
                            eliminates fragmented WhatsApp groups and physical notice boards with targeted digital
                            publishing.
                        </p>
                    </div>

                    <!-- What you will see -->
                    <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm space-y-4">
                        <h3 class="text-xs font-bold uppercase text-slate-400 tracking-wider">What the live demo
                            includes</h3>

                        <div class="space-y-4 text-xs font-medium text-slate-700">
                            <div class="flex items-start gap-3">
                                <div
                                    class="w-6 h-6 rounded-lg bg-brand-50 text-brand-600 flex items-center justify-center shrink-0 font-bold">
                                    1</div>
                                <p class="pt-0.5"><strong class="text-slate-900">Audience Targeting:</strong> Precision
                                    notice distribution by Faculty, Department, Program, and Cohort Year.</p>
                            </div>
                            <div class="flex items-start gap-3">
                                <div
                                    class="w-6 h-6 rounded-lg bg-brand-50 text-brand-600 flex items-center justify-center shrink-0 font-bold">
                                    2</div>
                                <p class="pt-0.5"><strong class="text-slate-900">Approval Workflows:</strong> Multi-tier
                                    authorization steps from Draft submission to live publishing.</p>
                            </div>
                            <div class="flex items-start gap-3">
                                <div
                                    class="w-6 h-6 rounded-lg bg-brand-50 text-brand-600 flex items-center justify-center shrink-0 font-bold">
                                    3</div>
                                <p class="pt-0.5"><strong class="text-slate-900">Real-Time Alerts:</strong> WebSocket
                                    notifications powered by Laravel Reverb for critical and emergency updates.
                                </p>
                            </div>
                            <div class="flex items-start gap-3">
                                <div
                                    class="w-6 h-6 rounded-lg bg-brand-50 text-brand-600 flex items-center justify-center shrink-0 font-bold">
                                    4</div>
                                <p class="pt-0.5"><strong class="text-slate-900">Student Portal:</strong> Personalized
                                    feeds, attachment downloads, and bookmarking experience.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Live Metrics / Stats -->
                    <div class="p-6 bg-slate-900 rounded-3xl text-white space-y-3">
                        <div class="flex items-center justify-between border-b border-slate-800 pb-3 text-xs">
                            <span class="text-slate-400">Target Tech Stack</span>
                            <span class="font-mono text-brand-400">Laravel 13+ & Livewire 3</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-slate-400">Deployment Options</span>
                            <span class="font-semibold text-slate-200">On-Premise / Cloud Storage</span>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Interactive Form -->
                <div class="lg:col-span-7 bg-white border border-slate-200 rounded-3xl p-8 sm:p-10 shadow-xl">

                    @if (session('success'))
                        <div class="mb-8 p-6 rounded-2xl bg-emerald-50 border border-emerald-200 text-slate-800 space-y-2">
                            <div class="flex items-center gap-2 text-emerald-700 font-bold text-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Request Submitted Successfully
                            </div>
                            <p class="text-xs text-slate-600">
                                Thank you for your interest in CampusPulse. An institutional specialist will
                                contact you within 24 business hours to schedule your personalized demo session.
                            </p>
                        </div>
                    @else
                        <div class="mb-8">
                            <h2 class="text-xl font-bold text-slate-900">Request an Institutional Demonstration</h2>
                            <p class="text-xs text-slate-500 mt-1">Fill out the details below to schedule a walkthrough with
                                our technical team.</p>
                        </div>

                        <!-- Validation Errors -->
                        @if ($errors->any())
                            <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-xs text-red-600 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <p>• {{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <form method="POST" action="{{ route('demo.submit') }}" class="space-y-6"
                            x-data="{ role: 'notice-admin' }">
                            @csrf

                            <!-- Full Name & Email -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="full_name"
                                        class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Full
                                        Name *</label>
                                    <input id="full_name" type="text" name="full_name" value="{{ old('full_name') }}"
                                        required placeholder="Dr. Jane Doe"
                                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
                                </div>
                                <div>
                                    <label for="email"
                                        class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Institutional
                                        Email *</label>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                        placeholder="j.doe@university.edu"
                                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
                                </div>
                            </div>

                            <!-- Institution Name & Department -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="institution"
                                        class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">University
                                        / Institution Name *</label>
                                    <input id="institution" type="text" name="institution" value="{{ old('institution') }}"
                                        required placeholder="Global University of Science"
                                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
                                </div>
                                <div>
                                    <label for="department"
                                        class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Faculty
                                        or Department</label>
                                    <input id="department" type="text" name="department" value="{{ old('department') }}"
                                        placeholder="e.g., Faculty of Computing / Registrar Office"
                                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
                                </div>
                            </div>

                            <!-- Target Stakeholder Role Selector -->
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Your
                                    Primary Role</label>
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                                    <label class="cursor-pointer">
                                        <input type="radio" name="role" value="super-admin" x-model="role" class="sr-only">
                                        <div :class="role === 'super-admin' ? 'bg-brand-500 text-white border-brand-500' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100'"
                                            class="p-3 border rounded-2xl text-center text-xs font-semibold transition-all">
                                            Super Admin
                                        </div>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="role" value="notice-admin" x-model="role" class="sr-only">
                                        <div :class="role === 'notice-admin' ? 'bg-brand-500 text-white border-brand-500' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100'"
                                            class="p-3 border rounded-2xl text-center text-xs font-semibold transition-all">
                                            Registrar / Admin
                                        </div>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="role" value="department-staff" x-model="role"
                                            class="sr-only">
                                        <div :class="role === 'department-staff' ? 'bg-brand-500 text-white border-brand-500' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100'"
                                            class="p-3 border rounded-2xl text-center text-xs font-semibold transition-all">
                                            Academic Staff
                                        </div>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="role" value="student-leader" x-model="role"
                                            class="sr-only">
                                        <div :class="role === 'student-leader' ? 'bg-brand-500 text-white border-brand-500' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100'"
                                            class="p-3 border rounded-2xl text-center text-xs font-semibold transition-all">
                                            Student Body
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- Student Population Dropdown -->
                            <div>
                                <label for="student_count"
                                    class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Approximate
                                    Student Body Size</label>
                                <select id="student_count" name="student_count"
                                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 focus:bg-white focus:outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
                                    <option value="under_2000">Under 2,000 Students</option>
                                    <option value="2000_10000" selected>2,000 – 10,000 Students</option>
                                    <option value="10000_25000">10,000 – 25,000 Students</option>
                                    <option value="over_25000">25,000+ Students</option>
                                </select>
                            </div>

                            <!-- Specific Requirements -->
                            <div>
                                <label for="message"
                                    class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Primary
                                    Communication Challenges / Requirements</label>
                                <textarea id="message" name="message" rows="4"
                                    placeholder="Tell us about your current communication channels (WhatsApp, email, physical notice boards) and what you'd like to improve..."
                                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">{{ old('message') }}</textarea>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full py-4 px-6 bg-brand-500 hover:bg-brand-600 text-white font-bold text-xs uppercase tracking-wider rounded-2xl shadow-lg shadow-brand-500/20 transition-all">
                                Submit Demo Request
                            </button>

                            <p class="text-[11px] text-slate-400 text-center">
                                By submitting, you agree to receive information about CampusPulse demonstration
                                sessions. No spam.
                            </p>
                        </form>
                    @endif

                </div>

            </div>

        </div>
    </main>

    <!-- ================= FOOTER ================= -->
    <footer class="bg-slate-900 text-slate-400 text-xs py-8 border-t border-slate-800">
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div
                    class="w-6 h-6 bg-brand-500 rounded-lg flex items-center justify-center font-bold text-white text-xs">
                    CP
                </div>
                <span class="font-bold text-white tracking-tight">CampusPulse</span>
            </div>
            <p class="text-slate-500 text-[11px]">
                &copy; {{ date('Y') }} CampusPulse. Digital University Information Management System.
            </p>
        </div>
    </footer>

</body>

</html>