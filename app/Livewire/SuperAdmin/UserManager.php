<?php

namespace App\Livewire\SuperAdmin;

use Livewire\Component;
use Livewire\WithPagination;

class UserManager extends Component
{
    use WithPagination;

    public string $search = '';
    public string $roleFilter = 'all';

    // Modal state for user editing
    public bool $showModal = false;
    public ?int $editingUserId = null;
    public string $name = '';
    public string $email = '';
    public string $role = 'student';
    public string $status = 'active';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function editUser(int $id): void
    {
        $this->editingUserId = $id;
        // Mock loading user details
        $this->name = 'Dr. Sarah Jenkins';
        $this->email = 's.jenkins@campuspulse.edu';
        $this->role = 'dean';
        $this->status = 'active';

        $this->showModal = true;
    }

    public function saveUser(): void
    {
        $this->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'role' => 'required',
            'status' => 'required',
        ]);

        session()->flash('status', "User account for {$this->name} updated successfully.");
        $this->showModal = false;
    }

    public function toggleStatus(int $id): void
    {
        session()->flash('status', "User account #{$id} status toggled.");
    }

    public function render()
    {
        // Mock collection for pagination simulation
        $users = collect([
            [
                'id' => 1,
                'name' => 'Dr. Sarah Jenkins',
                'email' => 's.jenkins@campuspulse.edu',
                'role' => 'Dean',
                'department' => 'Faculty of Science',
                'status' => 'active',
                'created_at' => 'Jan 12, 2026',
            ],
            [
                'id' => 2,
                'name' => 'Prof. Adams',
                'email' => 'adams@campuspulse.edu',
                'role' => 'HOD',
                'department' => 'Computer Science',
                'status' => 'active',
                'created_at' => 'Feb 01, 2026',
            ],
            [
                'id' => 3,
                'name' => 'John Doe',
                'email' => 'j.doe@student.campuspulse.edu',
                'role' => 'Student',
                'department' => 'Computer Science',
                'status' => 'suspended',
                'created_at' => 'Sep 05, 2026',
            ],
        ])->filter(function ($u) {
            $matchesSearch = empty($this->search) || 
                str_contains(strtolower($u['name']), strtolower($this->search)) || 
                str_contains(strtolower($u['email']), strtolower($this->search));
            
            $matchesRole = $this->roleFilter === 'all' || strtolower($u['role']) === strtolower($this->roleFilter);

            return $matchesSearch && $matchesRole;
        });

        return view('livewire.super-admin.user-manager', [
            'users' => $users,
        ]);
    }
}