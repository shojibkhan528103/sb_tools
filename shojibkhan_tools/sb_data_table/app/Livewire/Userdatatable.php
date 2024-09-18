<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\YourModelExport;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Userdatatable extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = 'id';
    public $sortDirection = 'asc';
    public $perPage = 10;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBythistable($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortBy = $field;
    }

    public function exportExcel()
    {
        return Excel::download(new YourModelExport, 'data.xlsx');
    }

    public function exportPDF()
    {
        $data = User::all()->map(function ($item) {
            $item->name = mb_convert_encoding($item->name, 'UTF-8', 'auto');
            return $item;
        });

        $pdf = Pdf::loadView('pdfdownload', compact('data'));
        return $pdf->download('data.pdf');
    }
    public function render()
    {
        $items = User::where('name', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);
        return view('livewire.userdatatable', [
            'items' => $items,
        ]);
    }
}
