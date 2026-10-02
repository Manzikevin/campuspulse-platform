<?php

namespace App\Livewire\SuperAdmin;

use Livewire\Component;

class StructureManager extends Component
{
    public string $activeTab = 'faculties'; // 'faculties', 'departments', 'programs'

    // Form inputs
    public string $name = '';
    public string $code = '';
    public ?int $parentId = null;

    public array $faculties = [];
    public array $departments = [];
    public array $programs = [];

    public function mount(?string $tab = null): void
    {
        if ($tab && in_array($tab, ['faculties', 'departments', 'programs'])) {
            $this->activeTab = $tab;
        }

        $this->faculties = [
            ['id' => 1, 'name' => 'Faculty of Science & Technology', 'code' => 'FST', 'dept_count' => 4],
            ['id' => 2, 'name' => 'Faculty of Business & Economics', 'code' => 'FBE', 'dept_count' => 3],
        ];

        $this->departments = [
            ['id' => 101, 'faculty_id' => 1, 'name' => 'Department of Computer Science', 'code' => 'CS', 'hod' => 'Prof. Adams'],
            ['id' => 102, 'faculty_id' => 1, 'name' => 'Department of Mathematics', 'code' => 'MATH', 'hod' => 'Dr. Paul'],
            ['id' => 103, 'faculty_id' => 2, 'name' => 'Department of Accounting', 'code' => 'ACC', 'hod' => 'Mrs. Clark'],
        ];

        $this->programs = [
            ['id' => 1001, 'dept_id' => 101, 'title' => 'B.Sc. Computer Science', 'code' => 'BSCS', 'duration' => '4 Years'],
            ['id' => 1002, 'dept_id' => 101, 'title' => 'B.Sc. Software Engineering', 'code' => 'BSSE', 'duration' => '4 Years'],
        ];
    }

    public function setTab(string $tab): void
    {
        $this->activeTab = $tab;
        $this->reset(['name', 'code', 'parentId']);
    }

    public function createStructureItem(): void
    {
        $this->validate([
            'name' => 'required|min:3',
            'code' => 'required|min:2',
        ]);

        if ($this->activeTab === 'faculties') {
            $this->faculties[] = [
                'id' => count($this->faculties) + 1,
                'name' => $this->name,
                'code' => strtoupper($this->code),
                'dept_count' => 0,
            ];
        } elseif ($this->activeTab === 'departments') {
            $this->departments[] = [
                'id' => count($this->departments) + 101,
                'faculty_id' => $this->parentId ?? 1,
                'name' => $this->name,
                'code' => strtoupper($this->code),
                'hod' => 'Unassigned',
            ];
        } else {
            $this->programs[] = [
                'id' => count($this->programs) + 1001,
                'dept_id' => $this->parentId ?? 101,
                'title' => $this->name,
                'code' => strtoupper($this->code),
                'duration' => '4 Years',
            ];
        }

        $this->reset(['name', 'code', 'parentId']);
        session()->flash('status', 'Structural node created successfully.');
    }

    public function getPageTitleProperty(): string
    {
        return match ($this->activeTab) {
            'faculties' => 'University Faculties',
            'departments' => 'University Departments',
            'programs' => 'Academic Programs',
            default => 'Structure Hierarchy',
        };
    }

    public function render()
    {
        return view('livewire.super-admin.structure-manager');
    }
}