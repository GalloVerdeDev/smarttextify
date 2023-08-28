<?php

namespace GalloVerdeDev\SmartTextify\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallPackageConfig extends Command
{


  protected $signature = 'smarttextify:install';

  protected $description = 'Install assets of this SmartTextify Package';
  public function handle()
  {
    $this->info('Publishing configuration...');

    if (!$this->configExists('smarttextify.php')) {
      $this->info('Publishing configuration');
      $this->publishConfiguration();
      $this->info('Published configuration');
    } else {
      if ($this->shouldOverwriteConfig()) {
        $this->info('Overwriting configuration file...');
        $this->publishConfiguration($force = true);
      } else {
        $this->info('Existing configuration was not overwritten');
      }
    }

    $this->info('Installed SmartTextify');
  }

  private function configExists($fileName)
  {
    return File::exists(config_path($fileName));
  }

  private function shouldOverwriteConfig()
  {
    return $this->confirm(
      'Config file already exists. Do you want to overwrite it?',
      false
    );
  }

  private function publishConfiguration($forcePublish = false)
  {
    $params = [
      '--provider' => "GalloVerdeDev\SmartTextify\SmartTextifyServiceProvider",
      '--tag' => "config"
    ];

    if ($forcePublish === true) {
      $params['--force'] = true;
    }

    $this->call('vendor:publish', $params);
  }
}
