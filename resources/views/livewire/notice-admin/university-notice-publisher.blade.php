<div class="space-y-5">
    @if (session()->has('status'))
        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold rounded-2xl">
            {{ session('status') }}
        </div>
    @endif

    <!-- Search and Filters Header Bar -->
    <div class="bg-white border border-slate-200 rounded-3xl p-5 shadow-sm space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
            <!-- Keyword Search -->
            <div class="md:col-span-6 relative">
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search notices by title..."
                    class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 focus:bg-white focus:outline-none focus:border-amber-500 transition-all">
                <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>

            <!-- Status Filter -->
            <div class="md:col-span-3">
                <select wire:model.live="statusFilter" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-semibold text-slate-800 focus:outline-none focus:border-amber-500">
                    <option value="all">All Statuses</option>
                    <option value="Published">Published</option>
                    <option value="Draft">Draft</option>
                    <option value="Archived">Archived</option>
                </select>
            </div>

            <!-- Category Filter -->
            <div class="md:col-span-3">
                <select wire:model.live="categoryFilter" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-semibold text-slate-800 focus:outline-none focus:border-amber-500">
                    <option value="all">All Categories</option>
                    <option value="Academic">Academic</option>
                    <option value="Emergency">Emergency</option>
                    <option value="Events">Events</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Notices Table -->
    <div class="bg-white border border-slate-200 rounded-3xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 text-slate-500 font-bold uppercase text-[10px] tracking-wider border-b border-slate-100">
                    <tr>
                        <th class="p-4">Title & Scope</th>
                        <th class="p-4">Category</th>
                        <th class="p-4">Priority</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Reads</th>
                        <th class="p-4">Date</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($notices as $notice)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="p-4">
                                <a href="{{ route('notice-admin.notices.show', $notice['id']) }}" class="font-bold text-slate-900 hover:text-amber-600 transition-colors block">
                                    {{ $notice['title'] }}
                                </a>
                                <span class="text-[10px] text-slate-400 font-medium">Scope: {{ $notice['scope'] }}</span>
                            </td>
                            <td class="p-4">
                                <span class="px-2.5 py-0.5 bg-slate-100 font-bold text-slate-700 rounded-lg text-[10px] uppercase">
                                    {{ $notice['category'] }}
                                </span>
                            </td>
                            <td class="p-4">
                                @if($notice['priority'] === 'Urgent')
                                    <span class="px-2.5 py-0.5 bg-red-50 text-red-600 font-bold text-[10px] rounded-full uppercase">Urgent</span>
                                @elseif($notice['priority'] === 'High')
                                    <span class="px-2.5 py-0.5 bg-amber-50 text-amber-700 font-bold text-[10px] rounded-full uppercase">High</span>
                                @else
                                    <span class="px-2.5 py-0.5 bg-slate-100 text-slate-600 font-bold text-[10px] rounded-full uppercase">Normal</span>
                                @endif
                            </td>
                            <td class="p-4">
                                @if($notice['status'] === 'Published')
                                    <span class="inline-flex items-center gap-1 font-bold text-emerald-600 text-[11px]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Published
                                    </span>
                                @elseif($notice['status'] === 'Draft')
                                    <span class="inline-flex items-center gap-1 font-bold text-slate-500 text-[11px]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Draft
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 font-bold text-amber-600 text-[11px]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Archived
                                    </span>
                                @endif
                            </td>
                            <td class="p-4 font-mono font-bold text-slate-700">{{ number_format($notice['reads']) }}</td>
                            <td class="p-4 font-mono text-[11px] text-slate-400">{{ $notice['published_at'] }}</td>
                            <td class="p-4 text-right space-x-2">
                                <a href="{{ route('notice-admin.notices.show', $notice['id']) }}" class="px-2.5 py-1 bg-amber-50 text-amber-700 font-bold rounded-lg hover:bg-amber-100 transition-colors">
                                    View
                                </a>
                                <button wire:click="deleteNotice({{ $notice['id'] }})" wire:confirm="Are you sure you want to delete this notice?" class="px-2.5 py-1 bg-red-50 text-red-600 font-bold rounded-lg hover:bg-red-100 transition-colors">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-8 text-center text-slate-400 text-xs">No notices found matching your query.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>