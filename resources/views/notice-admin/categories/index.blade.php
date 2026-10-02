@extends('layouts.notice-admin')

@section('title', 'Notice Categories & Taxonomies')

@section('content')
<div class="space-y-6">

    <div>
        <h1 class="text-2xl font-black text-slate-900 tracking-tight">Notice Categories & Taxonomies</h1>
        <p class="text-xs text-slate-500 mt-1">Configure global notice taxonomy tags (Academic, Emergency, Events, etc.).</p>
    </div>

    <!-- Livewire Category Manager Component -->
    <livewire:notice-admin.category-manager />

</div>
@endsection