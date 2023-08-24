<?php

namespace Jochenkappel\SmartTextify\Console;

use Illuminate\Console\Command;
use Jochenkappel\SmartTextify\Facades\SmartTextEditor;

class OpenAITest extends Command
{
    protected $signature = 'smarttextify:test-openai {instruction : what do you want AI to do to our sampel text? shorten|expand|gloassry|...}';

    protected $description = 'Try the smart textify editor';
    public function handle()
    {
        $textsample = "The Network's objective is to create the necessary impetus in the European Union to make progress on ensuring a more effective application of environmental legislation. The core of IMPEL’s activities take place within a project structure and concern awareness raising, capacity building, peer review, exchange of information and experiences on implementation, international enforcement collaboration as well as promoting and supporting the practicability and enforceability of European environmental legislation.";

        $this->info('Textsample: ' . $textsample);
        $this->newLine(2);
        // create a completion
        $ste     = new SmartTextEditor();
        $method = $this->argument('instruction');
        $outText = call_user_func(SmartTextEditor::class . '::' . $method, $textsample);
        $this->info($outText);
    }
}
