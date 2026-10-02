<?php

namespace App\Livewire\SuperAdmin;

use Livewire\Component;

class RoleManager extends Component
{
    public array $roles = [];
    public array $permissions = [];
    
    public string $selectedRole = 'dean';
    public array $activePermissions = [];

    public function mount(): void
    {
        $this->roles = [
            'super_admin' => 'Super Administrator',
            'dean' => 'Faculty Dean',
            'hod' => 'Head of Department',
            'dept_staff' => 'Department Staff',
            'student' => 'Student',
        ];

        $this->permissions = [
            'notices.create' => 'Create Draft Notices',
            'notices.approve.tier1' => 'Tier 1 Approval (HOD)',
            'notices.approve.tier2' => 'Tier 2 Approval (Dean)',
            'notices.publish' => 'Direct Broadcast',
            'system.manage_users' => 'Manage System Users',
            'system.view_audit' => 'View System Audit Trail',
        ];

        $this->loadRolePermissions();
    }

    public function selectRole(string $roleKey): void
    {
        $this->selectedRole = $roleKey;
        $this->loadRolePermissions();
    }

    public function loadRolePermissions(): void
    {
        // Mock current assignments
        if ($this->selectedRole === 'dean') {
            $this->activePermissions = ['notices.approve.tier2', 'notices.publish'];
        } elseif ($this->selectedRole === 'hod') {
            $this->activePermissions = ['notices.create', 'notices.approve.tier1'];
        } else {
            $this->activePermissions = array_keys($this->permissions);
        }
    }

    public function togglePermission(string $permKey): void
    {
        if (in_array($permKey, $this->activePermissions)) {
            $this->activePermissions = array_diff($this->activePermissions, [$permKey]);
        } else {
            $this->activePermissions[] = $permKey;
        }
    }

    public function savePermissions(): void
    {
        session()->flash('status', "Permissions for role '{$this->roles[$this->selectedRole]}' updated.");
    }

    public function render()
    {
        return view('livewire.super-admin.role-manager');
    }
}