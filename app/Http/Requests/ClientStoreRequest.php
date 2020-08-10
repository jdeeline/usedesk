<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest {
	
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
			'name' => 'required|string|max:255',
			'surname' => 'required|string|max:255',
			'emails' => 'required|array|min:1',
			'emails.*' => 'required|email|min:5',
			'phones' => 'required|array|min:1',
			'phones.*' => 'required|string|min:5',
        ];
    }
}
