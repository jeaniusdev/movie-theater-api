<?php

namespace App\Http\Controllers;
use EchoLabs\Prism\Prism;
use EchoLabs\Prism\Enums\Provider;

use Illuminate\Http\Request;

class PrismController extends Controller
{
    public static function genAI() {
        $response = Prism::text()
            ->using(Provider::Anthropic, 'claude-3-sonnet-20240229')
            ->withPrompt('What is the highest-grossing movie theater in the United States of all time? Please provide the only the specific theater name, movie title, and total gross sales amount in US Dollars of the movie theater, along with its location.')
            ->generate();

        return $response->text;
    }
}
