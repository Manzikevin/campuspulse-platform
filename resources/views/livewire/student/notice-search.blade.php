<div class="space-y-6">
    <!-- Search Inputs Bar -->
    <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
            
            <!-- Search Keyword Input -->
            <div class="md:col-span-6 relative">
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search notices by title, course, or department..."
                    class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
                <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>

            <!-- Scope Dropdown -->
            <div class="md:col-span-3">
                <select wire:model.live="scope" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-semibold text-slate-800 focus:outline-none focus:border-brand-500">
                    <option value="all">All Scope Levels</option>
                    <option value="global">University-Wide</option>
                    <option value="faculty">Faculty Scope</option>
                    <option value="department">Department Scope</option>
                </select>
            </div>

            <!-- Sort Dropdown -->
            <div class="md:col-span-3">
                <select wire:model.live="sort" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-semibold text-slate-800 focus:outline-none focus:border-brand-500">
                    <option value="latest">Newest First</option>
                    <option value="oldest">Oldest First</option>
                </select>
            </div>
        </div>

        @if(!empty($search) || $scope !== 'all')
            <div class="flex items-center justify-between pt-2 text-xs">
                <span class="text-slate-500 font-medium">Showing filtered archive results</span>
                <button wire:click="resetFilters" class="text-brand-600 hover:underline font-bold">Reset Filters</button>
            </div>
        @endif
    </div>

    <!-- Results Table/List -->
    <div class="bg-white border border-slate-200 rounded-3xl overflow-hidden shadow-sm">
        <div class="p-4 border-b border-slate-100 bg-slate-50 text-xs font-bold text-slate-500 uppercase tracking-wider flex justify-between">
            <span>Announcement Archive</span>
            <span>Count: {{ count($results) }}</span>
        </div>

        <div class="divide-y divide-slate-100">
            @forelse($results as $item)
                <div class="p-5 hover:bg-slate-50/80 transition-colors flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="space-y-1">
                        <div class="flex items-center gap-2 text-[11px]">
                            <span class="px-2 py-0.5 bg-slate-100 font-bold text-slate-700 rounded-lg uppercase">
                                {{ $item['category'] }}
                            </span>
                            <span class="text-slate-400">• {{ $item['department'] }}</span>
                        </div>
                        <a href="{{ route('student.notices.show', $item['id']) }}" class="text-sm font-bold text-slate-900 hover:text-brand-600 transition-colors block">
                            {{ $item['title'] }}
                        </a>
                    </div>

                    <div class="flex items-center gap-4 shrink-0 text-xs">
                        <span class="text-slate-400 font-mono text-[11px]">{{ $item['formatted_date'] }}</span>
                        <a href="{{ route('student.notices.show', $item['id']) }}" class="px-3 py-1.5 bg-brand-50 text-brand-600 font-bold rounded-xl hover:bg-brand-100 transition-colors">
                            View Notice
                        </a>
                    </div>
                </div>
            @empty
                <div class="p-12 text-center text-slate-500 text-xs">
                    No announcements found matching your search query.
                </div>
            @endforelse
        </div>
    </div>
</div>