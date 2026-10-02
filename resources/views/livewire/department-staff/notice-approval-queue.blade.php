<div class="space-y-6">
    @if (session()->has('status'))
        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold rounded-2xl">
            {{ session('status') }}
        </div>
    @endif

    <!-- Workflow Stage Filter Header -->
    <div class="flex items-center justify-between bg-white border border-slate-200 rounded-3xl p-4 shadow-sm">
        <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Filter Workflow Stage:</span>
        <select wire:model.live="filterStage" class="bg-slate-50 border border-slate-200 rounded-xl px-3 py-1.5 text-xs font-semibold text-slate-800 focus:outline-none focus:border-emerald-500">
            <option value="all">All Queued Notices</option>
            <option value="tier_1">Tier 1: HOD Pending</option>
            <option value="tier_2">Tier 2: Dean Pending</option>
            <option value="published">Fully Approved & Live</option>
        </select>
    </div>

    <!-- Multi-Tier Queue Display -->
    <div class="space-y-4">
        @forelse($queueItems as $item)
            <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm space-y-4">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-slate-100 pb-4">
                    <div>
                        <h2 class="text-base font-bold text-slate-900">{{ $item['title'] }}</h2>
                        <p class="text-[11px] text-slate-400">Target: {{ $item['target'] }} • Submitted on {{ $item['submitted_at'] }}</p>
                    </div>

                    <div class="flex items-center gap-2 self-start sm:self-auto">
                        @if($item['current_stage'] === 'published')
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-700 font-bold text-[10px] rounded-full uppercase tracking-wider">Published</span>
                        @elseif($item['current_stage'] === 'tier_2')
                            <span class="px-3 py-1 bg-amber-50 text-amber-700 font-bold text-[10px] rounded-full uppercase tracking-wider">Tier 2: Dean Review</span>
                        @else
                            <span class="px-3 py-1 bg-sky-50 text-sky-700 font-bold text-[10px] rounded-full uppercase tracking-wider">Tier 1: HOD Review</span>
                        @endif

                        @if($item['current_stage'] !== 'published')
                            <button wire:click="cancelSubmission({{ $item['id'] }})" class="text-[11px] font-bold text-red-500 hover:text-red-700 px-2 py-1">
                                Withdraw Draft
                            </button>
                        @endif
                    </div>
                </div>

                <!-- Step Tracker Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                    
                    <!-- Tier 1 Stage -->
                    <div class="p-3 border rounded-2xl text-xs space-y-1 {{ $item['tier1_status'] === 'approved' ? 'bg-emerald-50/60 border-emerald-200' : 'bg-amber-50/60 border-amber-200' }}">
                        <span class="text-[10px] uppercase font-bold text-slate-500 block">Tier 1: Head of Dept</span>
                        <span class="font-bold flex items-center gap-1 {{ $item['tier1_status'] === 'approved' ? 'text-emerald-900' : 'text-amber-900' }}">
                            @if($item['tier1_status'] === 'approved')
                                <svg class="w-3.5 h-3.5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            @else
                                <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                            @endif
                            {{ $item['tier1_reviewer'] }}
                        </span>
                    </div>

                    <!-- Tier 2 Stage -->
                    <div class="p-3 border rounded-2xl text-xs space-y-1 {{ $item['tier2_status'] === 'approved' ? 'bg-emerald-50/60 border-emerald-200' : ($item['tier2_status'] === 'pending' ? 'bg-amber-50/60 border-amber-200' : 'bg-slate-50 border-slate-200 opacity-60') }}">
                        <span class="text-[10px] uppercase font-bold text-slate-500 block">Tier 2: Faculty Dean</span>
                        <span class="font-bold flex items-center gap-1 {{ $item['tier2_status'] === 'approved' ? 'text-emerald-900' : ($item['tier2_status'] === 'pending' ? 'text-amber-900' : 'text-slate-500') }}">
                            @if($item['tier2_status'] === 'approved')
                                <svg class="w-3.5 h-3.5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            @elseif($item['tier2_status'] === 'pending')
                                <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                            @endif
                            {{ $item['tier2_reviewer'] }}
                        </span>
                    </div>

                    <!-- Tier 3 Broadcast Stage -->
                    <div class="p-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs space-y-1 {{ $item['current_stage'] === 'published' ? 'bg-emerald-50/60 border-emerald-200' : 'opacity-60' }}">
                        <span class="text-[10px] uppercase font-bold text-slate-400 block">Tier 3: Broadcast</span>
                        <span class="font-bold text-slate-700">
                            {{ $item['current_stage'] === 'published' ? 'Live on Student Feeds' : 'Pending Approvals' }}
                        </span>
                    </div>

                </div>
            </div>
        @empty
            <div class="p-8 text-center bg-white border border-slate-200 rounded-3xl text-slate-400 text-xs">
                No notices in the queue for this stage.
            </div>
        @endforelse
    </div>
</div>