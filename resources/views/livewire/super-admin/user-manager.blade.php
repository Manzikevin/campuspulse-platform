<div class="space-y-6">
    <!-- Action Banner & Search -->
    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 bg-white p-5 rounded-3xl border border-slate-200 shadow-sm">
        <div class="flex items-center gap-3 w-full sm:w-auto">
            <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search name or email..." 
                   class="px-4 py-2 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium focus:outline-none focus:border-red-500 w-full sm:w-64">
            
            <select wire:model.live="roleFilter" class="px-3 py-2 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-semibold text-slate-700">
                <option value="all">All Roles</option>
                <option value="dean">Dean</option>
                <option value="hod">HOD</option>
                <option value="student">Student</option>
            </select>
        </div>

        <button wire:click="editUser(0)" class="w-full sm:w-auto px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white font-bold text-xs rounded-2xl transition-all shadow-md shadow-red-600/20">
            + Create New User
        </button>
    </div>

    <!-- User Table -->
    <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-[10px] font-bold uppercase text-slate-400 tracking-wider">
                    <th class="py-3.5 px-6">User Account</th>
                    <th class="py-3.5 px-6">System Role</th>
                    <th class="py-3.5 px-6">Affiliation</th>
                    <th class="py-3.5 px-6">Status</th>
                    <th class="py-3.5 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-xs font-medium text-slate-700">
                @forelse($users as $user)
                    <tr class="hover:bg-slate-50/50">
                        <td class="py-4 px-6">
                            <div class="font-bold text-slate-900">{{ $user['name'] }}</div>
                            <div class="text-[11px] text-slate-400">{{ $user['email'] }}</div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="px-2.5 py-1 bg-red-50 text-red-700 font-bold text-[10px] rounded-full uppercase">
                                {{ $user['role'] }}
                            </span>
                        </td>
                        <td class="py-4 px-6">{{ $user['department'] }}</td>
                        <td class="py-4 px-6">
                            @if($user['status'] === 'active')
                                <span class="px-2.5 py-1 bg-emerald-100 text-emerald-800 text-[10px] font-bold rounded-full">Active</span>
                            @else
                                <span class="px-2.5 py-1 bg-amber-100 text-amber-800 text-[10px] font-bold rounded-full">Suspended</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-right space-x-2">
                            <button wire:click="editUser({{ $user['id'] }})" class="text-xs font-bold text-slate-600 hover:text-slate-900">Edit</button>
                            <button wire:click="toggleStatus({{ $user['id'] }})" class="text-xs font-bold text-amber-600 hover:text-amber-800">
                                {{ $user['status'] === 'active' ? 'Suspend' : 'Activate' }}
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-8 text-center text-slate-400">No users match your criteria.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Edit/Create User Modal -->
    @if($showModal)
        <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm flex items-center justify-center p-4 z-50">
            <div class="bg-white rounded-3xl p-6 max-w-md w-full shadow-2xl space-y-4">
                <h2 class="text-base font-bold text-slate-900">
                    {{ $editingUserId ? 'Edit User Account' : 'Create New User' }}
                </h2>

                <div class="space-y-3">
                    <div>
                        <label class="block text-[11px] font-bold text-slate-500 uppercase">Full Name</label>
                        <input wire:model="name" type="text" class="w-full px-3 py-2 bg-slate-50 border rounded-xl text-xs font-medium">
                        @error('name') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-slate-500 uppercase">Email Address</label>
                        <input wire:model="email" type="email" class="w-full px-3 py-2 bg-slate-50 border rounded-xl text-xs font-medium">
                        @error('email') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-slate-500 uppercase">Role</label>
                        <select wire:model="role" class="w-full px-3 py-2 bg-slate-50 border rounded-xl text-xs font-semibold">
                            <option value="super_admin">Super Administrator</option>
                            <option value="dean">Faculty Dean</option>
                            <option value="hod">Head of Department</option>
                            <option value="dept_staff">Department Staff</option>
                            <option value="student">Student</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end gap-2 pt-3">
                    <button wire:click="$set('showModal', false)" type="button" class="px-4 py-2 bg-slate-100 text-slate-700 text-xs font-bold rounded-xl">Cancel</button>
                    <button wire:click="saveUser" type="button" class="px-4 py-2 bg-red-600 text-white text-xs font-bold rounded-xl">Save User</button>
                </div>
            </div>
        </div>
    @endif
</div>