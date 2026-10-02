<div class="space-y-5">
    <!-- Filter Controls Bar -->
    <div class="flex flex-wrap items-center justify-between gap-3 bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
        <div class="flex items-center gap-2">
            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Category:</span>
            <select wire:model.live="categoryFilter" class="bg-slate-50 border border-slate-200 rounded-xl px-3 py-1.5 text-xs font-semibold text-slate-800 focus:outline-none focus:border-brand-500">
                <option value="all">All Categories</option>
                <option value="Academic">Academic</option>
                <option value="Emergency">Emergency</option>
                <option value="Events">Events</option>
                <option value="Careers">Careers</option>
            </select>
        </div>

        <div class="flex items-center gap-2">
            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Priority:</span>
            <select wire:model.live="priorityFilter" class="bg-slate-50 border border-slate-200 rounded-xl px-3 py-1.5 text-xs font-semibold text-slate-800 focus:outline-none focus:border-brand-500">
                <option value="all">All Priorities</option>
                <option value="Urgent">Urgent</option>
                <option value="High">High</option>
                <option value="Medium">Medium</option>
            </select>
        </div>
    </div>

    <!-- Notice List -->
    <div class="space-y-4">
        @forelse($notices as $notice)
            <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm hover:border-slate-300 transition-all space-y-4">
                <div class="flex items-start justify-between gap-4">
                    <div class="space-y-1.5">
                        <div class="flex flex-wrap items-center gap-2 text-xs">
                            <span class="px-2.5 py-0.5 bg-brand-50 text-brand-600 font-bold text-[10px] rounded-full uppercase tracking-wider">
                                {{ $notice['category'] }}
                            </span>
                            @if($notice['priority'] === 'Urgent')
                                <span class="px-2.5 py-0.5 bg-red-50 text-red-600 font-bold text-[10px] rounded-full uppercase tracking-wider">
                                    Urgent
                                </span>
                            @elseif($notice['priority'] === 'High')
                                <span class="px-2.5 py-0.5 bg-amber-50 text-amber-700 font-bold text-[10px] rounded-full uppercase tracking-wider">
                                    High Priority
                                </span>
                            @endif
                            <span class="text-slate-400 text-[11px]">• {{ $notice['created_at'] }}</span>
                        </div>

                        <a href="{{ route('student.notices.show', $notice['id']) }}" class="block text-base font-bold text-slate-900 hover:text-brand-600 transition-colors leading-snug">
                            {{ $notice['title'] }}
                        </a>
                    </div>

                    <button wire:click="toggleBookmark({{ $notice['id'] }})" class="p-2 text-slate-400 hover:text-brand-500 rounded-xl transition-colors shrink-0">
                        @if(in_array($notice['id'], $bookmarkedIds))
                            <svg class="w-5 h-5 text-brand-500" fill="currentColor" viewBox="0 0 24 24"><path d="M5 5c0-1.1.9-2 2-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>
                        @else
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5c0-1.1.9-2 2-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>
                        @endif
                    </button>
                </div>

                <p class="text-xs text-slate-600 leading-relaxed line-clamp-2">
                    {{ $notice['excerpt'] }}
                </p>

                <div class="flex items-center justify-between pt-3 border-t border-slate-100 text-xs">
                    <span class="text-slate-500 font-medium">By {{ $notice['author'] }} ({{ $notice['department'] }})</span>
                    
                    @if($notice['has_attachment'])
                        <span class="inline-flex items-center gap-1 font-bold text-brand-600 bg-brand-50 px-2.5 py-1 rounded-xl text-[11px]">
                            📎 Attachment Included
                        </span>
                    @endif
                </div>
            </div>
        @empty
            <div class="bg-white border border-slate-200 rounded-3xl p-12 text-center text-slate-500 space-y-2">
                <p class="font-bold text-sm text-slate-700">No notices matched your selected filters</p>
                <p class="text-xs">Try selecting 'All Categories' or 'All Priorities'.</p>
            </div>
        @endforelse
    </div>
</div>