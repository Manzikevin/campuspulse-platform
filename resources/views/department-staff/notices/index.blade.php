@extends('layouts.department-staff')

@section('title', 'Department Drafts & Submissions')

@section('content')
<div class="space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black text-slate-900 tracking-tight">Department Notices & Submissions</h1>
            <p class="text-xs text-slate-500 mt-1">Manage local department notices, drafts, and approval submission statuses.</p>
        </div>

        <a href="{{ route('dept-staff.notices.create') }}" class="px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-2xl shadow-sm transition-all inline-flex items-center gap-1.5 self-start sm:self-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Create Notice Draft
        </a>
    </div>

    <!-- Table of Notices -->
    <div class="bg-white border border-slate-200 rounded-3xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 text-slate-500 font-bold uppercase text-[10px] tracking-wider border-b border-slate-100">
                    <tr>
                        <th class="p-4">Notice Title</th>
                        <th class="p-4">Target Course / Level</th>
                        <th class="p-4">Approval State</th>
                        <th class="p-4">Date Updated</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="p-4 font-bold text-slate-900">CS302 Systems Programming Lab Schedule Change</td>
                        <td class="p-4 text-slate-600 font-medium">CS Year 3</td>
                        <td class="p-4">
                            <span class="px-2.5 py-0.5 bg-emerald-50 text-emerald-700 font-bold text-[10px] rounded-full uppercase">Published</span>
                        </td>
                        <td class="p-4 font-mono text-[11px] text-slate-400">Oct 02, 2026</td>
                        <td class="p-4 text-right space-x-2">
                            <a href="{{ route('dept-staff.notices.edit', 1) }}" class="px-2.5 py-1 bg-slate-100 text-slate-700 font-bold rounded-lg hover:bg-slate-200 transition-colors">
                                Edit
                            </a>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="p-4 font-bold text-slate-900">Special Supplementary Exam Timetable Release</td>
                        <td class="p-4 text-slate-600 font-medium">All CS Undergrads</td>
                        <td class="p-4">
                            <span class="px-2.5 py-0.5 bg-amber-50 text-amber-700 font-bold text-[10px] rounded-full uppercase">Pending Dean Approval</span>
                        </td>
                        <td class="p-4 font-mono text-[11px] text-slate-400">Oct 01, 2026</td>
                        <td class="p-4 text-right space-x-2">
                            <a href="{{ route('dept-staff.notices.edit', 2) }}" class="px-2.5 py-1 bg-slate-100 text-slate-700 font-bold rounded-lg hover:bg-slate-200 transition-colors">
                                View / Edit
                            </a>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="p-4 font-bold text-slate-900">Department Industrial Visit Registration Form</td>
                        <td class="p-4 text-slate-600 font-medium">CS Year 4</td>
                        <td class="p-4">
                            <span class="px-2.5 py-0.5 bg-slate-100 text-slate-600 font-bold text-[10px] rounded-full uppercase">Draft</span>
                        </td>
                        <td class="p-4 font-mono text-[11px] text-slate-400">Sep 28, 2026</td>
                        <td class="p-4 text-right space-x-2">
                            <a href="{{ route('dept-staff.notices.edit', 3) }}" class="px-2.5 py-1 bg-slate-100 text-slate-700 font-bold rounded-lg hover:bg-slate-200 transition-colors">
                                Continue Draft
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection