<?php

namespace App\Providers;

use App\Http\Resources\Desktop\CityCollection;
use App\Http\Resources\Desktop\DayCollection;
use App\Http\Resources\Desktop\EventCollection;
use App\Http\Resources\Desktop\GuestCollection;
use App\Http\Resources\Desktop\GuestStationCollection;
use App\Http\Resources\Desktop\StationCollection;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Event;
use App\Models\Product;
use App\Models\Service;
use App\Observers\CategoryObserver;
use App\Observers\PhoneVerificationObserver;
use App\Observers\ProductObserver;
use App\Observers\ServiceObserver;
use App\View\Forms\Components\ColorComponent;
use App\View\Forms\Components\PriceComponent;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Laraeast\LaravelBootstrapForms\Facades\BsForm;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Bridge\Sendgrid\Transport\SendgridTransport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // Mail::extend('sendgrid', function () {
        //     return new SendgridTransport(env('SENDGRID_API_KEY'));
        // });

        $this->loadViewsFrom(resource_path('views/vendor/mail'), 'mail');
        Product::observe(ProductObserver::class);
        Category::observe(CategoryObserver::class);
        Service::observe(ServiceObserver::class);
        BsForm::registerComponent('price', PriceComponent::class);
        BsForm::registerComponent('color', ColorComponent::class);
        Paginator::useBootstrap();


        Customer::observe(PhoneVerificationObserver::class);

        CityCollection::withoutWrapping();
        EventCollection::withoutWrapping();
        GuestCollection::withoutWrapping();
        GuestStationCollection::withoutWrapping();
        StationCollection::withoutWrapping();
        DayCollection::withoutWrapping();

        view()->composer('*', function ($view) {
            if (!view()->shared('mainCategories')) {
                $mainCategories = Category::parents()->active()->get();
                $view->with('mainCategories', $mainCategories);
            }
        });

    }
}
