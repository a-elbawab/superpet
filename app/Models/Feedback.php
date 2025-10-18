<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Support\Traits\Selectable;
use App\Http\Filters\FeedbackFilter;
use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;
use App\Models\Presenters\FeedbackPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feedback extends Model
{
    use HasFactory;
    use Filterable;
    use Selectable;
    use Presentable;

    /**
     * The code of complaint type.
     *
     * @var string
     */
    const COMPLAINT_TYPE = 'complaint';

    /**
     * The code of question type.
     *
     * @var string
     */
    const QUESTION_TYPE = 'question';

    /**
     * The code of suggestion type.
     *
     * @var string
     */
    const SUGGESTION_TYPE = 'suggestion';

    /**
     * The query parameter's filter of the model.
     *
     * @var string
     */
    protected $filter = FeedbackFilter::class;

    /**
     * The presenter class name.
     *
     * @var string
     */
    protected $presenter = FeedbackPresenter::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'type',
        'message',
        'subject',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'read_at' => 'datetime',
    ];

    /**
     * Determine whither the message was read.
     *
     * @return bool
     */
    public function read()
    {
        return ! ! $this->read_at;
    }

    /**
     * Mark the message as read.
     *
     * @return $this
     */
    public function markAsRead()
    {
        if (! $this->read()) {
            $this->forceFill(['read_at' => now()])->save();
        }

        return $this;
    }

    /**
     * Mark the message as unread.
     *
     * @return $this
     */
    public function markAsUnread()
    {
        if ($this->read()) {
            $this->forceFill(['read_at' => null])->save();
        }

        return $this;
    }

    /**
     * Scope the query to include only unread messages.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnread($query)
    {
        return $query->whereNull('read_at');
    }
}
