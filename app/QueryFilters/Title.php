<?php

namespace App\QueryFilters;

use Closure;
use App\QueryFilters\Filter;

class Title extends Filter
{
    public function applyFilter($builder)
    {
        return $builder->where('title', 'like', '%'.request($this->filterName()).'%');
    }
}
