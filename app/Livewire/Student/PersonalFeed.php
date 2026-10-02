<?php

namespace App\Livewire\Student;

use Livewire\Component;

class PersonalFeed extends Component
{
    public string $categoryFilter = 'all';
    public string $priorityFilter = 'all';
    public array $bookmarkedIds = [1, 3];

    public function toggleBookmark(int $noticeId): void
    {
        if (in_array($noticeId, $this->bookmarkedIds)) {
            $this->bookmarkedIds = array_diff($this->bookmarkedIds, [$noticeId]);
        } else {
            $this->bookmarkedIds[] = $noticeId;
        }
    }

    public function getNoticesProperty(): array
    {
        $mockNotices = [
            [
                'id' => 1,
                'title' => 'Software Architecture Mid-Term Examination Timetable & Hall Allocation',
                'category' => 'Academic',
                'priority' => 'High',
                'author' => 'Dr. Emmanuel N.',
                'department' => 'Software Engineering',
                'faculty' => 'Computing & IT',
                'excerpt' => 'The revised mid-term examination timetable for Year 3 Software Engineering students has been published. Hall allocations are based on registration numbers.',
                'created_at' => '2 hours ago',
                'has_attachment' => true,
                'attachment_name' => 'Software_Eng_Sem1_Exam_Timetable.pdf',
            ],
            [
                'id' => 2,
                'title' => 'Campus Inter-Faculty Tech Hackathon 2026 Registration Open',
                'category' => 'Events',
                'priority' => 'Medium',
                'author' => 'Student Affairs Office',
                'department' => 'Central University Administration',
                'faculty' => 'All Faculties',
                'excerpt' => 'Join the annual 48-hour innovation hackathon sponsored by tech industry partners. Cash prizes and internship placements for top teams.',
                'created_at' => '1 day ago',
                'has_attachment' => false,
                'attachment_name' => null,
            ],
            [
                'id' => 3,
                'title' => 'Urgent: Main Server Maintenance and Network Downtime',
                'category' => 'Emergency',
                'priority' => 'Urgent',
                'author' => 'IT Infrastructure Team',
                'department' => 'ICT Directorate',
                'faculty' => 'All Faculties',
                'excerpt' => 'Scheduled server upgrades will cause temporary outages across student portal services and Wi-Fi networks this Saturday from 00:00 UTC to 04:00 UTC.',
                'created_at' => '3 days ago',
                'has_attachment' => true,
                'attachment_name' => 'IT_Maintenance_Schedule.pdf',
            ],
            [
                'id' => 4,
                'title' => 'Industrial Training & Internship Placement Circular for Year 3',
                'category' => 'Careers',
                'priority' => 'High',
                'author' => 'Career Guidance Office',
                'department' => 'Faculty of Computing',
                'faculty' => 'Computing & IT',
                'excerpt' => 'All Year 3 students are instructed to submit their industrial attachment preference forms before the upcoming Friday deadline.',
                'created_at' => '4 days ago',
                'has_attachment' => true,
                'attachment_name' => 'Internship_Submission_Form.docx',
            ],
        ];

        return array_filter($mockNotices, function ($notice) {
            $matchesCategory = $this->categoryFilter === 'all' || strtolower($notice['category']) === strtolower($this->categoryFilter);
            $matchesPriority = $this->priorityFilter === 'all' || strtolower($notice['priority']) === strtolower($this->priorityFilter);
            return $matchesCategory && $matchesPriority;
        });
    }

    public function render()
    {
        return view('livewire.student.personal-feed', [
            'notices' => $this->notices,
        ]);
    }
}