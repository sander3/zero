<?php

namespace App\Logging;

use App\Log;
use Monolog\Handler\AbstractProcessingHandler;

class DatabaseLogHandler extends AbstractProcessingHandler
{
    /**
     * Writes the record down to the log of the implementing handler.
     *
     * @param  array  $record
     * @return void
     */
    protected function write(array $record)
    {
        Log::create($record['formatted']);
    }

    /**
     * Gets the default formatter.
     *
     * @return FormatterInterface
     */
    protected function getDefaultFormatter()
    {
        return new DatabaseLogFormatter;
    }
}
