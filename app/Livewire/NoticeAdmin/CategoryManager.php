<?php

namespace App\Livewire\NoticeAdmin;

use Livewire\Component;

class CategoryManager extends Component
{
    public string $name = '';
    public string $description = '';
    public string $color = 'amber';

    public array $categories = [];

    public function mount(): void
    {
        $this->categories = [
            [
                'id' => 1,
                'name' => 'Academic',
                'slug' => 'academic',
                'description' => 'Exams, timetables, syllabus updates, and grade circulars.',
                'color' => 'sky',
                'count' => 64,
            ],
            [
                'id' => 2,
                'name' => 'Emergency Alert',
                'slug' => 'emergency-alert',
                'description' => 'Urgent security, weather, or IT infrastructure notifications.',
                'color' => 'red',
                'count' => 12,
            ],
            [
                'id' => 3,
                'name' => 'Events & Campus Life',
                'slug' => 'events-campus-life',
                'description' => 'Hackathons, cultural festivals, sports, and club notices.',
                'color' => 'purple',
                'count' => 38,
            ],
            [
                'id' => 4,
                'name' => 'Career & Internships',
                'slug' => 'career-internships',
                'description' => 'Job openings, industrial attachments, and recruitment drives.',
                'color' => 'emerald',
                'count' => 25,
            ],
        ];
    }

    public function createCategory(): void
    {
        $this->validate([
            'name' => 'required|min:3',
            'description' => 'required',
        ]);

        $this->categories[] = [
            'id' => count($this->categories) + 1,
            'name' => $this->name,
            'slug' => \Illuminate\Support\Str::slug($this->name),
            'description' => $this->description,
            'color' => $this->color,
            'count' => 0,
        ];

        $this->reset(['name', 'description']);
        session()->flash('status', 'Category taxonomy created successfully.');
    }

    public function deleteCategory(int $id): void
    {
        $this->categories = array_filter($this->categories, fn($c) => $c['id'] !== $id);
        session()->flash('status', 'Category removed.');
    }

    public function render()
    {
        return view('livewire.notice-admin.category-manager', [
            'categories' => $this->categories,
        ]);
    }
}