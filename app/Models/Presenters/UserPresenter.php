<?php

namespace App\Models\Presenters;

use Illuminate\Support\HtmlString;

class UserPresenter extends Presenter
{
    /**
     * @throws \Throwable
     * @return \Illuminate\Support\HtmlString
     */
    public function thumbAvatar()
    {
        $admin = $this->entity;

        return new HtmlString(view('dashboard.admins.partials.presenters.thumb-avatar', compact('admin'))->render());
    }
}
