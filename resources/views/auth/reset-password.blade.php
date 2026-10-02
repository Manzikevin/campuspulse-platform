@extends('layouts.auth')

@section('title', 'Set New Password')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Set New Password</h1>
        <p class="text-slate-600 text-sm mt-1">Choose a strong, new password to secure your account.</p>
    </div>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-xs text-red-600 space-y-1">
            @foreach ($errors->all() as $error)
                <p>• {{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="#" class="space-y-5">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="">

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Email Address</label>
            <input id="email" type="email" name="email" value="" required readonly
                class="w-full px-4 py-3.5 bg-slate-100 border border-slate-200 rounded-2xl text-sm font-medium text-slate-500 cursor-not-allowed">
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">New Password</label>
            <input id="password" type="password" name="password" required autofocus
                placeholder="••••••••••••"
                class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-medium text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Confirm New Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                placeholder="••••••••••••"
                class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-medium text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all">
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full py-4 px-6 bg-brand-500 hover:bg-brand-600 text-white font-bold text-sm rounded-2xl shadow-lg shadow-brand-500/20 transition-all">
            Update Password & Sign In
        </button>
    </form>
@endsection