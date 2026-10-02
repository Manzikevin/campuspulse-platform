<div class="bg-white border border-slate-200 rounded-3xl p-6 sm:p-8 shadow-sm space-y-6">
    <div>
        <h1 class="text-2xl font-black text-slate-900 tracking-tight">
            {{ $isEditing ? 'Edit Department Announcement' : 'Create Department Announcement' }}
        </h1>
        <p class="text-xs text-slate-500 mt-1">Draft a new announcement for department students or submit for HOD/Dean review.</p>
    </div>

    @if (session()->has('status'))
        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold rounded-2xl">
            {{ session('status') }}
        </div>
    @endif

    <form class="space-y-6">
        <!-- Notice Title -->
        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Notice Title *</label>
            <input wire:model="title" type="text" placeholder="e.g., Computer Science Lab Exam Rescheduling" 
                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 focus:bg-white focus:outline-none focus:border-emerald-500 transition-all">
            @error('title') <span class="text-red-500 text-[11px] font-bold mt-1 block">{{ $message }}</span> @enderror
        </div>

        <!-- Target Audience & Priority Row -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Target Audience *</label>
                <select wire:model="targetGroup" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-semibold text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500">
                    <option value="all_dept">All Department Students</option>
                    <option value="year_1">Year 1 Students</option>
                    <option value="year_2">Year 2 Students</option>
                    <option value="year_3">Year 3 Students</option>
                    <option value="year_4">Year 4 Students</option>
                </select>
                @error('targetGroup') <span class="text-red-500 text-[11px] font-bold mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Priority Level *</label>
                <select wire:model="priority" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-semibold text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500">
                    <option value="normal">Normal</option>
                    <option value="high">High Priority</option>
                    <option value="urgent">Urgent Announcement</option>
                </select>
            </div>
        </div>

        <!-- Notice Content -->
        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Body Content *</label>
            <textarea wire:model="content" rows="6" placeholder="Provide full details regarding class location, timings, or requirements..."
                      class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 focus:bg-white focus:outline-none focus:border-emerald-500 transition-all"></textarea>
            @error('content') <span class="text-red-500 text-[11px] font-bold mt-1 block">{{ $message }}</span> @enderror
        </div>

        <!-- File Attachment -->
        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Attach Document / Timetable (PDF/DOCX)</label>
            <input wire:model="attachment" type="file" class="block w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
            @error('attachment') <span class="text-red-500 text-[11px] font-bold mt-1 block">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Action Group -->
        <div class="pt-4 flex flex-col sm:flex-row justify-end gap-3">
            <button wire:click.prevent="saveDraft" type="button" class="py-3 px-6 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs uppercase tracking-wider rounded-2xl transition-all">
                Save as Draft
            </button>
            <button wire:click.prevent="submitForApproval" type="button" class="py-3 px-6 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs uppercase tracking-wider rounded-2xl shadow-lg shadow-emerald-600/20 transition-all">
                Submit for Approval
            </button>
        </div>
    </form>
</div>