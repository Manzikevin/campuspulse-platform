<div class="relative" x-data>
    <!-- Bell Trigger Button -->
    <button wire:click="toggleDropdown" class="p-2 text-slate-600 hover:text-slate-900 bg-white border border-slate-200 rounded-xl transition-all relative">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
        
        @if($unreadCount > 0)
            <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 text-white font-bold text-[10px] rounded-full flex items-center justify-center animate-pulse">
                {{ $unreadCount }}
            </span>
        @endif
    </button>

    <!-- Dropdown Panel -->
    @if($isOpen)
        <div class="absolute right-0 mt-2 w-80 bg-white rounded-2xl shadow-xl border border-slate-200 py-3 z-50 space-y-2">
            <div class="px-4 pb-2 border-b border-slate-100 flex items-center justify-between">
                <span class="text-xs font-bold text-slate-900">Notifications</span>
                @if($unreadCount > 0)
                    <button wire:click="markAllAsRead" class="text-[11px] font-semibold text-brand-600 hover:underline">Mark all read</button>
                @endif
            </div>

            <div class="divide-y divide-slate-100 max-h-72 overflow-y-auto">
                @forelse($notifications as $n)
                    <div class="p-3.5 hover:bg-slate-50 transition-colors {{ !$n['read'] ? 'bg-brand-50/30' : '' }}">
                        <div class="flex items-center justify-between text-[10px] font-bold text-slate-400">
                            <span>{{ $n['title'] }}</span>
                            <span>{{ $n['created_at'] }}</span>
                        </div>
                        <p class="text-xs text-slate-700 font-medium mt-1 leading-snug">{{ $n['message'] }}</p>
                    </div>
                @empty
                    <div class="p-4 text-center text-xs text-slate-400">No new notifications</div>
                @endforelse
            </div>
        </div>
    @endif
</div>