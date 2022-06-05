@props(['id' => null, 'maxWidth' => null])

    <x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>

        @isset($title)

            <div {{ $title->attributes->class(['bx-title flex va-c space-between']) }}>

                {{ $title }}

                <x-gotime-icon wire:click="$toggle('showModal')" icon="close" class="close sm" />

            </div>

        @endisset

        {{ $slot }}

        {{-- <div class="bx-footer"> --}}
        {{-- <div class="tar">
            <button wire:click.prevent="close()" class="btn danger">Cancel</button>
            <button wire:click.prevent="save()" class="btn success">Save</button>
        </div> --}}
        {{-- </div> --}}

    </x-modal>
