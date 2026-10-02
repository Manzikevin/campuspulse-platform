@extends('layouts.department-staff')

@section('title', 'Academic Resources & Timetables')

@section('content')
<div class="space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black text-slate-900 tracking-tight">Academic Documents & Timetables</h1>
            <p class="text-xs text-slate-500 mt-1">Upload and organize department course outlines, lab manuals, and timetables.</p>
        </div>

        <button class="px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-2xl shadow-sm transition-all inline-flex items-center gap-1.5 self-start sm:self-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Upload New Document
        </button>
    </div>

    <!-- Document Resource Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        
        <div class="bg-white border border-slate-200 rounded-3xl p-5 shadow-sm space-y-4">
            <div class="w-10 h-10 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-700 font-bold">
                PDF
            </div>
            <div>
                <h3 class="text-xs font-bold text-slate-900">Semester 1 Master Class Timetable (2026/2027)</h3>
                <p class="text-[11px] text-slate-400 mt-1">Uploaded Oct 1, 2026 • 2.4 MB</p>
            </div>
            <div class="pt-2 border-t border-slate-100 flex items-center justify-between">
                <span class="text-[10px] font-bold text-slate-500 uppercase">Public to CS Students</span>
                <button class="text-xs font-bold text-emerald-600 hover:text-emerald-700">Download</button>
            </div>
        </div>

        <div class="bg-white border border-slate-200 rounded-3xl p-5 shadow-sm space-y-4">
            <div class="w-10 h-10 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-700 font-bold">
                DOC
            </div>
            <div>
                <h3 class="text-xs font-bold text-slate-900">CS401 Senior Project Proposal Template</h3>
                <p class="text-[11px] text-slate-400 mt-1">Uploaded Sep 20, 2026 • 1.1 MB</p>
            </div>
            <div class="pt-2 border-t border-slate-100 flex items-center justify-between">
                <span class="text-[10px] font-bold text-slate-500 uppercase">Year 4 Only</span>
                <button class="text-xs font-bold text-emerald-600 hover:text-emerald-700">Download</button>
            </div>
        </div>

        <div class="bg-white border border-slate-200 rounded-3xl p-5 shadow-sm space-y-4">
            <div class="w-10 h-10 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-700 font-bold">
                PDF
            </div>
            <div>
                <h3 class="text-xs font-bold text-slate-900">Network Security Lab Safety Guidelines</h3>
                <p class="text-[11px] text-slate-400 mt-1">Uploaded Sep 15, 2026 • 850 KB</p>
            </div>
            <div class="pt-2 border-t border-slate-100 flex items-center justify-between">
                <span class="text-[10px] font-bold text-slate-500 uppercase">General Access</span>
                <button class="text-xs font-bold text-emerald-600 hover:text-emerald-700">Download</button>
            </div>
        </div>

    </div>

</div>
@endsection