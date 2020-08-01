<?php

namespace App\Http\Controllers\Api;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Filters\ClientFilter;
use App\Http\Requests\ClientSroteRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Http\Resources\Client as ClientResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller {
	
	public function __construct() {
		$this->logging();
	}
	
    public function index(ClientFilter $filter) {
		$filteredClients = Client::filterBy($filter)->get();
		
		return ClientResource::collection($filteredClients);
    }

    public function store(ClientSroteRequest $request) {
		$client = Client::create($request->validated());
		
		return new ClientResource($client);
    }

    public function show(Client $client) {
		return new ClientResource($client);
    }

    public function update(ClientUpdateRequest $request, Client $client) {
		$client->fill($request->validated());
		$client->save();
		
		return new ClientResource($client);
	}

    public function destroy(Client $client) {
		$client->delete();
		
		return response(null, 204);
    }
	
	private function logging() {
		$message = request()->method() . " " . request()->getRequestUri();
		$context = [ "user_id" => auth('api')->user()->id ];
		
		Log::channel('api')->info($message, $context);
	}
}
