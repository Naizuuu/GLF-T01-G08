<?php

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;

const STACK = 'stack';
const SINGLE = 'single';
const LOGS_LARAVEL_LOG = 'logs/laravel.log';
const LEVEL = 'level';
const DEBUG = 'debug';
const MONOLOG = 'monolog';
const HANDLER = 'handler';
const LOG_LEVEL = 'LOG_LEVEL';

return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that gets used when writing
    | messages to the logs. The name specified in this option should match
    | one of the channels defined in the "channels" configuration array.
    |
    */

    'default' => env('LOG_CHANNEL', STACK),

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog",
    |                    "custom", "stack"
    |
    */

    'channels' => [
        STACK => [
            DRIVER => STACK,
            'channels' => [SINGLE],
            'ignore_exceptions' => false,
        ],

        SINGLE => [
            DRIVER => SINGLE,
            'path' => storage_path(LOGS_LARAVEL_LOG),
            LEVEL => env(LOG_LEVEL, DEBUG),
        ],

        'daily' => [
            DRIVER => 'daily',
            'path' => storage_path(LOGS_LARAVEL_LOG),
            LEVEL => env(LOG_LEVEL, DEBUG),
            'days' => 14,
        ],

        'slack' => [
            DRIVER => 'slack',
            'url' => env('LOG_SLACK_WEBHOOK_URL'),
            'username' => 'Laravel Log',
            'emoji' => ':boom:',
            LEVEL => env(LOG_LEVEL, 'critical'),
        ],

        'papertrail' => [
            DRIVER => MONOLOG,
            LEVEL => env(LOG_LEVEL, DEBUG),
            HANDLER => SyslogUdpHandler::class,
            'handler_with' => [
                'host' => env('PAPERTRAIL_URL'),
                'port' => env('PAPERTRAIL_PORT'),
            ],
        ],

        'stderr' => [
            DRIVER => MONOLOG,
            HANDLER => StreamHandler::class,
            'formatter' => env('LOG_STDERR_FORMATTER'),
            'with' => [
                'stream' => 'php://stderr',
            ],
        ],

        'syslog' => [
            DRIVER => 'syslog',
            LEVEL => env(LOG_LEVEL, DEBUG),
        ],

        'errorlog' => [
            DRIVER => 'errorlog',
            LEVEL => env(LOG_LEVEL, DEBUG),
        ],

        'null' => [
            DRIVER => MONOLOG,
            HANDLER => NullHandler::class,
        ],

        'emergency' => [
            'path' => storage_path(LOGS_LARAVEL_LOG),
        ],
    ],

];
