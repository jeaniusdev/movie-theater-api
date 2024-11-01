<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use EchoLabs\Prism\Prism;
use EchoLabs\Prism\Facades\PrismServer;

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
        PrismServer::register(
            'my-ai-model',
            fn () => Prism::text()
                ->using('anthropic', 'claude-3-sonnet-20240229')
                ->withSystemPrompt('You are a helpful assistant.')
        );
    }
}
