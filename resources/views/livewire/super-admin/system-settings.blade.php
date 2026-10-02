@section('title', 'System Configuration')

<div class="max-w-4xl space-y-6">
    <div>
        <h1 class="text-xl font-black text-slate-900">Global CampusPulse Configuration</h1>
        <p class="text-xs text-slate-500">Manage environment settings, automated archiving, and system utilities.</p>
    </div>

    <!-- Environment & Maintenance Settings -->
    <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm space-y-6">
        <h2 class="text-base font-bold text-slate-900">Environment & Maintenance Settings</h2>

        <form wire:submit.prevent="saveSettings" class="space-y-4">
            <!-- Maintenance Toggle -->
            <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl">
                <div>
                    <span class="block text-xs font-bold text-slate-800">Maintenance Mode</span>
                    <span class="text-[11px] text-slate-500">Lock down system for all non-super-admin users.</span>
                </div>
                <input wire:model="maintenanceMode" type="checkbox" class="w-5 h-5 text-red-600 rounded border-slate-300 focus:ring-red-500">
            </div>

            <!-- Global Notice Banner -->
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Global System Notice Banner</label>
                <input wire:model="systemNotice" type="text" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-800 focus:outline-none focus:border-red-500">
            </div>

            <!-- Auto-Archiving Config -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="p-4 bg-slate-50 rounded-2xl flex items-center justify-between">
                    <div>
                        <span class="block text-xs font-bold text-slate-800">Auto-Archive Notices</span>
                        <span class="text-[11px] text-slate-500">Archive old departmental notices</span>
                    </div>
                    <input wire:model="autoArchive" type="checkbox" class="w-5 h-5 text-red-600 rounded border-slate-300 focus:ring-red-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Retention Window (Days)</label>
                    <input wire:model="retentionDays" type="number" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-bold text-slate-800 focus:outline-none focus:border-red-500">
                </div>
            </div>

            <div class="pt-2 text-right">
                <button type="submit" class="py-3 px-6 bg-red-600 hover:bg-red-700 text-white font-bold text-xs uppercase tracking-wider rounded-2xl shadow-lg shadow-red-600/20 transition-all">
                    Save Configuration
                </button>
            </div>
        </form>
    </div>

    <!-- Administrative Maintenance Tools -->
    <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm space-y-4">
        <h2 class="text-base font-bold text-slate-900">System Utilities</h2>

        <div class="flex flex-wrap gap-3">
            <button wire:click="clearCache" type="button" class="py-2.5 px-5 bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-xs rounded-2xl transition-all">
                Flush Application Cache
            </button>
            <button wire:click="triggerBackup" type="button" class="py-2.5 px-5 bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs rounded-2xl transition-all">
                Run On-Demand DB Backup
            </button>
        </div>
    </div>
</div>