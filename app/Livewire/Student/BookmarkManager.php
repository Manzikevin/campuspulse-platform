<?php

namespace App\Livewire\Student;

use Livewire\Component;

class BookmarkManager extends Component
{
    public array $bookmarks = [];

    public function mount(): void
    {
        $this->bookmarks = [
            [
                'id' => 1,
                'notice_id' => 101,
                'title' => 'Software Architecture Mid-Term Examination Timetable',
                'category' => 'Academic',
                'department' => 'Software Engineering',
                'saved_at' => '2 days ago',
                'attachment' => 'Software_Eng_Sem1_Exam_Timetable.pdf',
            ],
            [
                'id' => 2,
                'notice_id' => 104,
                'title' => 'Library Digital Resource Portal Upgrade & Login Instructions',
                'category' => 'Library',
                'department' => 'University Library Services',
                'saved_at' => '1 week ago',
                'attachment' => 'Library_Portal_Guide.pdf',
            ],
        ];
    }

    public function removeBookmark(int $bookmarkId): void
    {
        $this->bookmarks = array_filter($this->bookmarks, fn($b) => $b['id'] !== $bookmarkId);
    }

    public function render()
    {
        return view('livewire.student.bookmark-manager', [
            'bookmarks' => $this->bookmarks,
        ]);
    }
}