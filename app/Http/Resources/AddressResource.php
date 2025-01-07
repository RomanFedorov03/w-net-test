<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    public string $address;
    public string $status;
    public string $tariff;
    public string $balance;
    public object|null $services;
    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->address = $resource->address;
        $this->status = $resource->status;
        $this->tariff = $resource->tariff;
        $this->balance = $resource->balance;
        $this->services = $resource->services;
    }

    public function toArray(Request $request): array
    {
        return [
            'address' => $this->address,
            'status' => $this->status,
            'tariff' => $this->tariff,
            'balance' => $this->balance,
            'services' => ServicesResource::make($this->services)
        ];
    }
}
