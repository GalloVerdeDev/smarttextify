<?php

namespace GalloVerdeDev\SmartTextify\Tests\Unit;

use GalloVerdeDev\SmartTextify\Facades\SmartTextEditor;
use GalloVerdeDev\SmartTextify\Tests\TestCase;

class SmartTextEditorTest extends TestCase
{
  public string $textSample = 'The contaminated sites management is a process that has different speeds in Member States. This is due partly to differences in legislation that would mean different definitions as for making some examples “potentially contaminated sites”, “contaminated sites”, “remediated sites”. For this reason, the European Commission-JRC launched an initiative with EEA-EIONET network to find common definitions and a survey in MS in 2018 that resulted in defining 6 site statuses.';

  /** @test */
  function it_can_shorten_a_text()
  {
    $outText  = SmartTextEditor::shorten($this->textSample);
    $this->assertLessThan(2 * strlen($this->textSample) / 3, strlen($outText));
  }

  /** @test */
  function it_can_expand_a_text()
  {
    $outText  = SmartTextEditor::expand($this->textSample);
    $this->assertGreaterThan(strlen($this->textSample), strlen($outText));
  }
  /** @test */
  function it_can_formalize_a_text()
  {
    $outText  = SmartTextEditor::formalize($this->textSample);
    $this->assertNotEquals($this->textSample, $outText);
  }
  /** @test */
  function it_can_casualize_a_text()
  {
    $outText  = SmartTextEditor::casualize($this->textSample, 3);
    $this->assertNotEquals($this->textSample, $outText);
  }
  /** @test */
  function it_can_get_keywords_from_a_text()
  {
    $outText  = SmartTextEditor::keywords($this->textSample, 3);
    $this->assertNotEquals($this->textSample, $outText);
  }
  /** @test */
  function it_can_summarize_a_text()
  {
    $outText  = SmartTextEditor::summarize($this->textSample);
    $this->assertNotEquals($this->textSample, $outText);
  }
  /** @test */
  function it_can_translate_a_text()
  {
    $outText  = SmartTextEditor::translate($this->textSample, 'english', 'german');
    $this->assertNotEquals($this->textSample, $outText);
  }
  /** @test */
  function it_can_build_a_glossary()
  {
    $outText  = SmartTextEditor::glossary($this->textSample);
    $this->assertNotEquals($this->textSample, $outText);
  }
}
