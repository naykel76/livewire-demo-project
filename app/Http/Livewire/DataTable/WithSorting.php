<?php

namespace App\Http\Livewire\DataTable;

trait WithSorting
{

    public $sortDirection = "asc";
    public $sortBy = "id";

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortBy = $field;
    }

}
