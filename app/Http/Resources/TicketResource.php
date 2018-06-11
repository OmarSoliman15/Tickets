<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\MissingValue;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $messages = $this->messages;

        return [
            'body' => $this->body,
            'type' => $this->type,
            'status' => $this->status,
            'messages' => $messages ? MessageResource::collection($this->messages) : new MissingValue,
        ];
    }
}
