<?php

namespace App\Livewire\Student;

use Livewire\Component;

class NoticeSearch extends Component
{
    public string $search = '';
    public string $scope = 'all';
    public string $sort = 'latest';

    public function resetFilters(): void
    {
        $this->search = '';
        $this->scope = 'all';
        $this->sort = 'latest';
    }

    public function getResultsProperty(): array
    {
        $archive = [
            [
                'id' => 101,
                'title' => 'Software Architecture Mid-Term Examination Timetable',
                'category' => 'Academic',
                'scope' => 'department',
                'department' => 'Software Engineering',
                'date' => '2026-10-12',
                'formatted_date' => 'Oct 12, 2026',
            ],
            [
                'id' => 102,
                'title' => 'End of Semester Fee Payment Deadline Extension',
                'category' => 'Finance',
                'scope' => 'global',
                'department' => 'Bursar Office',
                'date' => '2026-10-10',
                'formatted_date' => 'Oct 10, 2026',
            ],
            [
                'id' => 103,
                'title' => 'Faculty of Computing Project Defense Schedule - Year 4',
                'category' => 'Academic',
                'scope' => 'faculty',
                'department' => 'Faculty of Computing',
                'date' => '2026-10-08',
                'formatted_date' => 'Oct 08, 2026',
            ],
            [
                'id' => 104,
                'title' => 'Library Digital Resource Portal Upgrade & Login Instructions',
                'category' => 'Library',
                'scope' => 'global',
                'department' => 'University Library Services',
                'date' => '2026-10-05',
                'formatted_date' => 'Oct 05, 2026',
            ],
            [
                'id' => 105,
                'title' => 'Supplementary Examinations Registration & Timetable',
                'category' => 'Academic',
                'scope' => 'department',
                'department' => 'Software Engineering',
                'date' => '2026-09-28',
                'formatted_date' => 'Sep 28, 2026',
            ],
        ];

        // Search Filter
        if (!empty($this->search)) {
            $archive = array_filter($archive, function ($item) {
                return str_contains(strtolower($item['title']), strtolower($this->search))
                    || str_contains(strtolower($item['category']), strtolower($this->search))
                    || str_contains(strtolower($item['department']), strtolower($this->search));
            });
        }

        // Scope Filter
        if ($this->scope !== 'all') {
            $archive = array_filter($archive, fn($item) => $item['scope'] === $this->scope);
        }

        // Sorting
        usort($archive, function ($a, $b) {
            return $this->sort === 'latest'
                ? strcmp($b['date'], $a['date'])
                : strcmp($a['date'], $b['date']);
        });

        return $archive;
    }

    public function render()
    {
        return view('livewire.student.notice-search', [
            'results' => $this->results,
        ]);
    }
}