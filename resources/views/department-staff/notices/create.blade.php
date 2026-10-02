@extends('layouts.department-staff')

@section('title', 'Create Notice Draft')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <a href="{{ route('dept-staff.notices.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-slate-800 transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back to Submissions
        </a>
    </div>

    <div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-sm space-y-6">
        <div>
            <h1 class="text-2xl font-black text-slate-900 tracking-tight">Create Department Announcement</h1>
            <p class="text-xs text-slate-500 mt-1">Draft a new announcement for department students or submit for Dean/HOD review.</p>
        </div>

        <form method="POST" action="{{ route('dept-staff.notices.index') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Notice Title -->
            <div>
                <label for="title" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Notice Title *</label>
                <input id="title" type="text" name="title" required placeholder="e.g., Computer Science Lab Exam Rescheduling" 
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 focus:bg-white focus:outline-none focus:border-emerald-500 transition-all">
            </div>

            <!-- Target Audience & Priority Row -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="target_group" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Target Audience *</label>
                    <select id="target_group" name="target_group" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-semibold text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500">
                        <option value="all_dept">All Department Students</option>
                        <option value="year_1">Year 1 Students</option>
                        <option value="year_2">Year 2 Students</option>
                        <option value="year_3">Year 3 Students</option>
                        <option value="year_4">Year 4 Students</option>
                    </select>
                </div>

                <div>
                    <label for="priority" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Priority Level *</label>
                    <select id="priority" name="priority" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-semibold text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500">
                        <option value="normal">Normal</option>
                        <option value="high">High Priority</option>
                        <option value="urgent">Urgent Announcement</option>
                    </select>
                </div>
            </div>

            <!-- Notice Content -->
            <div>
                <label for="content" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Body Content *</label>
                <textarea id="content" name="content" rows="6" required placeholder="Provide full details regarding class location, timings, or requirements..."
                          class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 focus:bg-white focus:outline-none focus:border-emerald-500 transition-all"></textarea>
            </div>

            <!-- File Attachment -->
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Attach Document / Timetable (PDF)</label>
                <input type="file" name="attachment" class="block w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
            </div>

            <!-- Submit Action Group -->
            <div class="pt-4 flex flex-col sm:flex-row justify-end gap-3">
                <button type="submit" name="action" value="save_draft" class="py-3 px-6 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs uppercase tracking-wider rounded-2xl transition-all">
                    Save as Draft
                </button>
                <button type="submit" name="action" value="submit_approval" class="py-3 px-6 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs uppercase tracking-wider rounded-2xl shadow-lg shadow-emerald-600/20 transition-all">
                    Submit for Approval
                </button>
            </div>
        </form>
    </div>

</div>
@endsection