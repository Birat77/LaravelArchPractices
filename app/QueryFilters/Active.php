<?php

namespace App\QueryFilters;

use App\QueryFilters\Filters;

class Active extends Filters
{
    protected function applyFilters($builder)
    {
        return $builder->where('active', request('active'));
    }
}
