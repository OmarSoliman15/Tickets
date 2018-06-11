<?php

namespace App\Http\Requests\Api;

use App\Models\Ticket;
use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class TicketRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'body' => 'required|string|max:500',
            'type' => ['sometimes', Rule::in(Ticket::getTypes())],
            'avatar' => 'nullable'
        ];
    }
}
