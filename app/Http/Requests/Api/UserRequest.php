<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\BaseRequest;

class UserRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->getAproperRules();
    }

    /**
     * Get the creation validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'avatar' => 'nullable',
        ];
    }

    /**
     * Get the update validation rules.
     *
     * @return array
     */
    public function updateRules()
    {
        $ignoredId = $this->route('lawyer') ? $this->route('lawyer')->id : null;

        return [
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . $ignoredId,
            'password' => 'nullable|string|min:6|confirmed',
            'avatar' => 'nullable',
        ];
    }

    public function data()
    {
        if ($this->password) {
            return array_merge(parent::all(), [
                'password' => bcrypt($this->password),
            ]);
        }

        return $this->except('password', 'password_confirmation');
    }
}
