@extends('layouts.student')

@section('title', 'Academic Profile')

@section('content')
<div class="max-w-3xl mx-auto space-y-8">

    <div>
        <h1 class="text-2xl font-black text-slate-900 tracking-tight">Academic Profile Settings</h1>
        <p class="text-xs text-slate-500 mt-1">Manage your targeted scope preferences to receive accurate notice distributions.</p>
    </div>

    <!-- Profile Form -->
    <div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-sm space-y-6">
        
        <form method="POST" action="#" class="space-y-6">
            @csrf

            <!-- User Basic Details (Read Only) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Student Full Name</label>
                    <input type="text" value="{{ auth()->user()->name ?? 'Alex Morgan' }}" readonly
                           class="w-full px-4 py-3 bg-slate-100 border border-slate-200 rounded-2xl text-xs font-medium text-slate-500 cursor-not-allowed">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">University Identification Email</label>
                    <input type="email" value="{{ auth()->user()->email ?? 'alex.m@univ.edu' }}" readonly
                           class="w-full px-4 py-3 bg-slate-100 border border-slate-200 rounded-2xl text-xs font-medium text-slate-500 cursor-not-allowed">
                </div>
            </div>

            <hr class="border-slate-100">

            <!-- Targeted Notice Scope Selectors -->
            <div class="space-y-4">
                <h3 class="text-xs font-extrabold text-slate-900 uppercase tracking-wider">Target Audience Scope Preferences</h3>

                <!-- Faculty Selection -->
                <div>
                    <label for="faculty" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Faculty / School</label>
                    <select id="faculty" name="faculty_id" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 focus:bg-white focus:outline-none focus:border-brand-500 transition-all">
                        <option value="1" selected>Faculty of Computing & Information Technology</option>
                        <option value="2">Faculty of Business Administration</option>
                        <option value="3">Faculty of Engineering</option>
                    </select>
                </div>

                <!-- Department Selection -->
                <div>
                    <label for="department" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Department</label>
                    <select id="department" name="department_id" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 focus:bg-white focus:outline-none focus:border-brand-500 transition-all">
                        <option value="10" selected>Department of Software Engineering</option>
                        <option value="11">Department of Computer Science</option>
                    </select>
                </div>

                <!-- Program & Academic Year Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="program" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Academic Degree Program</label>
                        <input id="program" type="text" name="program" value="BSc in Software Engineering" 
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 focus:bg-white focus:outline-none focus:border-brand-500 transition-all">
                    </div>
                    <div>
                        <label for="academic_year" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Academic Cohort / Year</label>
                        <select id="academic_year" name="academic_year" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 focus:bg-white focus:outline-none focus:border-brand-500 transition-all">
                            <option value="1">Year 1</option>
                            <option value="2">Year 2</option>
                            <option value="3" selected>Year 3</option>
                            <option value="4">Year 4</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Submit Action -->
            <div class="pt-4 flex justify-end">
                <button type="submit" class="py-3.5 px-6 bg-brand-500 hover:bg-brand-600 text-white font-bold text-xs uppercase tracking-wider rounded-2xl shadow-lg shadow-brand-500/20 transition-all">
                    Save Academic Preferences
                </button>
            </div>

        </form>

    </div>

</div>
@endsection