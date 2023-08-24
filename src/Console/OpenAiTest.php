<?php

namespace Jochenkappel\SmartTextify\Console;

use Illuminate\Console\Command;
use OpenAI;


class OpenAITest extends Command
{
    protected $signature = 'smarttextify:test-openai {instruction : what do you want AI to do to our samepl text?}';

    protected $description = 'Basic connectivity check';
    public function handle()
    {
        $myApiKey   = config('smarttextify.api_key');
        $client     = OpenAI::client($myApiKey);
        $textsample = "The Network's objective is to create the necessary impetus in the European Union to make progress on ensuring a more effective application of environmental legislation. The core of IMPEL’s activities take place within a project structure and concern awareness raising, capacity building, peer review, exchange of information and experiences on implementation, international enforcement collaboration as well as promoting and supporting the practicability and enforceability of European environmental legislation.";

        $this->info('Textsample: ' . $textsample);
        $this->newLine(2);
        // create a completion
        $response = $client->chat()->create([
            'model' => config('smarttextify.chat_model'),
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You will be provided with a text, and your task is to ' . $this->argument('instruction'),
                ],
                [
                    'role' => 'user',
                    'content' => $textsample
                ],
            ],
            'temperature' => (float) config('smarttextify.sample_temperature') ?? 1
        ]);

        foreach ($response->choices as $result) {
            $this->info($result->message->content);
        }
    }
}
