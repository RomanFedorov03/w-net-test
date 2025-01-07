<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServicesResource extends JsonResource
{

    public string $internet;
    public string $tv;
    public string $ip;
    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->internet = $resource->internet;
        $this->tv = $resource->tv;
        $this->ip = $resource->ip;
    }

    public function toArray(Request $request): array
    {
        return [
            'internet' => $this->internet,
            'tv' => $this->tv,
            'ip' => $this->ip,
        ];
    }
}
