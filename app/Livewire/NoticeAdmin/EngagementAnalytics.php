<?php

namespace App\Livewire\NoticeAdmin;

use Livewire\Component;

class EngagementAnalytics extends Component
{
    public string $timeframe = '30_days';

    public function getAnalyticsProperty(): array
    {
        return [
            'top_performing' => [
                ['title' => 'Software Architecture Exam Timetable', 'reads' => 1420, 'downloads' => 540, 'reach' => '94%'],
                ['title' => 'Emergency Wi-Fi & Maintenance Alert', 'reads' => 3100, 'downloads' => 120, 'reach' => '98%'],
                ['title' => 'Tech Hackathon 2026 Guidelines', 'reads' => 890, 'downloads' => 210, 'reach' => '65%'],
            ],
            'faculty_engagement' => [
                ['name' => 'Faculty of Computing & IT', 'rate' => '92%', 'active_students' => 1240],
                ['name' => 'Faculty of Engineering', 'rate' => '85%', 'active_students' => 980],
                ['name' => 'Faculty of Business', 'rate' => '78%', 'active_students' => 1100],
            ],
        ];
    }

    public function render()
    {
        return view('livewire.notice-admin.engagement-analytics', [
            'analytics' => $this->analytics,
        ]);
    }
}