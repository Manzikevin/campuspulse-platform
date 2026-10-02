@extends('layouts.notice-admin')

@section('title', 'University Notice Management')

@section('content')
<div class="space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black text-slate-900 tracking-tight">University-Wide Notices</h1>
            <p class="text-xs text-slate-500 mt-1">Manage, search, edit, or archive all published notices across departments.</p>
        </div>

        <a href="{{ route('notice-admin.notices.create') }}" class="px-4 py-2.5 bg-amber-500 hover:bg-amber-600 text-white font-bold text-xs rounded-2xl shadow-sm transition-all inline-flex items-center gap-1.5 self-start sm:self-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Create New Notice
        </a>
    </div>

    <!-- Livewire Publisher & List Component -->
    <livewire:notice-admin.university-notice-publisher />

</div>
@endsection