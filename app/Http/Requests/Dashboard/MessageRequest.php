<?php

namespace App\Http\Requests\Dashboard;

use App\Http\Requests\BaseRequest;

class MessageRequest extends BaseRequest
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
        ];
    }
}
