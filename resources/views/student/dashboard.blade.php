@extends('layouts.student')

@section('title', 'Student Feed')

@section('content')
<div class="space-y-8">
    
    <!-- Welcome Header & Audience Target Context -->
    <div class="bg-gradient-to-r from-slate-900 via-slate-800 to-brand-900 rounded-3xl p-6 sm:p-8 text-white relative overflow-hidden shadow-lg">
        <div class="relative z-10 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <div class="flex items-center gap-2">
                    <span class="px-2.5 py-1 bg-brand-500/20 border border-brand-400/30 text-brand-300 font-bold text-[11px] rounded-full uppercase tracking-wider">
                        Personalized Feed
                    </span>
                    <span class="text-slate-400 text-xs">• Semester 1, 2026/2027</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-black tracking-tight mt-2">
                    Welcome back, {{ auth()->user()->name ?? 'Alex' }} 👋
                </h1>
                <p class="text-slate-300 text-xs mt-1">
                    Filtered for: <strong class="text-white">Faculty of Computing</strong> → <strong class="text-white">Software Engineering</strong> (Year 3)
                </p>
            </div>
            
            <a href="{{ route('student.profile.show') }}" class="px-4 py-2.5 bg-white/10 hover:bg-white/20 text-white font-semibold text-xs rounded-2xl border border-white/10 transition-all backdrop-blur-sm">
                Update Academic Context
            </a>
        </div>
    </div>

    <!-- Livewire Personal Feed Component Container -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Main Feed Column (8 Cols) -->
        <div class="lg:col-span-8 space-y-6">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-extrabold text-slate-900 tracking-tight">Targeted Announcements</h2>
                <div class="flex items-center gap-2 text-xs font-semibold text-slate-500">
                    <span>Priority Filter:</span>
                    <select class="bg-white border border-slate-200 rounded-xl px-2.5 py-1 text-xs focus:ring-brand-500">
                        <option>All Priorities</option>
                        <option>High Priority Only</option>
                        <option>Academic Only</option>
                    </select>
                </div>
            </div>

            <!-- Embed Livewire Component for Feed -->
            <livewire:student.personal-feed />
        </div>

        <!-- Right Side Widgets Column (4 Cols) -->
        <div class="lg:col-span-4 space-y-6">
            
            <!-- Urgent / Emergency Alert Box -->
            <div class="bg-red-50 border border-red-200 rounded-3xl p-5 space-y-3">
                <div class="flex items-center gap-2 text-red-700 font-bold text-xs uppercase tracking-wider">
                    <span class="w-2 h-2 rounded-full bg-red-600 animate-ping"></span>
                    Emergency Notice
                </div>
                <h3 class="text-sm font-bold text-slate-900">Campus Connectivity & Maintenance Notice</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Main server infrastructure updates planned for Saturday at 00:00 UTC. Student Portal access may experience brief intermittent drops.
                </p>
            </div>

            <!-- Quick Bookmarks Summary -->
            <div class="bg-white border border-slate-200 rounded-3xl p-5 space-y-4 shadow-sm">
                <div class="flex items-center justify-between">
                    <h3 class="text-xs font-bold text-slate-900 uppercase tracking-wider">Recent Saved Notices</h3>
                    <a href="{{ route('student.bookmarks.index') }}" class="text-xs font-bold text-brand-600 hover:text-brand-500">View All</a>
                </div>
                
                <div class="space-y-3 text-xs">
                    <a href="#" class="block p-3 rounded-2xl bg-slate-50 hover:bg-slate-100 transition-colors">
                        <span class="text-[10px] font-bold text-brand-600 uppercase">Academic</span>
                        <p class="font-bold text-slate-800 mt-0.5 line-clamp-1">Software Architecture Mid-Term Exam Timetable</p>
                        <span class="text-[10px] text-slate-400 mt-1 block">Saved 2 days ago</span>
                    </a>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection