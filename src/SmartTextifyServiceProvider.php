<?php

namespace GalloVerdeDev\SmartTextify;

use Illuminate\Support\ServiceProvider;
use GalloVerdeDev\SmartTextify\Console\OpenAITest;
use GalloVerdeDev\SmartTextify\Console\OpenAIModelList;
use GalloVerdeDev\SmartTextify\SmartTextEditor;
use GalloVerdeDev\SmartTextify\Console\InstallPackageConfig;

class SmartTextifyServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'smarttextify');

    $this->app->bind('smarttexteditor', function ($app) {
      return new SmartTextEditor();
    });
  }

  public function boot()
  {
    // AboutCommand::add('My Package', fn () => ['Version' => '1.0.0']);

    // Register the command if we are using the application via the CLI
    if ($this->app->runningInConsole()) {
      $this->commands([
        InstallPackageConfig::class,
        OpenAITest::class,
        OpenAIModelList::class,
      ]);

      $this->publishes([
        __DIR__ . '/../config/config.php' => config_path('smarttextify.php'),
      ], 'config');
    }
  }
}
