<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Http::macro('pagarMe', function () {
            return Http::withBasicAuth(
                env('BASIC_AUTH_PAGARME_USERNAME'), env('BASIC_AUTH_PAGARME_PASSWORD'),
            )->baseUrl(env('API_PAGARME'));
        });

        Http::macro('melhorEnvio', function () {
            return Http::baseUrl(env('MELHOR_ENVIO_URL'));
        });

        Http::macro('viaCep', function () {
            return Http::baseUrl(env('VIA_CEP_URL'));
        });

        Http::macro('validarCpf', function(){
            return Http::baseUrl(env('VALIDAR_CPF_URL'));
        });
    }
}
