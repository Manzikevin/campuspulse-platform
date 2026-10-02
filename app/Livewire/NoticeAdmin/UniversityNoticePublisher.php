<?php

namespace App\Livewire\NoticeAdmin;

use Livewire\Component;
use Livewire\WithPagination;

class UniversityNoticePublisher extends Component
{
    use WithPagination;

    public string $search = '';
    public string $statusFilter = 'all';
    public string $categoryFilter = 'all';

    public function deleteNotice(int $id): void
    {
        // Mock deletion trigger
        session()->flash('status', "Notice #{$id} deleted successfully.");
    }

    public function getNoticesProperty(): array
    {
        $mockNotices = [
            [
                'id' => 1,
                'title' => 'Software Architecture Mid-Term Examination Timetable & Hall Allocation',
                'category' => 'Academic',
                'priority' => 'High',
                'scope' => 'Faculty of Computing',
                'status' => 'Published',
                'reads' => 1420,
                'published_at' => 'Oct 14, 2026',
            ],
            [
                'id' => 2,
                'title' => 'Campus Inter-Faculty Tech Hackathon 2026 Registration Open',
                'category' => 'Events',
                'priority' => 'Medium',
                'scope' => 'All Faculties',
                'status' => 'Published',
                'reads' => 890,
                'published_at' => 'Oct 12, 2026',
            ],
            [
                'id' => 3,
                'title' => 'Urgent: Main Server Maintenance and Network Downtime',
                'category' => 'Emergency',
                'priority' => 'Urgent',
                'scope' => 'All Faculties',
                'status' => 'Published',
                'reads' => 3100,
                'published_at' => 'Oct 10, 2026',
            ],
            [
                'id' => 4,
                'title' => 'Proposed Annual Cultural Gala Schedule Draft',
                'category' => 'Events',
                'priority' => 'Low',
                'scope' => 'All Faculties',
                'status' => 'Draft',
                'reads' => 0,
                'published_at' => 'N/A',
            ],
            [
                'id' => 5,
                'title' => 'Semester 1 2025/2026 Archived Examination Guidelines',
                'category' => 'Academic',
                'priority' => 'Normal',
                'scope' => 'All Faculties',
                'status' => 'Archived',
                'reads' => 2450,
                'published_at' => 'Jan 15, 2026',
            ],
        ];

        return array_filter($mockNotices, function ($notice) {
            $matchesSearch = empty($this->search) || str_contains(strtolower($notice['title']), strtolower($this->search));
            $matchesStatus = $this->statusFilter === 'all' || strtolower($notice['status']) === strtolower($this->statusFilter);
            $matchesCategory = $this->categoryFilter === 'all' || strtolower($notice['category']) === strtolower($this->categoryFilter);

            return $matchesSearch && $matchesStatus && $matchesCategory;
        });
    }

    public function render()
    {
        return view('livewire.notice-admin.university-notice-publisher', [
            'notices' => $this->notices,
        ]);
    }
}