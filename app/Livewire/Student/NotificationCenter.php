<?php

namespace App\Livewire\Student;

use Livewire\Component;

class NotificationCenter extends Component
{
    public bool $isOpen = false;
    public array $notifications = [];

    public function mount(): void
    {
        $this->notifications = [
            [
                'id' => 1,
                'title' => 'New Exam Timetable Released',
                'message' => 'Mid-term timetable for Software Architecture is now published.',
                'read' => false,
                'created_at' => '10 mins ago',
            ],
            [
                'id' => 2,
                'title' => 'Emergency System Notice',
                'message' => 'IT network maintenance scheduled for Saturday midnight.',
                'read' => false,
                'created_at' => '1 hour ago',
            ],
            [
                'id' => 3,
                'title' => 'Hackathon Registration',
                'message' => 'Campus Tech Hackathon registration is officially open.',
                'read' => true,
                'created_at' => '1 day ago',
            ],
        ];
    }

    public function toggleDropdown(): void
    {
        $this->isOpen = !$this->isOpen;
    }

    public function markAllAsRead(): void
    {
        foreach ($this->notifications as &$notification) {
            $notification['read'] = true;
        }
    }

    public function getUnreadCountProperty(): int
    {
        return count(array_filter($this->notifications, fn($n) => !$n['read']));
    }

    public function render()
    {
        return view('livewire.student.notification-center', [
            'unreadCount' => $this->unreadCount,
        ]);
    }
}