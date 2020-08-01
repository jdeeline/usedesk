<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends ClientRequest {
	
    public function authorize() {
        return true;
    }

    public function rules() {
		return array_merge(parent::rules(), [
		]);
    }
}
