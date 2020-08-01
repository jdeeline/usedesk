<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

trait Filterable {
	
    public function scopeFilterBy(Builder $builder, QueryFilter $filter) {
		$filter->apply($builder);
	}
}