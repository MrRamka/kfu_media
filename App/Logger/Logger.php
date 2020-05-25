<?php

namespace App\Logger;

use App\App;
use App\Model\Log;

class Logger
{
    const LEVEL_ERROR = 1;
    const LEVEL_WARNING = 2;
    const LEVEL_INFO = 3;
    const LEVEL_DEBUG = 4;


    /**
     * Adds new record to log
     * @param string $message
     * @param int $level
     */
    private function add(string $message, int $level = self::LEVEL_DEBUG): void
    {
        Log::insert(['message' => $message, 'level' => $level, 'datetime' => date("Y-m-d H:i:s")]);
    }

    /**
     * Adds new record to log with error level
     * @param string $message
     * @param int $level
     */
    public function error(string $message): void
    {
        $this->add($message, self::LEVEL_ERROR);
    }

    /**
     * Adds new record to log with warning level
     * @param string $message
     * @param int $level
     */
    public function warning(string $message): void
    {
        $this->add($message, self::LEVEL_WARNING);
    }

    /**
     * Adds new record to log with info level
     * @param string $message
     * @param int $level
     */
    public function info(string $message): void
    {
        $this->add($message, self::LEVEL_INFO);
    }

    /**
     * Adds new record to log with debug level
     * @param string $message
     * @param int $level
     */
    public function debug(string $message): void
    {
        $this->add($message, self::LEVEL_DEBUG);
    }

    public static function level(int $level): string
    {
        switch ($level) {
            case 1:
                return 'ERROR';
            case 2:
                return 'WARNING';
            case 3:
                return 'INFO';
            case 4:
            default:
                return 'DEBUG';
        }
    }

    public static function levelStyled(int $level): string
    {
        switch ($level) {
            case 1:
                return '<span class="log-error">ERROR</span>';
            case 2:
                return '<span class="log-warning">WARNING</span>';
            case 3:
                return '<span class="log-info">INFO</span>';
            case 4:
            default:
                return '<span class="log-debug">DEBUG</span>';
        }
    }
}