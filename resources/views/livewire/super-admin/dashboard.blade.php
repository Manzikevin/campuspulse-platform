@section('title', 'System Dashboard')

<div class="space-y-6">
    <!-- Stat Cards Header -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white p-5 rounded-3xl border border-slate-200 shadow-sm space-y-2">
            <span class="text-[10px] uppercase font-bold text-slate-400">Total Users</span>
            <div class="flex items-baseline justify-between">
                <span class="text-2xl font-black text-slate-900">{{ number_format($totalUsers) }}</span>
                <span class="text-xs font-bold text-emerald-600">+12% this term</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-3xl border border-slate-200 shadow-sm space-y-2">
            <span class="text-[10px] uppercase font-bold text-slate-400">Active Faculties</span>
            <div class="flex items-baseline justify-between">
                <span class="text-2xl font-black text-slate-900">{{ $activeFaculties }}</span>
                <span class="text-xs font-bold text-slate-500">{{ $activeDepartments }} Departments</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-3xl border border-slate-200 shadow-sm space-y-2">
            <span class="text-[10px] uppercase font-bold text-slate-400">Database Load</span>
            <div class="flex items-baseline justify-between">
                <span class="text-2xl font-black text-slate-900">{{ $databaseLoad }}%</span>
                <span class="text-xs font-bold text-emerald-600">Healthy</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-3xl border border-slate-200 shadow-sm space-y-2">
            <span class="text-[10px] uppercase font-bold text-slate-400">Queued Jobs</span>
            <div class="flex items-baseline justify-between">
                <span class="text-2xl font-black text-slate-900">{{ $queuedJobs }}</span>
                <span class="text-xs font-bold text-slate-500">Workers Active</span>
            </div>
        </div>
    </div>

    <!-- Health & Audit Summary Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Health Card -->
        <div class="lg:col-span-2 bg-white p-6 rounded-3xl border border-slate-200 shadow-sm space-y-4">
            <h2 class="text-base font-bold text-slate-900">System Infrastructure Status</h2>
            <div class="space-y-3">
                @foreach($systemServices as $service)
                    <div class="flex items-center justify-between p-3 bg-slate-50 rounded-2xl text-xs">
                        <span class="font-bold text-slate-700">{{ $service['name'] }}</span>
                        <span class="px-2.5 py-1 font-bold text-[10px] rounded-full {{ $service['badge_class'] }}">
                            {{ $service['status'] }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm space-y-4">
            <h2 class="text-base font-bold text-slate-900">Administrative Tasks</h2>
            <div class="space-y-2">
                <a href="{{ route('super-admin.users.index') }}" class="block w-full text-center py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs rounded-2xl transition-all">
                    Manage Global Users
                </a>
                <a href="{{ route('super-admin.system.audit-logs') }}" class="block w-full text-center py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-xs rounded-2xl transition-all">
                    Review Audit Trail
                </a>
            </div>
        </div>
    </div>
</div>