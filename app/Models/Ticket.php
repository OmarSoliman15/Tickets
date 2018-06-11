<?php

namespace App\Models;

use App\Models\Abstracts\Model;
use App\Models\Concerns\HasMediaTrait;
use App\Models\Relations\TicketRelations;
use App\Models\Presenters\TicketPresenter;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Ticket extends Model implements HasMedia
{
    use TicketRelations, HasMediaTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tickets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body',
        'type',
        'status',
    ];

    /**
     * The code for enable status.
     */
    const ENABLE_STATUS = 1;

    /**
     * The code for disable status.
     */
    const DISABLE_STATUS = 2;

    /**
     * The code for enquiry type.
     */
    const ENQUIRY = 1;

    /**
     * The code for complaint type.
     */
    const COMPLAINT = 2;

    /**
     * Get the supported ticket types.
     *
     * @return array
     */
    public static function getTypes()
    {
        return [
            static::ENQUIRY,
            static::COMPLAINT,
        ];
    }

    /**
     * Get the supported ticket statuses.
     *
     * @return array
     */
    public static function getStatuses()
    {
        return [
            static::ENABLE_STATUS,
            static::DISABLE_STATUS,
        ];
    }


    /**
     * The presenter class name.
     *
     * @var string
     */
    protected $presenter = TicketPresenter::class;
}
