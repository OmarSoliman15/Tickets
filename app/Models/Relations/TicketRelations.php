<?php

namespace App\Models\Relations;

use App\Models\Message;
use App\Models\User;

trait TicketRelations
{
    /**
     * The user requested ticket.
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get all the ticket's messages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class, 'ticket_id');
    }
}
