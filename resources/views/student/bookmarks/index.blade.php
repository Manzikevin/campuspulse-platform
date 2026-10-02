@extends('layouts.student')

@section('title', 'Saved Bookmarks')

@section('content')
<div class="space-y-6">

    <!-- Header Section -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-black text-slate-900 tracking-tight">Saved Bookmarks</h1>
            <p class="text-xs text-slate-500 mt-1">Quick access to bookmarked announcements and offline downloadable resources.</p>
        </div>
    </div>

    <!-- Livewire Bookmark Manager Component -->
    <livewire:student.bookmark-manager />

</div>
@endsection