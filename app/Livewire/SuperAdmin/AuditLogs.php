<?php

namespace App\Livewire\SuperAdmin;

use Livewire\Component;
use Livewire\WithPagination;

class AuditLogs extends Component
{
    use WithPagination;

    public string $search = '';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $logs = collect([
            [
                'code' => 'LOG-9081',
                'action' => 'Role Granted',
                'description' => "User #12 assigned role 'HOD' by SuperAdmin Root.",
                'timestamp' => '2026-10-02 11:20:00',
            ],
            [
                'code' => 'LOG-9080',
                'action' => 'Notice Approved (Tier 2)',
                'description' => 'Notice #101 published by Dean Vance.',
                'timestamp' => '2026-10-01 16:45:12',
            ],
            [
                'code' => 'LOG-9079',
                'action' => 'System Maintenance Toggled',
                'description' => 'Maintenance mode activated by SuperAdmin Root.',
                'timestamp' => '2026-09-30 08:15:30',
            ],
        ])->filter(function ($log) {
            return empty($this->search) ||
                str_contains(strtolower($log['code']), strtolower($this->search)) ||
                str_contains(strtolower($log['action']), strtolower($this->search)) ||
                str_contains(strtolower($log['description']), strtolower($this->search));
        });

        return view('livewire.super-admin.audit-logs', [
            'logs' => $logs,
        ]);
    }
}