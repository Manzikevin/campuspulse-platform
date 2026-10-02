@extends('layouts.department-staff')

@section('title', 'Approval Workflow Queue')

@section('content')
<div class="space-y-6">

    <div>
        <h1 class="text-2xl font-black text-slate-900 tracking-tight">Multi-Tier Approval Queue</h1>
        <p class="text-xs text-slate-500 mt-1">Track approval status across Department Head (Tier 1) and Faculty Dean (Tier 2) levels.</p>
    </div>

    <!-- Approval Progress Cards List -->
    <div class="space-y-4">
        
        <!-- Queue Item 1 -->
        <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm space-y-4">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-slate-100 pb-4">
                <div>
                    <h2 class="text-base font-bold text-slate-900">Special Supplementary Exam Timetable Release</h2>
                    <p class="text-[11px] text-slate-400">Submitted by Tech Staff on Oct 01, 2026</p>
                </div>
                <span class="px-3 py-1 bg-amber-50 text-amber-700 font-bold text-[10px] rounded-full uppercase tracking-wider self-start sm:self-auto">
                    Tier 2 Pending
                </span>
            </div>

            <!-- Workflow Progress Bar -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                <div class="p-3 bg-emerald-50/60 border border-emerald-200/80 rounded-2xl text-xs space-y-1">
                    <span class="text-[10px] uppercase font-bold text-emerald-800 block">Tier 1: HOD Review</span>
                    <span class="font-bold text-emerald-900 flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Approved by Prof. Adams
                    </span>
                </div>

                <div class="p-3 bg-amber-50/60 border border-amber-200/80 rounded-2xl text-xs space-y-1">
                    <span class="text-[10px] uppercase font-bold text-amber-800 block">Tier 2: Dean Review</span>
                    <span class="font-bold text-amber-900 flex items-center gap-1">
                        <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                        Awaiting Dean Signature
                    </span>
                </div>

                <div class="p-3 bg-slate-50 border border-slate-200/80 rounded-2xl text-xs space-y-1">
                    <span class="text-[10px] uppercase font-bold text-slate-400 block">Tier 3: Final Broadcast</span>
                    <span class="font-bold text-slate-500">Scheduled automatically</span>
                </div>
            </div>
        </div>

        <!-- Queue Item 2 -->
        <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm space-y-4">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-slate-100 pb-4">
                <div>
                    <h2 class="text-base font-bold text-slate-900">CS Department Field Trip Security Protocols</h2>
                    <p class="text-[11px] text-slate-400">Submitted by Staff on Sep 30, 2026</p>
                </div>
                <span class="px-3 py-1 bg-sky-50 text-sky-700 font-bold text-[10px] rounded-full uppercase tracking-wider self-start sm:self-auto">
                    Tier 1 Pending
                </span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                <div class="p-3 bg-amber-50/60 border border-amber-200/80 rounded-2xl text-xs space-y-1">
                    <span class="text-[10px] uppercase font-bold text-amber-800 block">Tier 1: HOD Review</span>
                    <span class="font-bold text-amber-900 flex items-center gap-1">
                        <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                        In Review Queue
                    </span>
                </div>

                <div class="p-3 bg-slate-50 border border-slate-200/80 rounded-2xl text-xs space-y-1 opacity-60">
                    <span class="text-[10px] uppercase font-bold text-slate-400 block">Tier 2: Dean Review</span>
                    <span class="font-bold text-slate-500">Locked</span>
                </div>

                <div class="p-3 bg-slate-50 border border-slate-200/80 rounded-2xl text-xs space-y-1 opacity-60">
                    <span class="text-[10px] uppercase font-bold text-slate-400 block">Tier 3: Final Broadcast</span>
                    <span class="font-bold text-slate-500">Locked</span>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection