<?php

namespace App\Logging;

use Monolog\Formatter\NormalizerFormatter;

class DatabaseLogFormatter extends NormalizerFormatter
{
    /**
     * Formats a log record.
     *
     * @param  array  $record
     * @return array
     */
    public function format(array $record)
    {
        $record = parent::format($record);

        $extra = [
            'user_id'    => optional(request()->user())->id,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ];

        return array_merge($record, $extra);
    }
}
