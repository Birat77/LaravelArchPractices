<?php

namespace App\Providers;

use App\Models\Channel;
use Illuminate\Support\Str;
use App\PostcardSendingService;
use App\Billing\BankPaymentGateway;
use Illuminate\Support\Facades\View;
use App\Billing\PaymentGatewayContract;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;
use App\Http\Views\Composers\ChannelComposer;
use App\Mixins\StrMixins;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PaymentGatewayContract::class, function ($app) {
            return new BankPaymentGateway('USD');
        });
        // alias used referenced by Postcard
        $this->app->singleton('Postcard', function ($app) {
            return new PostcardSendingService(4, 3, 'chicago');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /***
         * 1. Share to all views
         * bad prctice renders to all views
         */
        // view()->share('channels', Channel::all()->sortBy('name'));
        // View::share('channels', Channel::all()->sortBy('name'));
        /**
         * 2. Granular Views with Wildcards
         */
        // View::composer(['post.create', 'channel.index'], function ($view) {
        //     $view->with('channels', Channel::all()->sortBy('name'));
        // });

        /**
         * 3. Dedicated Class
         */
        // View::composer(['post.create', 'channel.index'], ChannelComposer::class);
        View::composer(['channel.partials.channels-dropdown', 'channel.*'], ChannelComposer::class);

        /**
         * Macros implementation
         */
        Str::macro('prefix', function ($name) {
            return 'AB-' . $name;
        });
        Str::mixin(new StrMixins());

        ResponseFactory::macro('customErrResponse', function ($err = 'Some custom error') {
            return [
                'message' => $err,
                'err_code' => 407
            ];
        });
    }
}
