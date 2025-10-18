<?php

namespace App\Models\Presenters;

use Laracodes\Presenter\Presenter;

class FeedbackPresenter extends Presenter
{
    /**
     * Display the localed type.
     *
     * @return string
     */
    public function type()
    {
        if (!$this->model->type) {
            return '-';
        }

        return trans('feedback.types.' . $this->model->type);
    }
}
