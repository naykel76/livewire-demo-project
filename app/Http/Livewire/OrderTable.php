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

    public Order $editing;
    public $showModal;

    public function rules()
    {
        return [
            'editing.customer' => 'required|max:32',
            'editing.order_date' => 'required|date',
            'editing.amount' => 'nullable',
            // convert to comma separated list of keys
            'editing.status' => 'required|in:' . collect(Order::STATUSES)->keys()->implode(','),
            'editing.payment_id' => 'nullable',
        ];
    }

    public function mount()
    {
        $this->editing = $this->makeBlankTransaction();
    }

    /**
     * Create blank transaction and set defaults.
     */
    public function create(): void
    {
        /**
         * If $editing model has a key, there is record from the
         * database in the current form so don't reset fields.
         */
        if ($this->editing->getKey()) $this->editing = $this->makeBlankTransaction();

        $this->showModal = true;
    }

    public function edit(Order $order)
    {
        // if the current $editing model is not equal to the
        // $order model passed in then override it, otherwise
        // leave it alone. isNot() helper compares two models
        if ($this->editing->isNot($order)) $this->editing = $order;

        $this->showModal = true;
    }

    public function save(): void
    {
        $this->validate();

        $this->editing->save();

        $this->showModal = false;

        $this->dispatchBrowserEvent('notify', 'Saved!');

    }

    public function delete($id): void
    {
        $order = Order::find($id);

        $order->delete();
    }

    /**
     * create dummy model to avoids errors, and set default
     * values
     */

    //  how can i make this reusable ???
    public function makeBlankTransaction()
    {
        // make() a blank instance of the model but does not
        // persist it to the database
        return Order::make(['order_date' => now()]);
    }

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
