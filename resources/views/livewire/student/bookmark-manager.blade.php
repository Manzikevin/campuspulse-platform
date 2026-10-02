<div class="space-y-4">
    @forelse($bookmarks as $bookmark)
        <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="space-y-1.5">
                <div class="flex items-center gap-2 text-[11px]">
                    <span class="px-2.5 py-0.5 bg-brand-50 text-brand-600 font-bold rounded-full uppercase tracking-wider">
                        {{ $bookmark['category'] }}
                    </span>
                    <span class="text-slate-400">• {{ $bookmark['department'] }}</span>
                    <span class="text-slate-400">• Saved {{ $bookmark['saved_at'] }}</span>
                </div>

                <a href="{{ route('student.notices.show', $bookmark['notice_id']) }}" class="text-base font-bold text-slate-900 hover:text-brand-600 transition-colors block">
                    {{ $bookmark['title'] }}
                </a>

                @if($bookmark['attachment'])
                    <p class="text-xs text-slate-500 font-mono">📎 Attachment: {{ $bookmark['attachment'] }}</p>
                @endif
            </div>

            <div class="flex items-center gap-3 shrink-0">
                <a href="{{ route('student.notices.show', $bookmark['notice_id']) }}" class="px-4 py-2 bg-brand-50 text-brand-600 font-bold text-xs rounded-xl hover:bg-brand-100 transition-colors">
                    Read Notice
                </a>
                <button wire:click="removeBookmark({{ $bookmark['id'] }})" class="p-2 text-slate-400 hover:text-red-600 rounded-xl transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                </button>
            </div>
        </div>
    @empty
        <div class="bg-white border border-slate-200 rounded-3xl p-12 text-center text-slate-500 space-y-2">
            <p class="font-bold text-sm text-slate-800">No saved bookmarks yet</p>
            <p class="text-xs">Click the bookmark icon on any notice in your feed to save it for quick access here.</p>
        </div>
    @endforelse
</div>