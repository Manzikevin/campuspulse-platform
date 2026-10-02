@extends('layouts.notice-admin')

@section('title', 'Notice Admin Dashboard')

@section('content')
<div class="space-y-8">
    
    <!-- Welcome & Overview Banner -->
    <div class="bg-gradient-to-r from-slate-900 via-slate-800 to-amber-950 rounded-3xl p-6 sm:p-8 text-white relative overflow-hidden shadow-lg">
        <div class="relative z-10 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <span class="px-2.5 py-1 bg-amber-500/20 border border-amber-400/30 text-amber-300 font-bold text-[11px] rounded-full uppercase tracking-wider">
                    Engagement Analytics & Overview
                </span>
                <h1 class="text-2xl sm:text-3xl font-black tracking-tight mt-2">
                    Notice Distribution Hub
                </h1>
                <p class="text-slate-300 text-xs mt-1">
                    Manage university-wide broadcasts, trace engagement analytics, and configure category taxonomies.
                </p>
            </div>
            
            <a href="{{ route('notice-admin.notices.create') }}" class="px-5 py-3 bg-amber-500 hover:bg-amber-600 text-white font-bold text-xs rounded-2xl shadow-lg shadow-amber-500/20 transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Create Announcement
            </a>
        </div>
    </div>

    <!-- Analytics Stat Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="bg-white border border-slate-200 rounded-3xl p-5 shadow-sm space-y-2">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Total Published</p>
            <p class="text-2xl font-black text-slate-900">148</p>
            <span class="text-[11px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-md">+12 this month</span>
        </div>

        <div class="bg-white border border-slate-200 rounded-3xl p-5 shadow-sm space-y-2">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Total Impressions</p>
            <p class="text-2xl font-black text-slate-900">42.8k</p>
            <span class="text-[11px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-md">89% Reach Rate</span>
        </div>

        <div class="bg-white border border-slate-200 rounded-3xl p-5 shadow-sm space-y-2">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Active Taxonomies</p>
            <p class="text-2xl font-black text-slate-900">8</p>
            <span class="text-[11px] text-slate-500 font-medium">Categories Configured</span>
        </div>

        <div class="bg-white border border-slate-200 rounded-3xl p-5 shadow-sm space-y-2">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Urgent Broadcasts</p>
            <p class="text-2xl font-black text-red-600">3</p>
            <span class="text-[11px] font-bold text-red-600 bg-red-50 px-2 py-0.5 rounded-md">Active Emergency Alerts</span>
        </div>
    </div>

    <!-- Livewire Engagement Analytics Component Placement -->
    <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm">
        <h2 class="text-base font-extrabold text-slate-900 tracking-tight mb-4">Notice Engagement Analytics</h2>
        <livewire:notice-admin.engagement-analytics />
    </div>

</div>
@endsection