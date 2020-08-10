<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends ClientStoreRequest {
	
    public function authorize() {
        return true;
    }

    public function rules() {
		return array_merge(parent::rules(), [
		]);
    }
}
