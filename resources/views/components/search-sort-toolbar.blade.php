<div class="bx light flex gg">

    <x-input wire:model="search" for="search" placeholder="Search {{ $searchBy }} ..." />

    <div>
        <x-select wire:model="searchBy" for="searchBy" label="Search By" inline>
            @foreach($searchOptions as $option)
                <option value="{{ $option }}">{{ $option }}</option>
            @endforeach
        </x-select>
    </div>

    <div>
        <x-select wire:model="perPage" for="perPage" label="Per Page" inline>
            @foreach($paginateOptions as $option)
                <option value="{{ $option }}">{{ $option }}</option>
            @endforeach
        </x-select>
    </div>

</div>
