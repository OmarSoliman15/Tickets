<?php

namespace App\Models\Relations;

use App\Models\Message;
use App\Models\Ticket;

trait UserRelations
{
    /**
     * Get all the user tickets.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'user_id');
    }

    /**
     * Get all the user messages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class, 'user_id');
    }
}
