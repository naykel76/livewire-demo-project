@props([
    'sortable' => null,
    'direction' => null,
    'multiColumn' => null,
    ])

    <th {{ $attributes }}>

        @unless($sortable)

            <span>{{ $slot }}</span>

        @else

            <span>{{ $slot }}</span>

            @if($direction === 'asc')
                <svg class="icon wh-1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            @elseif($direction === 'desc')
                <svg class="icon wh-1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                </svg>
            @else
                <svg class="icon wh-1 txt-muted" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                </svg>
            @endif

        @endif

    </th>
