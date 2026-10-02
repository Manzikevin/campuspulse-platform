@extends('layouts.notice-admin')

@section('title', 'Create University Notice')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <a href="{{ route('notice-admin.notices.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-slate-800 transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back to All Notices
        </a>
    </div>

    <div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-sm space-y-6">
        <div>
            <h1 class="text-2xl font-black text-slate-900 tracking-tight">Publish University Notice</h1>
            <p class="text-xs text-slate-500 mt-1">Distribute an official announcement or emergency notice across all faculties.</p>
        </div>

        <form method="POST" action="{{ route('notice-admin.notices.index') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Notice Title -->
            <div>
                <label for="title" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Notice Title *</label>
                <input id="title" type="text" name="title" required placeholder="e.g., End of Semester Examination Timetable Announcement" 
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 focus:bg-white focus:outline-none focus:border-amber-500 transition-all">
            </div>

            <!-- Category & Priority Row -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="category_id" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Category Taxonomy *</label>
                    <select id="category_id" name="category_id" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-semibold text-slate-800 focus:bg-white focus:outline-none focus:border-amber-500">
                        <option value="">Select Category</option>
                        <option value="1">Academic</option>
                        <option value="2">Emergency</option>
                        <option value="3">Events</option>
                        <option value="4">Careers</option>
                    </select>
                </div>

                <div>
                    <label for="priority" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Priority Level *</label>
                    <select id="priority" name="priority" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-semibold text-slate-800 focus:bg-white focus:outline-none focus:border-amber-500">
                        <option value="normal">Normal Priority</option>
                        <option value="high">High Priority</option>
                        <option value="urgent">Urgent / Emergency Broadcast</option>
                    </select>
                </div>
            </div>

            <!-- Scope Target Selection -->
            <div>
                <label for="scope" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Audience Scope Target *</label>
                <select id="scope" name="scope" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-semibold text-slate-800 focus:bg-white focus:outline-none focus:border-amber-500">
                    <option value="global">University Wide (All Faculties & Students)</option>
                    <option value="faculty">Faculty Specific</option>
                    <option value="department">Department Specific</option>
                </select>
            </div>

            <!-- Body Description -->
            <div>
                <label for="content" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Notice Body Content *</label>
                <textarea id="content" name="content" rows="6" required placeholder="Write full details of the notice..."
                          class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 focus:bg-white focus:outline-none focus:border-amber-500 transition-all"></textarea>
            </div>

            <!-- File Attachment Uploader -->
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Attach Official Document (PDF/DOCX)</label>
                <input type="file" name="attachment" class="block w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
            </div>

            <!-- Submit Button -->
            <div class="pt-4 flex justify-end gap-3">
                <a href="{{ route('notice-admin.notices.index') }}" class="py-3 px-6 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs uppercase tracking-wider rounded-2xl transition-all">
                    Cancel
                </a>
                <button type="submit" class="py-3 px-6 bg-amber-500 hover:bg-amber-600 text-white font-bold text-xs uppercase tracking-wider rounded-2xl shadow-lg shadow-amber-500/20 transition-all">
                    Publish Broadcast
                </button>
            </div>
        </form>
    </div>

</div>
@endsection