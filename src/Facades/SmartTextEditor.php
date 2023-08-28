<?php

namespace GalloVerdeDev\SmartTextify\Facades;

use Illuminate\Support\Facades\Facade;

class SmartTextEditor extends Facade
{

  protected static function getFacadeAccessor()
  {
    return 'smarttexteditor';
  }
}
