<?php

declare(strict_types=1);

namespace AndrewGos\DoubleGis\Http\Stream;

use RuntimeException;
use Throwable;

final class Utils
{
    /**
     * Safely gets the contents of a given stream.
     *
     * When stream_get_contents fails, PHP normally raises a warning. This
     * function adds an error handler that checks for errors and throws an
     * exception instead.
     *
     * @param resource $stream
     *
     * @throws RuntimeException if the stream cannot be read
     */
    public static function tryGetContents($stream): string
    {
        $ex = null;
        set_error_handler(static function (int $errno, string $errstr) use (&$ex): bool {
            $ex = new RuntimeException(
                sprintf(
                    'Unable to read stream contents: %s',
                    $errstr,
                ),
            );

            return true;
        });

        try {
            /** @var string|false $contents */
            $contents = stream_get_contents($stream);

            if ($contents === false) {
                $ex = new RuntimeException('Unable to read stream contents');
            }
        } catch (Throwable $e) {
            $ex = new RuntimeException(
                sprintf(
                    'Unable to read stream contents: %s',
                    $e->getMessage(),
                ),
                0,
                $e,
            );
        }

        restore_error_handler();

        if ($ex) {
            throw $ex;
        }

        return $contents;
    }
}
