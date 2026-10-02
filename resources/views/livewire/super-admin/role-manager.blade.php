<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
    <!-- Role Selector (4 Cols) -->
    <div class="lg:col-span-4 bg-white border border-slate-200 rounded-3xl p-6 shadow-sm space-y-3">
        <h2 class="text-sm font-extrabold text-slate-900 uppercase tracking-wider mb-2">System Roles</h2>

        <div class="space-y-1">
            @foreach($roles as $key => $name)
                <button wire:click="selectRole('{{ $key }}')" 
                        class="w-full text-left px-4 py-3 rounded-2xl text-xs font-bold transition-all flex items-center justify-between {{ $selectedRole === $key ? 'bg-red-600 text-white shadow-md shadow-red-600/20' : 'bg-slate-50 text-slate-700 hover:bg-slate-100' }}">
                    <span>{{ $name }}</span>
                    @if($selectedRole === $key)
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    @endif
                </button>
            @endforeach
        </div>
    </div>

    <!-- Permission Matrix (8 Cols) -->
    <div class="lg:col-span-8 bg-white border border-slate-200 rounded-3xl p-6 shadow-sm space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-base font-bold text-slate-900">Permissions Matrix</h2>
                <p class="text-xs text-slate-500">Configuring access for role: <span class="font-bold text-red-600">{{ $roles[$selectedRole] }}</span></p>
            </div>

            <button wire:click="savePermissions" class="px-5 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs rounded-2xl transition-all">
                Save Matrix
            </button>
        </div>

        <div class="divide-y divide-slate-100">
            @foreach($permissions as $permKey => $label)
                <div class="py-3 flex items-center justify-between">
                    <div>
                        <span class="block text-xs font-bold text-slate-800">{{ $label }}</span>
                        <span class="text-[10px] font-mono text-slate-400">{{ $permKey }}</span>
                    </div>

                    <input type="checkbox" 
                           wire:click="togglePermission('{{ $permKey }}')"
                           {{ in_array($permKey, $activePermissions) ? 'checked' : '' }}
                           class="w-4 h-4 text-red-600 rounded border-slate-300 focus:ring-red-500">
                </div>
            @endforeach
        </div>
    </div>
</div>