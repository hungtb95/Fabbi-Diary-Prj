<?php

namespace App\QueryFilters;

use App\QueryFilters\Filter;

class Sort extends Filter
{
    public function applyFilter($builder)
    {
        // dd(request($this->filterName()));
        return $builder->sortBy('title', 'request($this->filterName())');
    }
}
