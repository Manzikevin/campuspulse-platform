@extends('layouts.student')

@section('title', 'Notice Discovery Archive')

@section('content')
<div class="space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black text-slate-900 tracking-tight">University Notice Archive</h1>
            <p class="text-xs text-slate-500 mt-1">Search, filter, and discover official university announcements across all categories.</p>
        </div>
    </div>

    <!-- Embedded Livewire Search & Filter Component -->
    <livewire:student.notice-search />

</div>
@endsection