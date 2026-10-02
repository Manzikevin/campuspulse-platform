@section('title', 'System Audit Logs')

<div class="space-y-6">
    <!-- Header & Search -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl font-black text-slate-900">Security & Action Audit Logs</h1>
            <p class="text-xs text-slate-500">Track key administrative actions, permission updates, and system events.</p>
        </div>

        <div class="w-full sm:w-64">
            <input wire:model.live.debounce.300ms="search" 
                   type="text" 
                   placeholder="Search audit trail..." 
                   class="w-full px-4 py-2 bg-white border border-slate-200 rounded-2xl text-xs font-medium focus:outline-none focus:border-red-500 shadow-sm">
        </div>
    </div>

    <!-- Audit Logs List -->
    <div class="bg-white border border-slate-200 rounded-3xl shadow-sm p-6 space-y-3">
        @forelse($logs as $log)
            <div class="p-4 bg-slate-50 border border-slate-100 rounded-2xl text-xs flex flex-col sm:flex-row sm:items-center justify-between gap-2 hover:bg-slate-100/60 transition-all">
                <div class="space-y-0.5">
                    <span class="font-bold text-slate-800">[{{ $log['code'] }}] {{ $log['action'] }}</span>
                    <p class="text-[11px] text-slate-500">{{ $log['description'] }}</p>
                </div>
                <span class="text-[10px] font-mono font-semibold text-slate-400 whitespace-nowrap">{{ $log['timestamp'] }}</span>
            </div>
        @empty
            <div class="py-8 text-center text-xs text-slate-400">
                No audit log entries found matching your search.
            </div>
        @endforelse
    </div>
</div>