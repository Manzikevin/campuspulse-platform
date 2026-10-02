<?php

namespace App\Livewire\DepartmentStaff;

use Livewire\Component;

class NoticeApprovalQueue extends Component
{
    public string $filterStage = 'all';

    public function cancelSubmission(int $id): void
    {
        session()->flash('status', "Notice submission #{$id} withdrawn back to local drafts.");
    }

    public function getQueueItemsProperty(): array
    {
        $items = [
            [
                'id' => 101,
                'title' => 'Special Supplementary Exam Timetable Release',
                'submitted_by' => 'Staff Member',
                'submitted_at' => 'Oct 01, 2026',
                'target' => 'All CS Undergrads',
                'current_stage' => 'tier_2',
                'tier1_status' => 'approved',
                'tier1_reviewer' => 'Prof. Adams (HOD)',
                'tier2_status' => 'pending',
                'tier2_reviewer' => 'Dr. Vance (Dean)',
            ],
            [
                'id' => 102,
                'title' => 'CS Department Field Trip Security Protocols',
                'submitted_by' => 'Staff Member',
                'submitted_at' => 'Sep 30, 2026',
                'target' => 'Year 3 CS',
                'current_stage' => 'tier_1',
                'tier1_status' => 'pending',
                'tier1_reviewer' => 'Prof. Adams (HOD)',
                'tier2_status' => 'locked',
                'tier2_reviewer' => 'Pending Tier 1',
            ],
            [
                'id' => 103,
                'title' => 'CS302 Systems Programming Lab Schedule Change',
                'submitted_by' => 'Staff Member',
                'submitted_at' => 'Sep 25, 2026',
                'target' => 'CS Year 3',
                'current_stage' => 'published',
                'tier1_status' => 'approved',
                'tier1_reviewer' => 'Prof. Adams (HOD)',
                'tier2_status' => 'approved',
                'tier2_reviewer' => 'Dr. Vance (Dean)',
            ],
        ];

        return array_filter($items, function ($item) {
            if ($this->filterStage === 'all') return true;
            return $item['current_stage'] === $this->filterStage;
        });
    }

    public function render()
    {
        return view('livewire.department-staff.notice-approval-queue', [
            'queueItems' => $this->queueItems,
        ]);
    }
}