<?php

namespace Jochenkappel\SmartTextify\Console;

use Illuminate\Console\Command;
use OpenAI;


class OpenAIModelList extends Command
{
    protected $signature = 'smarttextify:get-openai-models';

    protected $description = 'Get all suported models';
    public function handle()
    {
        $myApiKey = config('smarttextify.api_key');
        $client   = OpenAI::client($myApiKey);

        // get all models
        $response = $client->models()->list();

        foreach ($response->data as $result) {
            $this->info($result->id);
        }
    }
}
