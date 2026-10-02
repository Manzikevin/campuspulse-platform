<?php

namespace App\Livewire\DepartmentStaff;

use Livewire\Component;
use Livewire\WithFileUploads;

class ResourceUploader extends Component
{
    use WithFileUploads;

    public string $title = '';
    public string $accessScope = 'public';
    public $document = null;

    public array $resources = [];

    public function mount(): void
    {
        $this->resources = [
            [
                'id' => 1,
                'title' => 'Semester 1 Master Class Timetable (2026/2027)',
                'size' => '2.4 MB',
                'type' => 'PDF',
                'scope' => 'Public to CS Students',
                'uploaded_at' => 'Oct 1, 2026',
            ],
            [
                'id' => 2,
                'title' => 'CS401 Senior Project Proposal Template',
                'size' => '1.1 MB',
                'type' => 'DOCX',
                'scope' => 'Year 4 Only',
                'uploaded_at' => 'Sep 20, 2026',
            ],
            [
                'id' => 3,
                'title' => 'Network Security Lab Safety Guidelines',
                'size' => '850 KB',
                'type' => 'PDF',
                'scope' => 'General Access',
                'uploaded_at' => 'Sep 15, 2026',
            ],
        ];
    }

    public function uploadResource(): void
    {
        $this->validate([
            'title' => 'required|min:4',
            'document' => 'required|mimes:pdf,doc,docx|max:10240', // 10MB Max
        ]);

        $extension = strtoupper($this->document->getClientOriginalExtension());
        $sizeInMb = round($this->document->getSize() / 1048576, 1) . ' MB';

        $this->resources[] = [
            'id' => count($this->resources) + 1,
            'title' => $this->title,
            'size' => $sizeInMb,
            'type' => $extension,
            'scope' => ucfirst($this->accessScope),
            'uploaded_at' => date('M d, Y'),
        ];

        $this->reset(['title', 'document']);
        session()->flash('status', 'Academic document uploaded successfully.');
    }

    public function deleteResource(int $id): void
    {
        $this->resources = array_filter($this->resources, fn($r) => $r['id'] !== $id);
        session()->flash('status', 'Document deleted.');
    }

    public function render()
    {
        return view('livewire.department-staff.resource-uploader', [
            'resources' => $this->resources,
        ]);
    }
}