<?php

namespace App\Models\Presenters;

use Illuminate\Support\HtmlString;

class MessagePresenter extends Presenter
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

    /**
     * display the entity delete button.
     *
     * @throws \Throwable
     * @return \Illuminate\Support\HtmlString
     */
    public function deleteButton()
    {
        //
    }

    /**
     * display the entity delete button.
     *
     * @throws \Throwable
     * @return \Illuminate\Support\HtmlString
     */
    public function editButton()
    {
        //
    }

    public function controlButton()
    {
        $this->displayEditButton = false;
        $this->displayDeleteButton = false;


        return parent::controlButton();
    }
}
