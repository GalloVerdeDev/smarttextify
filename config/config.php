<?php

return [
    // Your OpenAI API key
    'api_key' => env('ST_OPENAI_API_KEY'),
    // The chat model to be used
    'chat_model' => 'gpt-3.5-turbo-16k-0613',
    // Sample temperatire (between 0=strict and 2=innovative)
    'sample_temperature' => 0.5,
    // The maximum number of input and output tokens per request
    'max_tokens' => 2048,
];
