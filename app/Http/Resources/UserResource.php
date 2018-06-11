<?php

namespace App\Http\Resources;

use App\Models\Appointment;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\MissingValue;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'name' => $this->name,
            'email' => $this->email,
            'avatar' => $this->getFirstOrDefaultMediaUrl(),
            'links' =>  [
                    'make_ticket' => [
                        'href' => route('api.tickets.store'),
                        'method' => 'POST',
                    ],
                ]
        ];
    }
}
