<x-gotime-app-layout layout="{{ config('naykel.template') }}" :hasContainer=false class="grid cols-20:80">

    <div class="light">

        <nav class="menu">
            <a href="{{ route('home') }}">
                <span>Transaction Table</span>
            </a>
        </nav>

    </div>

    <div class="container my-3">

        <livewire:order-table></livewire:order-table>

    </div>

</x-gotime-app-layout>
