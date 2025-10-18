<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BackfillLocalizedSlugs extends Command
{
    protected $signature = 'slugs:backfill-localized {--force-rewrite}';
    protected $description = 'Generate unique localized slugs for product/category translations (ar/en)';

    public function handle(): int
    {
        $force = (bool) $this->option('force-rewrite');

        $this->info('Products (translations)...');
        $this->backfillTable('product_translations', 'product_id', ['en', 'ar'], $force);

        $this->info('Categories (translations)...');
        $this->backfillTable('category_translations', 'category_id', ['en', 'ar'], $force);

        $this->info('Done.');
        return self::SUCCESS;
    }

    protected function backfillTable(string $table, string $parentKey, array $locales, bool $force): void
    {
        DB::table($table)->orderBy($parentKey)->chunk(500, function ($rows) use ($table, $parentKey, $locales, $force) {
            foreach ($rows as $row) {
                if (!in_array($row->locale, $locales, true)) {
                    continue;
                }

                if (!$force && !empty($row->slug)) {
                    continue;
                }

                $name = $row->name ?? null;
                $base = $this->slugifyLocalized($name ?? '', $row->locale);

                if ($base === '') {
                    $base = $row->locale . '-' . $parentKey . '-' . $row->{$parentKey};
                }

                $slug = $this->uniqueLocalizedSlug($table, $row->locale, $base, $row->id);

                DB::table($table)->where('id', $row->id)->update(['slug' => $slug]);
                $this->line(" - {$table} #{$row->id} ({$row->locale}) => {$slug}");
            }
        });
    }

    protected function slugifyLocalized(string $text, string $locale): string
    {
        $text = trim($text);

        if ($locale === 'en') {
            return Str::slug($text);
        }

        if ($locale === 'ar') {
            $text = preg_replace('/[^\p{Arabic}0-9\-\s]+/u', '', $text ?? '');
            $text = preg_replace('/\s+/u', '-', trim($text));
            $text = preg_replace('/-+/u', '-', $text);
            return trim($text, '-');
        }

        return Str::slug($text);
    }

    protected function uniqueLocalizedSlug(string $table, string $locale, string $base, int $ignoreTranslationId): string
    {
        $slug = $base !== '' ? $base : 'item';
        $i = 2;

        while (
            DB::table($table)
                ->where('locale', $locale)
                ->where('slug', $slug)
                ->where('id', '!=', $ignoreTranslationId)
                ->exists()
        ) {
            $slug = $base . '-' . $i;
            $i++;
        }

        return $slug;
    }
}
