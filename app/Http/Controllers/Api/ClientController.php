<?php

namespace App\Http\Controllers\Api;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Filters\ClientFilter;
use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Http\Resources\Client as ClientResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller {
	
    public function index(ClientFilter $filter) {
		$filteredClients = Client::filterBy($filter)->get();
		
		return ClientResource::collection($filteredClients);
    }

    public function store(ClientStoreRequest $request) {
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
}
