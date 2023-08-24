<?php

namespace Jochenkappel\SmartTextify\Tests;

use Jochenkappel\SmartTextify\Facades\SmartTextEditor;
use Jochenkappel\SmartTextify\SmartTextifyServiceProvider;

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
