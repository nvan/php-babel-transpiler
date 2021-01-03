<?php

namespace nvan\BabelTranspiler;

final class TranspileException extends \Exception
{
    protected $message = 'Could not transpile, make sure Babel is installed and the directory is set properly.';
}
