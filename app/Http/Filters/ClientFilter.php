<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ClientFilter extends QueryFilter {
	
	public function name(String $name)
	{
		$this->builder->where('name', $name);
	}
	
	public function surname(String $surname)
	{
		$this->builder->where('surname', $surname);
	}

	public function email(String $email)
	{
		$this->builder->where('emails', 'LIKE', '%' . $email . '%');
	}
	
	public function phone(String $phone)
	{
		$this->builder->where('phones', 'LIKE', '%' . $phone . '%');
	}
}