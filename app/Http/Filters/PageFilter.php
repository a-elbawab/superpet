<?php

namespace App\Http\Filters;

class PageFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'title',
        'content',
    ];

    /**
     * Filter the query by a given title.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function title($value)
    {
        if ($value) {
            return $this->builder->whereTranslation('title', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query by content.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function content($value)
    {
        if ($value) {
            return $this->builder->whereTranslation('content', $value);
        }

        return $this->builder;
    }
}
