<?php

namespace App\Providers;

use Illuminate\Http\Response;
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
        Response::macro('success', function($message, $data = null) {
            return response()->json([
                'status' => 1,
                'message' => $message,
                'data' => $data,
                'code' => 200
            ]);
        });

        Response::macro('failed', function($message, $data = null, $code = 500) {
            return response()->json([
                'status' => 0,
                'error' => $message,
                'data' => $data,
                'code' => $code
            ]);
        });
    }
}
