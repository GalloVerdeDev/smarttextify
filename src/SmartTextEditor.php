<?php

namespace GalloVerdeDev\SmartTextify;

use OpenAI;


class SmartTextEditor
{

  private $apiClient;
  private string $chatModel;
  private float $sampleTemperature;
  private int $maxTokens;

  public function __construct()
  {
    $apiKey = config('smarttextify.api_key');
    $this->apiClient = OpenAI::client($apiKey);

    $this->chatModel = config('smarttextify.chat_model');
    $this->sampleTemperature = (float) config('smarttextify.sample_temperature') ?? 1;
    $this->maxTokens = (int) config('smarttextify.max_tokens') ?? 2048;
  }

  private function getChatCompletion(string $instruction, string $text): string
  {
    $response = $this->apiClient->chat()->create([
      'model' => $this->chatModel,
      'messages' => [
        [
          'role' => 'system',
          'content' => $instruction,
        ],
        [
          'role' => 'user',
          'content' => $text
        ],
      ],
      'temperature' => $this->sampleTemperature,
      'max_tokens' => $this->maxTokens,
    ]);

    // foreach ($response->choices as $result) {
    //     $this->info($result->message->content);
    return $response->choices[0]->message->content;
  }

  public function shorten(string $text): string
  {
    $instruction = 'You will be provided with a text, and your task is to shorten it to half of its length';
    $shortText = $this->getChatCompletion($instruction, $text);
    return $shortText;
  }
  public function expand(string $text): string
  {
    $instruction = 'You will be provided with a text, and your task is to expand it by half of its length';
    $expandedText = $this->getChatCompletion($instruction, $text);
    return $expandedText;
  }
  public function formalize(string $text): string
  {
    $instruction = 'You will be provided with a text, and your task is to use a more formal language';
    $formalText = $this->getChatCompletion($instruction, $text);
    return $formalText;
  }
  public function casualize(string $text): string
  {
    $instruction = 'You will be provided with a text, and your task is to use a more causal language';
    $casualText = $this->getChatCompletion($instruction, $text);
    return $casualText;
  }
  public function keywords(string $text, string $numberOfKeywords): string
  {
    $instruction = 'You will be provided with a text, and your task is to extract a list of the ' . $numberOfKeywords . ' most important keywords from it';
    $keywords = $this->getChatCompletion($instruction, $text);
    return $keywords;
  }
  public function summarize(string $text): string
  {
    $instruction = 'You will be provided with a text, and your task is to summarize it for a non-adiminstrative audience';
    $summary = $this->getChatCompletion($instruction, $text);
    return $summary;
  }
  public function translate(string $text, string $fromLanguage, string $toLanguage): string
  {
    $instruction = 'You will be provided with a ' . $fromLanguage . ' text, and your task is to translate it into ' . $toLanguage;
    $translation = $this->getChatCompletion($instruction, $text);
    return $translation;
  }
  public function glossary(string $text): string
  {
    $instruction = 'You will be provided with a text and your task is to provide a glossary for all abbreviatons';
    $glossary = $this->getChatCompletion($instruction, $text);
    return $glossary;
  }
}
