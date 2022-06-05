<div>

    <x-search-sort-toolbar :searchBy="$searchBy" :searchOptions="$searchOptions" :paginateOptions="$paginateOptions" />

    <form wire:submit.prevent="save">

        <x-modal.save wire:model.defer="showModal">

            <x-slot name="title">Edit Transaction</x-slot>

            <x-input wire:model.defer="editing.customer" for="editing.customer" label="Customer" placeholder="Customer" />
            <x-datepicker wire:model.defer="editing.order_date" for="editing.order_date" label="Order Date" placeholder="dd-mm-yy" />
            <x-input wire:model.defer="editing.amount" for="editing.amount" label="Amount" placeholder="Amount" />
            <x-input wire:model.defer="editing.payment_id" for="editing.payment_id" label="Payment ID" placeholder="Payment ID" />

            <x-select wire:model.defer="editing.status" for="editing.status" label="Status">
                @foreach(App\Models\Order::STATUSES as $value => $label)
                    <option value="{{ $value }}">{{ $label }}</option>
                @endforeach
            </x-select>

            <div class="tar">
                <button wire:click="$set('showModal', false)" class="btn secondary">Cancel</button>
                <button type="submit" class="btn primary">Save</button>
            </div>

        </x-modal.save>

    </form>

    <table class="fullwidth">

        <thead class="whitespace-nowrap txt-sm">
            <tr class="c-px-1">
                <th>ID</th>
                <x-table.th sortable wire:click="sortBy('order_date')" :direction="$sortBy === 'order_date' ? $sortDirection : null" class="cursor-pointer w-150px tac">Order Date</x-table.th>
                <x-table.th sortable wire:click="sortBy('customer')" :direction="$sortBy === 'customer' ? $sortDirection : null" class="cursor-pointer fullwidth">Customer</x-table.th>
                <x-table.th sortable wire:click="sortBy('amount')" :direction="$sortBy === 'amount' ? $sortDirection : null" class="cursor-pointer">Amount</x-table.th>
                <x-table.th sortable wire:click="sortBy('status')" :direction="$sortBy === 'status' ? $sortDirection : null" class="cursor-pointer">Status</x-table.th>
                <x-table.th sortable wire:click="sortBy('payment_id')" :direction="$sortBy === 'payment_id' ? $sortDirection : null" class="cursor-pointer">Payment Id</x-table.th>
                <th></th>
            </tr>
        </thead>

        @forelse($orders as $order)

            <tr wire:loading.class.delay="txt-muted" class="c-px-1">
                <td>{{ $order->id }}</td>
                <td>{{ $order->order_date }}</td>
                <td>{{ $order->customer }}</td>
                <td>${{ $order->amount }}</td>
                <td>
                    <span class="txt-{{ $order->status_color }} capitalize">
                        {{ $order->status }}
                    </span>
                </td>
                <td>{{ $order->payment_id }}</td>
                <td>
                    <div class="flex">
                        <svg wire:click="edit({{ $order->id }})" class="cursor-pointer icon pxy-025 hover-red">
                            <use href="/svg/naykel-ui-SVG-sprite.svg#edit-o"></use>
                        </svg>
                        <svg wire:click="delete({{ $order->id }})" class="cursor-pointer icon pxy-025 hover-red">
                            <use href="/svg/naykel-ui-SVG-sprite.svg#trash-o"></use>
                        </svg>
                    </div>
                </td>
            </tr>

        @empty

            <tr>
                <td class="tac pxy" colspan="6">Nothing to display.</td>
            </tr>

        @endforelse

    </table>

    {{ $orders->links('gotime::pagination.livewire') }}

</div>
