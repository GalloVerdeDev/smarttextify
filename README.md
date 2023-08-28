# SmartTextify

SmartTextify applies msart edits to your textx by using the OpenAI ChatGPT chat completion API.
It provides a set of convenience moethds to eaisly shorten, expand, etc your text.

## Introduction

SmartTextify offers these methods to edit your text

- **shorten**:
  shortens your text to 50%
- **expand**:
  expands your text by 50%
- **formallize**: use a more formal lnaguage
- **casualize**: use a more casual language
- **keywords**: extraxt a list of x keywords
- **summarize**: creates a summary
- **translate**: translates into another language
- **glossary**: extracts a list of all abbreviations together with their ong version

## Installation

Install SmartTextify with [composer](https://getcomposer.org/doc/00-intro.md):

```
composer require galloverdedev/smart-textify
```

## Configuration

You need to provide your [OpenAI Access Key](https://openai.com/product) in your .env file like

```
ST_OPENAI_API_KEY = 'mykey'
```

To you get hold of SmartTextifys config file you need to run this command:

```php
php artisan smarttextify:install
```

This will put a smarttextify.php configuration file in your config folder.

Here's what you may adjust:

```php
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
```

## Test

Run tests via composer

```
composer test
```

## Usage

Using the Facade

```php
use GalloVerdeDev\SmartTextify\Facades\SmartTextEditor;

...

$textsample = 'Excepteur fugiat tempor nisi esse tempor proident excepteur ea enim esse aliqua. Minim dolore adipisicing culpa enim nulla aliquip deserunt enim sint. Aute cillum incididunt eu dolor sint qui ut elit ea qui qui aliqua in consectetur.';

$shortText = SmartTextEditor::shorten($textsample);

$expandedText = SmartTextEditor::expand($textsample);

$summary = SmartTextEditor::summarize($textsample);

$formalText = SmartTextEditor::formalize($textsample);

$casualText = SmartTextEditor::casualize($textsample);

$keywordlist = SmartTextEditor::keywords($textsample, 3);

$translatedText = SmartTextEditor::translate($textsample, 'latin', 'german');

$glossary = SmartTextEditor::glossary($textsample);

```
