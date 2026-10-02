@extends('layouts.notice-admin')

@section('title', $notice->title ?? 'Notice Overview')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Navigation & Action Controls -->
    <div class="flex items-center justify-between">
        <a href="{{ route('notice-admin.notices.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-slate-800 transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back to Management
        </a>

        <div class="flex items-center gap-2">
            <button class="px-3.5 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs rounded-2xl transition-all">
                Edit Notice
            </button>
            <button class="px-3.5 py-2 bg-red-50 hover:bg-red-100 text-red-600 font-bold text-xs rounded-2xl transition-all">
                Archive Notice
            </button>
        </div>
    </div>

    <!-- Notice Analytics Details Card -->
    <article class="bg-white border border-slate-200 rounded-3xl p-8 sm:p-10 shadow-sm space-y-8">
        
        <div class="space-y-4 border-b border-slate-100 pb-6">
            <div class="flex flex-wrap items-center gap-2 text-xs">
                <span class="px-3 py-1 bg-amber-50 text-amber-700 font-bold rounded-full uppercase tracking-wider text-[10px]">
                    Academic Taxonomy
                </span>
                <span class="px-3 py-1 bg-emerald-50 text-emerald-700 font-bold rounded-full uppercase tracking-wider text-[10px]">
                    Published
                </span>
                <span class="text-slate-400 text-[11px] ml-auto">
                    Published Oct 14, 2026
                </span>
            </div>

            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight leading-snug">
                Final Examination Timetable & Hall Allocation Released
            </h1>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 p-4 bg-slate-50 rounded-2xl text-center">
            <div>
                <span class="text-[10px] uppercase font-bold text-slate-400 block">Total Reads</span>
                <span class="text-lg font-black text-slate-900">1,420</span>
            </div>
            <div>
                <span class="text-[10px] uppercase font-bold text-slate-400 block">Bookmarks</span>
                <span class="text-lg font-black text-slate-900">312</span>
            </div>
            <div>
                <span class="text-[10px] uppercase font-bold text-slate-400 block">Downloads</span>
                <span class="text-lg font-black text-slate-900">540</span>
            </div>
            <div>
                <span class="text-[10px] uppercase font-bold text-slate-400 block">Target Reach</span>
                <span class="text-lg font-black text-emerald-600">94%</span>
            </div>
        </div>

        <div class="prose prose-slate max-w-none text-xs sm:text-sm text-slate-700 leading-relaxed space-y-4">
            <p>
                Please find attached the official end-of-semester examination timetable for the 2026/2027 academic year. Students are required to verify their enrolled course codes against hall allocations at least 48 hours prior to examination dates.
            </p>
        </div>

    </article>

</div>
@endsection