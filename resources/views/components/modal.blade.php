@props(['id' => null, 'maxWidth' => '600px'])

<div x-data="{ open: @entangle($attributes->wire('model')).defer }" x-cloak x-show="open" x-on:keydown.escape.window="open = false">

    <div x-show="open" class="overlay">

        {{-- do not add merge attributes here because livewire spits the dummy and validation breaks --}}
        <div x-show="open" class="bx my-3" style="width: min({{ $maxWidth }}, 90%)">

            {{ $slot }}

        </div>

    </div>

</div>
