<?php

namespace App\QueryFilters;

use App\QueryFilters\Filters;

class Sort extends Filters
{
    protected function applyFilters($builder)
    {
        return $builder->orderBy('title', request('sort'));
    }
}
