@extends('layouts.student')

@section('title', $notice->title ?? 'Notice Details')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Back Navigation Bar -->
    <div class="flex items-center justify-between">
        <a href="{{ route('student.notices.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-slate-800 transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back to All Notices
        </a>

        <!-- Bookmark Toggle Button -->
        <button class="inline-flex items-center gap-2 px-3.5 py-2 bg-white border border-slate-200 rounded-2xl text-xs font-bold text-slate-700 hover:bg-slate-50 transition-all shadow-sm">
            <svg class="w-4 h-4 text-brand-500" fill="currentColor" viewBox="0 0 24 24"><path d="M5 5c0-1.1.9-2 2-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>
            <span>Saved in Bookmarks</span>
        </button>
    </div>

    <!-- Main Notice Card Container -->
    <article class="bg-white border border-slate-200 rounded-3xl p-8 sm:p-10 shadow-sm space-y-8">
        
        <!-- Header Metadata -->
        <div class="space-y-4 border-b border-slate-100 pb-6">
            <div class="flex flex-wrap items-center gap-2 text-xs">
                <span class="px-3 py-1 bg-brand-50 text-brand-600 font-bold rounded-full uppercase tracking-wider text-[10px]">
                    {{ $notice->category->name ?? 'Academic' }}
                </span>
                <span class="px-3 py-1 bg-red-50 text-red-600 font-bold rounded-full uppercase tracking-wider text-[10px]">
                    High Priority
                </span>
                <span class="text-slate-400 text-[11px] ml-auto">
                    Published on Oct 14, 2026 • {{ $notice->created_at->diffForHumans() ?? '2 hours ago' }}
                </span>
            </div>

            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight leading-snug">
                {{ $notice->title ?? 'Final Examination Timetable & Hall Allocation Released' }}
            </h1>

            <div class="flex items-center gap-3 pt-2">
                <div class="w-8 h-8 rounded-full bg-slate-100 font-bold text-xs flex items-center justify-center text-slate-700">
                    RA
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-800">{{ $notice->author->name ?? 'Registrar Academic Office' }}</p>
                    <p class="text-[11px] text-slate-500">{{ $notice->department->name ?? 'Central University Administration' }}</p>
                </div>
            </div>
        </div>

        <!-- Audience Scope Information -->
        <div class="bg-slate-50 border border-slate-200/80 rounded-2xl p-4 text-xs space-y-1">
            <span class="font-bold text-slate-700 uppercase text-[10px] tracking-wider">Target Audience Scope</span>
            <p class="text-slate-600">
                Visible to: <strong>Faculty of Computing</strong> | <strong>Software Engineering</strong> | <strong>Year 3</strong>
            </p>
        </div>

        <!-- Body Content -->
        <div class="prose prose-slate max-w-none text-xs sm:text-sm text-slate-700 leading-relaxed space-y-4">
            <p>
                {{ $notice->description ?? 'Please find attached the official end-of-semester examination timetable for the 2026/2027 academic year. Students are required to verify their enrolled course codes against hall allocations at least 48 hours prior to examination dates.' }}
            </p>
            <p>
                Ensure that you hold a valid Student ID Card and registered Examination Clearance Slip.
            </p>
        </div>

        <!-- Attachments Section -->
        <div class="pt-6 border-t border-slate-100 space-y-3">
            <h3 class="text-xs font-bold uppercase text-slate-500 tracking-wider">Attached Official Resources (1)</h3>

            <div class="flex items-center justify-between p-4 bg-slate-50 border border-slate-200 rounded-2xl hover:bg-slate-100 transition-all">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-red-100 text-red-600 rounded-xl flex items-center justify-center font-black text-xs">
                        PDF
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-800">Software_Eng_Sem1_Exam_Timetable.pdf</p>
                        <p class="text-[10px] text-slate-500">2.4 MB • Verified Digital Stamp</p>
                    </div>
                </div>

                <a href="#" download class="px-4 py-2 bg-brand-500 hover:bg-brand-600 text-white font-bold text-xs rounded-xl shadow-sm transition-all">
                    Download File
                </a>
            </div>
        </div>

    </article>

</div>
@endsection