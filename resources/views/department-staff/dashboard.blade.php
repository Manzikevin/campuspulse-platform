@extends('layouts.department-staff')

@section('title', 'Department Dashboard')

@section('content')
<div class="space-y-8">
    
    <!-- Welcome Header Banner -->
    <div class="bg-gradient-to-r from-slate-900 via-emerald-950 to-slate-900 rounded-3xl p-6 sm:p-8 text-white relative overflow-hidden shadow-lg">
        <div class="relative z-10 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <span class="px-2.5 py-1 bg-emerald-500/20 border border-emerald-400/30 text-emerald-300 font-bold text-[11px] rounded-full uppercase tracking-wider">
                    Department Announcements & Workflow Overview
                </span>
                <h1 class="text-2xl sm:text-3xl font-black tracking-tight mt-2">
                    Computer Science Department
                </h1>
                <p class="text-slate-300 text-xs mt-1">
                    Manage course notices, submit items for multi-tier approval, and upload academic timetables.
                </p>
            </div>
            
            <a href="{{ route('dept-staff.notices.create') }}" class="px-5 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-2xl shadow-lg shadow-emerald-600/20 transition-all flex items-center gap-2 shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Draft Announcement
            </a>
        </div>
    </div>

    <!-- Quick Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="bg-white border border-slate-200 rounded-3xl p-5 shadow-sm space-y-2">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Active Dept Notices</p>
            <p class="text-2xl font-black text-slate-900">28</p>
            <span class="text-[11px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-md">Published & Live</span>
        </div>

        <div class="bg-white border border-slate-200 rounded-3xl p-5 shadow-sm space-y-2">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Pending Approvals</p>
            <p class="text-2xl font-black text-amber-600">3</p>
            <span class="text-[11px] font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-md">In Review Queue</span>
        </div>

        <div class="bg-white border border-slate-200 rounded-3xl p-5 shadow-sm space-y-2">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Academic Resources</p>
            <p class="text-2xl font-black text-slate-900">45</p>
            <span class="text-[11px] font-medium text-slate-500">Timetables & Course Outlines</span>
        </div>

        <div class="bg-white border border-slate-200 rounded-3xl p-5 shadow-sm space-y-2">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Draft Notices</p>
            <p class="text-2xl font-black text-slate-700">4</p>
            <span class="text-[11px] font-medium text-slate-500">Unsubmitted Work</span>
        </div>
    </div>

    <!-- Department Announcements Overview -->
    <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm space-y-4">
        <div class="flex items-center justify-between">
            <h2 class="text-base font-extrabold text-slate-900 tracking-tight">Recent Department Announcements</h2>
            <a href="{{ route('dept-staff.notices.index') }}" class="text-xs font-bold text-emerald-600 hover:text-emerald-700">View All</a>
        </div>

        <div class="divide-y divide-slate-100">
            <div class="py-3 flex items-center justify-between gap-4">
                <div>
                    <h3 class="text-xs font-bold text-slate-800">CS302 Systems Programming Lab Schedule Change</h3>
                    <p class="text-[11px] text-slate-400">Published • Target: Year 3 Computer Science</p>
                </div>
                <span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 font-bold text-[10px] rounded-full">Approved</span>
            </div>

            <div class="py-3 flex items-center justify-between gap-4">
                <div>
                    <h3 class="text-xs font-bold text-slate-800">Special Supplementary Exam Timetable Release</h3>
                    <p class="text-[11px] text-slate-400">Submitted • Under Dean Review</p>
                </div>
                <span class="px-2.5 py-1 bg-amber-50 text-amber-700 font-bold text-[10px] rounded-full">Pending Tier 2</span>
            </div>

            <div class="py-3 flex items-center justify-between gap-4">
                <div>
                    <h3 class="text-xs font-bold text-slate-800">Department Industrial Visit Registration Form</h3>
                    <p class="text-[11px] text-slate-400">Draft • Created Oct 1, 2026</p>
                </div>
                <span class="px-2.5 py-1 bg-slate-100 text-slate-600 font-bold text-[10px] rounded-full">Draft</span>
            </div>
        </div>
    </div>

</div>
@endsection