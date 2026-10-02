<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
    
    <!-- Category Creation Form (4 Cols) -->
    <div class="lg:col-span-4 bg-white border border-slate-200 rounded-3xl p-6 shadow-sm space-y-5">
        <h2 class="text-base font-extrabold text-slate-900 tracking-tight">Add New Taxonomy</h2>

        @if (session()->has('status'))
            <div class="p-3 bg-emerald-50 text-emerald-800 text-xs font-bold rounded-xl">
                {{ session('status') }}
            </div>
        @endif

        <form wire:submit="createCategory" class="space-y-4">
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Category Name *</label>
                <input wire:model="name" type="text" placeholder="e.g., Bursary & Finance"
                       class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 focus:bg-white focus:outline-none focus:border-amber-500">
                @error('name') <span class="text-red-500 text-[11px] font-bold mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Description *</label>
                <textarea wire:model="description" rows="3" placeholder="Brief summary of what goes in this category..."
                          class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 focus:bg-white focus:outline-none focus:border-amber-500"></textarea>
                @error('description') <span class="text-red-500 text-[11px] font-bold mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Badge Accent Color</label>
                <select wire:model="color" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-semibold text-slate-800">
                    <option value="amber">Amber / Yellow</option>
                    <option value="sky">Sky Blue</option>
                    <option value="emerald">Emerald Green</option>
                    <option value="red">Red Alert</option>
                    <option value="purple">Purple</option>
                </select>
            </div>

            <button type="submit" class="w-full py-3 bg-amber-500 hover:bg-amber-600 text-white font-bold text-xs uppercase tracking-wider rounded-2xl shadow-lg shadow-amber-500/20 transition-all">
                Save Taxonomy
            </button>
        </form>
    </div>

    <!-- Existing Categories List (8 Cols) -->
    <div class="lg:col-span-8 space-y-4">
        <h2 class="text-base font-extrabold text-slate-900 tracking-tight">Configured Taxonomies ({{ count($categories) }})</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @foreach($categories as $category)
                <div class="bg-white border border-slate-200 rounded-3xl p-5 shadow-sm space-y-3 relative">
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-1 bg-amber-50 text-amber-700 font-bold text-[10px] rounded-full uppercase tracking-wider">
                            {{ $category['name'] }}
                        </span>
                        <span class="text-[10px] font-mono font-bold text-slate-400">{{ $category['count'] }} Notices</span>
                    </div>

                    <p class="text-xs text-slate-600 leading-relaxed font-medium">
                        {{ $category['description'] }}
                    </p>

                    <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                        <span class="text-[11px] font-mono text-slate-400">slug: /{{ $category['slug'] }}</span>
                        <button wire:click="deleteCategory({{ $category['id'] }})" class="text-red-500 hover:text-red-700 font-bold text-[11px]">
                            Delete
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>