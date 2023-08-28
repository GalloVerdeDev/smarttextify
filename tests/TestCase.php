<?php

namespace GalloVerdeDev\SmartTextify\Tests;

use GalloVerdeDev\SmartTextify\SmartTextifyServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
  public function setUp(): void
  {
    parent::setUp();
    // additional setup
  }

  protected function getPackageProviders($app)
  {
    return [
      SmartTextifyServiceProvider::class,
    ];
  }

  protected function getEnvironmentSetUp($app)
  {
    // perform environment setup
  }
}
