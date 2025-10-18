<?php

namespace App\Models\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

trait HasLocalizedSlug
{
    protected static function bootHasLocalizedSlug(): void
    {
        static::saving(function ($model) {
            $locale = (string) $model->locale;
            $name = (string) ($model->name ?? '');

            $current = (string) ($model->slug ?? '');

            $shouldGenerate =
                blank($current) ||
                static::isPlaceholderSlug($current, $locale);

            if ($shouldGenerate && $name !== '') {
                $base = static::slugifyLocalized($name, $locale);
                if ($base === '' || preg_match('/^\d+$/', $base)) {
                    $base = $locale . '-item';
                }

                $ignoreId = (int) ($model->id ?? 0);
                $model->slug = static::uniqueLocalizedSlug($model->getTable(), $locale, $base, $ignoreId);
            }

            if (blank($model->slug)) {
                $model->slug = $locale . '-item';
            }
        });
    }

    protected static function isPlaceholderSlug(string $slug, string $locale): bool
    {
        return (bool) preg_match('/^' . preg_quote($locale, '/') . '\-item(?:\-\d+)?$/u', $slug);
    }


    protected static function slugifyLocalized(string $text, string $locale): string
    {
        $text = trim($text);

        if ($locale === 'en') {
            return Str::slug($text);
        }

        if ($locale === 'ar') {
            $text = preg_replace('/[^\p{Arabic}0-9\-\s]+/u', '', $text);
            $text = preg_replace('/\s+/u', '-', trim($text));
            $text = preg_replace('/-+/u', '-', $text);
            return trim($text, '-');
        }

        return Str::slug($text);
    }

    protected static function uniqueLocalizedSlug(string $table, string $locale, string $base, int $ignoreId): string
    {
        $slug = $base !== '' ? $base : 'item';
        $i = 2;

        while (
            DB::table($table)
                ->where('locale', $locale)
                ->where('slug', $slug)
                ->when($ignoreId > 0, fn($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $base . '-' . $i;
            $i++;
        }

        return $slug;
    }
}
