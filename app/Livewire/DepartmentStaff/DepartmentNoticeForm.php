<?php

namespace App\Livewire\DepartmentStaff;

use Livewire\Component;
use Livewire\WithFileUploads;

class DepartmentNoticeForm extends Component
{
    use WithFileUploads;

    public ?int $noticeId = null;
    public string $title = '';
    public string $targetGroup = 'all_dept';
    public string $priority = 'normal';
    public string $content = '';
    public $attachment = null;

    public bool $isEditing = false;

    public function mount(?int $noticeId = null): void
    {
        if ($noticeId) {
            $this->noticeId = $noticeId;
            $this->isEditing = true;

            // Mock pre-filled data for editing mode
            $this->title = 'Special Supplementary Exam Timetable Release';
            $this->targetGroup = 'all_dept';
            $this->priority = 'high';
            $this->content = 'Please see attached timetable for special supplementary examinations scheduled for next week. Ensure all fee balances are cleared beforehand.';
        }
    }

    public function saveDraft(): void
    {
        $this->validate([
            'title' => 'required|min:5',
            'content' => 'required|min:10',
        ]);

        session()->flash('status', 'Department notice saved as draft successfully.');

        if (! $this->isEditing) {
            $this->redirect(route('dept-staff.notices.index'));
        }
    }

    public function submitForApproval(): void
    {
        $this->validate([
            'title' => 'required|min:5',
            'targetGroup' => 'required',
            'content' => 'required|min:10',
        ]);

        session()->flash('status', 'Notice submitted to approval workflow (Tier 1: HOD Review).');
        $this->redirect(route('dept-staff.notices.pending-approvals'));
    }

    public function render()
    {
        return view('livewire.department-staff.department-notice-form');
    }
}