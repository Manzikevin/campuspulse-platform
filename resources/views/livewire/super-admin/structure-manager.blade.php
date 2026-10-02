@section('title', $this->pageTitle)

<div class="space-y-6">
    <!-- Header Title & Sub-navigation Tabs -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 border-b border-slate-200 pb-4">
        <div>
            <h1 class="text-xl font-black text-slate-900">{{ $this->pageTitle }}</h1>
            <p class="text-xs text-slate-500">Configure academic hierarchy, faculties, departments, and degree programs.</p>
        </div>

        <div class="flex items-center gap-2">
            <button wire:click="setTab('faculties')" 
                    class="px-4 py-2 rounded-2xl text-xs font-bold transition-all {{ $activeTab === 'faculties' ? 'bg-red-600 text-white shadow-md shadow-red-600/20' : 'bg-white border text-slate-600 hover:bg-slate-50' }}">
                Faculties
            </button>
            <button wire:click="setTab('departments')" 
                    class="px-4 py-2 rounded-2xl text-xs font-bold transition-all {{ $activeTab === 'departments' ? 'bg-red-600 text-white shadow-md shadow-red-600/20' : 'bg-white border text-slate-600 hover:bg-slate-50' }}">
                Departments
            </button>
            <button wire:click="setTab('programs')" 
                    class="px-4 py-2 rounded-2xl text-xs font-bold transition-all {{ $activeTab === 'programs' ? 'bg-red-600 text-white shadow-md shadow-red-600/20' : 'bg-white border text-slate-600 hover:bg-slate-50' }}">
                Academic Programs
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        <!-- Structural Node Creation Form (4 Cols) -->
        <div class="lg:col-span-4 bg-white border border-slate-200 rounded-3xl p-6 shadow-sm space-y-4">
            <h2 class="text-xs font-extrabold text-slate-900 uppercase tracking-wider">
                Add {{ ucfirst(rtrim($activeTab, 's')) }}
            </h2>

            <form wire:submit.prevent="createStructureItem" class="space-y-3">
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 uppercase mb-1">Title / Name *</label>
                    <input wire:model="name" type="text" placeholder="e.g. Faculty of Arts" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium focus:outline-none focus:border-red-500">
                    @error('name') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-slate-500 uppercase mb-1">Short Code *</label>
                    <input wire:model="code" type="text" placeholder="e.g. FOA" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium focus:outline-none focus:border-red-500">
                    @error('code') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                </div>

                @if($activeTab === 'departments')
                    <div>
                        <label class="block text-[11px] font-bold text-slate-500 uppercase mb-1">Parent Faculty</label>
                        <select wire:model="parentId" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:border-red-500">
                            <option value="">-- Select Faculty --</option>
                            @foreach($faculties as $f)
                                <option value="{{ $f['id'] }}">{{ $f['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                @elseif($activeTab === 'programs')
                    <div>
                        <label class="block text-[11px] font-bold text-slate-500 uppercase mb-1">Parent Department</label>
                        <select wire:model="parentId" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:border-red-500">
                            <option value="">-- Select Department --</option>
                            @foreach($departments as $d)
                                <option value="{{ $d['id'] }}">{{ $d['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <button type="submit" class="w-full py-2.5 bg-red-600 hover:bg-red-700 text-white font-bold text-xs rounded-xl shadow-md transition-all">
                    Create Node
                </button>
            </form>
        </div>

        <!-- Structural Node Table/List (8 Cols) -->
        <div class="lg:col-span-8 bg-white border border-slate-200 rounded-3xl p-6 shadow-sm space-y-4">
            <h2 class="text-base font-bold text-slate-900">Current Academic Hierarchy</h2>

            @if($activeTab === 'faculties')
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($faculties as $fac)
                        <div class="p-5 bg-slate-50 border border-slate-200 rounded-3xl space-y-2">
                            <span class="text-[10px] font-bold text-red-600 uppercase tracking-wider">{{ $fac['code'] }}</span>
                            <h3 class="font-bold text-slate-900 text-sm">{{ $fac['name'] }}</h3>
                            <p class="text-xs text-slate-500">{{ $fac['dept_count'] }} Departments Registered</p>
                        </div>
                    @endforeach
                </div>
            @elseif($activeTab === 'departments')
                <div class="space-y-2">
                    @foreach($departments as $dept)
                        <div class="p-3.5 bg-slate-50 border border-slate-200 rounded-2xl flex items-center justify-between text-xs">
                            <div>
                                <span class="font-bold text-slate-900">{{ $dept['name'] }}</span>
                                <span class="text-[10px] text-slate-400 block">Code: {{ $dept['code'] }}</span>
                            </div>
                            <span class="px-3 py-1 bg-white border border-slate-200 text-slate-700 font-bold text-[10px] rounded-full">
                                HOD: {{ $dept['hod'] }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="space-y-2">
                    @foreach($programs as $prog)
                        <div class="p-3.5 bg-slate-50 border border-slate-200 rounded-2xl flex items-center justify-between text-xs">
                            <div>
                                <span class="font-bold text-slate-900">{{ $prog['title'] }}</span>
                                <span class="text-[10px] text-slate-400 block">Duration: {{ $prog['duration'] }}</span>
                            </div>
                            <span class="px-2.5 py-1 bg-emerald-100 text-emerald-800 text-[10px] font-bold rounded-full">
                                {{ $prog['code'] }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>