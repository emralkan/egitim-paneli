<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class LocalizationMiddleware
{
    public function handle($request, Closure $next)
    {
        $locale = session('locale', 'tr');

        $translations = $this->fetchTranslations($locale);
        $availableLanguages = $this->fetchAvailableLanguages();

        App::setLocale($locale);
        view()->share('translations', $translations);
        view()->share('availableLanguages', $availableLanguages);
        return $next($request);
    }

    private function fetchTranslations($locale)
    {
        $apiUrl = env('API_URL') . '/translations/' . $locale;
        $response = Http::get($apiUrl);

        if ($response->ok()) {
            return $response->json();
        } else {
            return [];
        }
    }

    private function fetchAvailableLanguages()
    {
        $apiUrl = env('API_URL') . '/languages';
        $response = Http::get($apiUrl);

        if ($response->ok()) {
            return $response->json();
        } else {
            return [];
        }
    }


}
