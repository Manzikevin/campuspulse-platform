<x-super-admin-layout>
    <x-slot name="title">Edit User Account</x-slot>

    <div class="max-w-2xl bg-white border border-slate-200 rounded-3xl p-6 shadow-sm space-y-6">
        <h1 class="text-lg font-bold text-slate-900">Update User Permissions & Role</h1>

        <form method="POST" action="{{ route('super-admin.users.update', $id) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Full Name</label>
                <input type="text" name="name" value="Dr. Sarah Jenkins" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-bold">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Role Assignment</label>
                <select name="role" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-bold">
                    <option value="dean" selected>Faculty Dean</option>
                    <option value="hod">Head of Department (HOD)</option>
                    <option value="dept_staff">Department Staff</option>
                    <option value="student">Student</option>
                </select>
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <a href="{{ route('super-admin.users.index') }}" class="py-2.5 px-5 bg-slate-100 text-slate-700 text-xs font-bold rounded-2xl">Cancel</a>
                <button type="submit" class="py-2.5 px-5 bg-red-600 hover:bg-red-700 text-white text-xs font-bold rounded-2xl">Save Changes</button>
            </div>
        </form>
    </div>
</x-super-admin-layout>