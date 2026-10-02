<div class="space-y-6">
    <!-- Timeframe Selection -->
    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
        <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Metrics Window:</span>
        <select wire:model.live="timeframe"
            class="bg-slate-50 border border-slate-200 rounded-xl px-3 py-1.5 text-xs font-semibold text-slate-800">
            <option value="7_days">Last 7 Days</option>
            <option value="30_days">Last 30 Days</option>
            <option value="semester">This Semester</option>
        </select>
    </div>

    <!-- Analytics Breakdown Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Top Performing Announcements -->
        <div class="space-y-3">
            <h3 class="text-xs font-bold text-slate-900 uppercase tracking-wider">Top Performing Announcements</h3>
            <div class="space-y-2">
                @foreach($analytics['top_performing'] as $item)
                    <div
                        class="p-3.5 bg-slate-50 border border-slate-200/80 rounded-2xl flex items-center justify-between gap-3 text-xs">
                        <div>
                            <p class="font-bold text-slate-800 line-clamp-1">{{ $item['title'] }}</p>
                            <p class="text-[10px] text-slate-400 font-mono mt-0.5">{{ $item['reads'] }} Reads •
                                {{ $item['downloads'] }} Downloads</p>
                        </div>
                        <span class="px-2.5 py-1 bg-emerald-100 text-emerald-800 font-bold rounded-xl text-[11px] shrink-0">
                            {{ $item['reach'] }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Faculty Engagement Rates -->
        <div class="space-y-3">
            <h3 class="text-xs font-bold text-slate-900 uppercase tracking-wider">Faculty Audience Reach Rate</h3>
            <div class="space-y-3">
                @foreach($analytics['faculty_engagement'] as $faculty)
                    <div class="space-y-1 text-xs">
                        <div class="flex justify-between font-semibold">
                            <span class="text-slate-700">{{ $faculty['name'] }}</span>
                            <span class="font-bold text-amber-600">{{ $faculty['rate'] }}</span>
                        </div>
                        <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                            <div class="bg-amber-500 h-full rounded-full" style="width: {{ $faculty['rate'] }}"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>