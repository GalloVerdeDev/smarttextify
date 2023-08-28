<?php

namespace GalloVerdeDev\SmartTextify\Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use GalloVerdeDev\SmartTextify\Tests\TestCase;

class InstallPackageConfigTest extends TestCase
{
  /** @test */
  function the_install_command_copies_the_configuration()
  {
    // make sure we're starting from a clean state
    if (File::exists(config_path('smarttextify.php'))) {
      unlink(config_path('smarttextify.php'));
    }

    $this->assertFalse(File::exists(config_path('smarttextify.php')));

    Artisan::call('smarttextify:install');

    $this->assertTrue(File::exists(config_path('smarttextify.php')));
  }
}
