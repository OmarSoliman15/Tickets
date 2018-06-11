<?php

namespace App\Models;

use App\Models\Helpers\UserHelpers;
use App\Models\Concerns\Presentable;
use App\Models\Concerns\Resourcable;
use App\Models\Concerns\HasMediaTrait;
use App\Models\Presenters\UserPresenter;
use App\Models\Relations\UserRelations;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use App\Models\Presenters\Urls\UserUrlGenerator;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasMedia
{
    use Notifiable, Resourcable, Presentable, HasMediaTrait, UserHelpers, UserRelations, HasApiTokens;

    /**
     * The code of normal user type.
     */
    const USER_TYPE = 0;

    /**
     * The code of admin type.
     */
    const ADMIN_TYPE = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The presenter class name.
     *
     * @var string
     */
    protected $presenter = UserPresenter::class;

}
