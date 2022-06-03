<?php

namespace App\Http\Livewire;

use App\Http\Livewire\DataTable\WithSorting;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class OrderTable extends Component
{
    use WithPagination, WithSorting;

    public $paginateOptions = [10, 25, 50];
    public $perPage = 10;
    public $search;
    public $searchBy = 'customer';
    public $searchOptions = ['customer', 'status', 'payment_id'];

    /**
     *  Return to first page after search updated
     */
    public function updatingSearch(): void
    {
        $this->gotoPage(1);
    }

    public function render()
    {
        return view('livewire.order-table')->with([
            'orders' => Order::search($this->searchBy, $this->search)
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage),
        ]);
    }
}
