<?php

namespace App\Models\Relations;

use App\Models\Ticket;
use App\Models\User;

trait MessageRelations
{
    /**
     * The ticket belongs to the message.
     *
     * @return mixed
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    /**
     * The user belongs to the message.
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
