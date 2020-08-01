<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Client extends JsonResource {
	
    public function toArray($request) {
        return [
			'id' => $this->id,
			'name' => $this->name,
			'surname' => $this->surname,
			'emails' => $this->emails,
			'phones' => $this->phones,
			'created_at' => $this->created_at,
			'updated_at' => $this->updated_at,
        ];;
    }
}
