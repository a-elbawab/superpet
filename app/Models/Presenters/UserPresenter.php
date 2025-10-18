<?php

namespace App\Models\Presenters;

use Laracodes\Presenter\Presenter;

class UserPresenter extends Presenter
{
    /**
     * Display the localed type.
     *
     * @return string
     */
    public function type()
    {
        return trans('users.types.'.$this->model->type);
    }
}
