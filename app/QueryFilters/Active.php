<?php

namespace App\QueryFilters;

use App\QueryFilters\Filter;

class Active extends Filter
{
    public function applyFilter($builder)
    {
        return $builder->where('active', request($this->filterName()));
    }
}
