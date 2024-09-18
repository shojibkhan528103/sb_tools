<div class="container mt-5 p-3 border rounded shadow">
    <style>
        svg {
            height: 10px;
        }
    </style>
    <div class="d-flex flex-column flex-md-row justify-content-between mb-4">
        <div class="mb-3 mb-md-0">
            <select wire:model.live="perPage" class="form-select">
                <option value="5">5 per page</option>
                <option value="10">10 per page</option>
                <option value="25">25 per page</option>
                <option value="50">50 per page</option>
            </select>
        </div>
        <div>
            <input type="text" wire:model.live="search" placeholder="Search..." class="form-control">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th wire:click="sortBythistable('id')" class="cursor-pointer">
                        <i class="fas fa-sort"></i> ID
                    </th>
                    <th wire:click="sortBythistable('name')" class="cursor-pointer">
                        <i class="fas fa-sort"></i> Name
                    </th>
                    <th wire:click="sortBythistable('created_at')" class="cursor-pointer">
                        <i class="fas fa-sort"></i> Created At
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        {{ $items->links() }}

    </div>

    <div class="mt-4 d-flex gap-2">
        <button wire:click="exportExcel" class="btn btn-primary">
            <i class="fas fa-file-excel"></i> Export Excel
        </button>
        <button wire:click="exportPDF" class="btn btn-secondary">
            <i class="fas fa-file-pdf"></i> Export PDF
        </button>
        <button onclick="window.print()" class="btn btn-success">
            <i class="fas fa-print"></i> Print
        </button>
    </div>
</div>
