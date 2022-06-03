<div>

    <x-search-sort-toolbar :searchBy="$searchBy" :searchOptions="$searchOptions" :paginateOptions="$paginateOptions" />

    <table class="fullwidth">

        <thead>
            <tr>
                <th>ID</th>
                <x-table.th sortable wire:click="sortBy('customer')" :direction="$sortBy === 'customer' ? $sortDirection : null" class="cursor-pointer">Customer</x-table.th>
                <x-table.th sortable wire:click="sortBy('order_date')" :direction="$sortBy === 'order_date' ? $sortDirection : null" class="cursor-pointer w-150px tac">Order Date</x-table.th>
                <x-table.th sortable wire:click="sortBy('amount')" :direction="$sortBy === 'amount' ? $sortDirection : null" class="cursor-pointer">Amount</x-table.th>
                <x-table.th sortable wire:click="sortBy('status')" :direction="$sortBy === 'status' ? $sortDirection : null" class="cursor-pointer">Status</x-table.th>
                <x-table.th sortable wire:click="sortBy('payment_id')" :direction="$sortBy === 'payment_id' ? $sortDirection : null" class="cursor-pointer">Payment Id</x-table.th>
                <th></th>
            </tr>
        </thead>

        @forelse($orders as $order)

            <tr wire:loading.class.delay="txt-muted">
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer }}</td>
                <td class="tac">{{ $order->order_date }}</td>
                <td>${{ $order->amount }}</td>
                <td>
                    <span class="txt-{{ $order->status_color }} capitalize">
                        {{ $order->status }}
                    </span>
                   </td>
                <td>{{ $order->payment_id }}</td>

            </tr>

        @empty

            <tr>
                <td class="tac pxy" colspan="6">Nothing to display.</td>
            </tr>

        @endforelse

    </table>

    {{ $orders->links('gotime::pagination.livewire') }}

</div>
