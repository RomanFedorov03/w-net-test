<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public string $name;
    public string $email;
    public string $phone;
    public string $language;
    public string $theme;
    public string|null $deviceId;
    public string $token;
    public object|null $addresses;

    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->name = $resource->name;
        $this->email = $resource->email;
        $this->phone = $resource->phone;
        $this->language = $resource->language;
        $this->theme = $resource->theme;
        $this->deviceId = $resource->deviceId;
        $this->addresses = $resource->addresses;
    }

    public function toArray(Request $request): array
    {
        return [
            'username' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'language' => $this->language,
            'theme' => $this->theme,
            'deviceId' => $this->deviceId,
            'addresses' => AddressCollection::make($this->addresses)
        ];
    }
}
