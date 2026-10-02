<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
    
    <!-- Document Upload Card (4 Cols) -->
    <div class="lg:col-span-4 bg-white border border-slate-200 rounded-3xl p-6 shadow-sm space-y-5">
        <h2 class="text-base font-extrabold text-slate-900 tracking-tight">Upload New Attachment</h2>

        @if (session()->has('status'))
            <div class="p-3 bg-emerald-50 text-emerald-800 text-xs font-bold rounded-xl">
                {{ session('status') }}
            </div>
        @endif

        <form wire:submit="uploadResource" class="space-y-4">
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Document Title *</label>
                <input wire:model="title" type="text" placeholder="e.g., CS201 Lab Manual 2026"
                       class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 focus:bg-white focus:outline-none focus:border-emerald-500">
                @error('title') <span class="text-red-500 text-[11px] font-bold mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Audience Access Scope</label>
                <select wire:model="accessScope" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-semibold text-slate-800">
                    <option value="Public to CS Students">Public to Department Students</option>
                    <option value="Year 4 Only">Year 4 Students Only</option>
                    <option value="Faculty Staff Only">Faculty Staff Only</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Select File (PDF, DOC, DOCX) *</label>
                <input wire:model="document" type="file" class="block w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                @error('document') <span class="text-red-500 text-[11px] font-bold mt-1 block">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="w-full py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs uppercase tracking-wider rounded-2xl shadow-lg shadow-emerald-600/20 transition-all">
                Upload Document
            </button>
        </form>
    </div>

    <!-- Active Academic Files Grid (8 Cols) -->
    <div class="lg:col-span-8 space-y-4">
        <h2 class="text-base font-extrabold text-slate-900 tracking-tight">Department Academic Documents ({{ count($resources) }})</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($resources as $item)
                <div class="bg-white border border-slate-200 rounded-3xl p-5 shadow-sm space-y-3 relative">
                    <div class="flex items-center justify-between">
                        <span class="w-9 h-9 bg-emerald-50 text-emerald-700 font-black text-xs rounded-xl flex items-center justify-center">
                            {{ $item['type'] }}
                        </span>
                        <span class="text-[10px] font-mono text-slate-400">{{ $item['size'] }}</span>
                    </div>

                    <h3 class="text-xs font-bold text-slate-900 leading-snug">{{ $item['title'] }}</h3>

                    <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                        <span class="text-[10px] font-bold text-slate-500 uppercase">{{ $item['scope'] }}</span>
                        <button wire:click="deleteResource({{ $item['id'] }})" class="text-red-500 hover:text-red-700 font-bold text-[11px]">
                            Delete
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>