<?php

namespace App\Livewire\SuperAdmin;

use Livewire\Component;

class Dashboard extends Component
{
    public int $totalUsers = 14280;
    public int $activeFaculties = 8;
    public int $activeDepartments = 24;
    public int $databaseLoad = 14;
    public int $queuedJobs = 0;

    public array $systemServices = [];

    public function mount(): void
    {
        $this->systemServices = [
            [
                'name' => 'Database Server (PostgreSQL)',
                'status' => 'Operational',
                'badge_class' => 'bg-emerald-100 text-emerald-800',
            ],
            [
                'name' => 'Cache / Session Store (Redis)',
                'status' => 'Operational',
                'badge_class' => 'bg-emerald-100 text-emerald-800',
            ],
            [
                'name' => 'Storage / Media Volume',
                'status' => '68% Capacity',
                'badge_class' => 'bg-amber-100 text-amber-800',
            ],
        ];
    }

    public function render()
    {
        return view('livewire.super-admin.dashboard');
    }
}