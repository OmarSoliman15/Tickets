<?php

namespace App\Models;

use App\Models\Abstracts\Model;
use App\Models\Relations\MessageRelations;
use App\Models\Presenters\MessagePresenter;

class Message extends Model
{
    use MessageRelations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body',
        'ticket_id'
    ];

    /**
     * The presenter class name.
     *
     * @var string
     */
    protected $presenter = MessagePresenter::class;
}
