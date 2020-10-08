<?php

const D_EFAULT = 'default';
const QUEUE = 'queue';
const RETRY_AFTER = 'retry_after';

return [

    /*
    |--------------------------------------------------------------------------
    | Default Queue Connection Name
    |--------------------------------------------------------------------------
    |
    | Laravel's queue API supports an assortment of back-ends via a single
    | API, giving you convenient access to each back-end using the same
    | syntax for every one. Here you may define a default connection.
    |
    */

    D_EFAULT => env('QUEUE_CONNECTION', 'sync'),

    /*
    |--------------------------------------------------------------------------
    | Queue Connections
    |--------------------------------------------------------------------------
    |
    | Here you may configure the connection information for each server that
    | is used by your application. A default configuration has been added
    | for each back-end shipped with Laravel. You are free to add more.
    |
    | Drivers: "sync", "database", "beanstalkd", "sqs", "redis", "null"
    |
    */

    'connections' => [

        'sync' => [
            DRIVER => 'sync',
        ],

        DATABASE => [
            DRIVER => DATABASE,
            'table' => 'jobs',
            QUEUE => D_EFAULT,
            RETRY_AFTER => 90,
        ],

        'beanstalkd' => [
            DRIVER => 'beanstalkd',
            'host' => 'localhost',
            QUEUE => D_EFAULT,
            RETRY_AFTER => 90,
            'block_for' => 0,
        ],

        'sqs' => [
            DRIVER => 'sqs',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'prefix' => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'),
            QUEUE => env('SQS_QUEUE', 'your-queue-name'),
            'suffix' => env('SQS_SUFFIX'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
        ],

        'redis' => [
            DRIVER => 'redis',
            'connection' => D_EFAULT,
            QUEUE => env('REDIS_QUEUE', D_EFAULT),
            RETRY_AFTER => 90,
            'block_for' => null,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Failed Queue Jobs
    |--------------------------------------------------------------------------
    |
    | These options configure the behavior of failed queue job logging so you
    | can control which database and table are used to store the jobs that
    | have failed. You may change them to any database / table you wish.
    |
    */

    'failed' => [
        DRIVER => env('QUEUE_FAILED_DRIVER', 'database-uuids'),
        DATABASE => env('DB_CONNECTION', 'mysql'),
        'table' => 'failed_jobs',
    ],

];
