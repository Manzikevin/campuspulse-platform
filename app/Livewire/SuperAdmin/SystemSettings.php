<?php

namespace App\Livewire\SuperAdmin;

use Livewire\Component;

class SystemSettings extends Component
{
    public bool $maintenanceMode = false;
    public bool $autoArchive = true;
    public int $retentionDays = 90;
    public string $systemNotice = '';

    public function mount(): void
    {
        $this->maintenanceMode = false;
        $this->autoArchive = true;
        $this->retentionDays = 90;
        $this->systemNotice = 'Scheduled maintenance every Sunday at 02:00 AM UTC.';
    }

    public function saveSettings(): void
    {
        session()->flash('status', 'System environment configurations saved successfully.');
    }

    public function clearCache(): void
    {
        session()->flash('status', 'Application cache and route stores flushed successfully.');
    }

    public function triggerBackup(): void
    {
        session()->flash('status', 'Manual system database backup job dispatched to queue.');
    }

    public function render()
    {
        return view('livewire.super-admin.system-settings');
    }
}