@extends('layouts.department-staff')

@section('title', 'Edit Notice Draft')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <a href="{{ route('dept-staff.notices.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-slate-800 transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back to Notices
        </a>
        <span class="px-3 py-1 bg-amber-50 text-amber-700 font-bold text-[10px] rounded-full uppercase">
            Status: Pending Approval
        </span>
    </div>

    <div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-sm space-y-6">
        <div>
            <h1 class="text-2xl font-black text-slate-900 tracking-tight">Edit Department Notice</h1>
            <p class="text-xs text-slate-500 mt-1">Update notice details or modify content prior to final approval.</p>
        </div>

        <form method="POST" action="{{ route('dept-staff.notices.index') }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Notice Title</label>
                <input id="title" type="text" name="title" value="Special Supplementary Exam Timetable Release" required 
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 focus:bg-white focus:outline-none focus:border-emerald-500 transition-all">
            </div>

            <div>
                <label for="content" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Body Content</label>
                <textarea id="content" name="content" rows="6" required 
                          class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 focus:bg-white focus:outline-none focus:border-emerald-500 transition-all">Please see attached timetable for special supplementary examinations scheduled for next week. Ensure all fee balances are cleared beforehand.</textarea>
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <a href="{{ route('dept-staff.notices.index') }}" class="py-3 px-6 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs uppercase tracking-wider rounded-2xl transition-all">
                    Cancel
                </a>
                <button type="submit" class="py-3 px-6 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs uppercase tracking-wider rounded-2xl shadow-lg shadow-emerald-600/20 transition-all">
                    Update Changes
                </button>
            </div>
        </form>
    </div>

</div>
@endsection