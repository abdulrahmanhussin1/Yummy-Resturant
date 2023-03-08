<?php

namespace App\Providers;

use App\Models\User;
use App\Mail\BookTable;
use App\Mail\ConfirmBookTable;
use App\Mail\ContactUs;
use App\Models\Message;
use App\Models\BookTable as ModelsBookTable;
use App\Models\ConfirmedBookTable as ModelsConfirmedBookTable;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;


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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Message::created(function($user){
            Mail::to($user)->send(new ContactUs($user));
        });


        ModelsBookTable::created(function($user){
            Mail::to($user)->send(new BookTable($user));
        });

        ModelsConfirmedBookTable::created(function($user){
            Mail::to($user)->send(new ConfirmBookTable($user));
        });
    }
}
