<?php

use Illuminate\Support\Str;

const MYSQL = 'mysql';
const DATABASE_URL = 'DATABASE_URL';
const DATABASE = 'database';
const DB_DATABASE = 'DB_DATABASE';
const PREFIX = 'prefix';
const HOST_127_0_0_1 = '127.0.0.1';
const DB_HOST = 'DB_HOST';
const DB_PORT = 'DB_PORT';
const FORGE = 'forge';
const DB_USERNAME = 'DB_USERNAME';
const USERNAME = 'username';
const PASSWORD = 'password';
const DB_PASSWORD = 'DB_PASSWORD';
const CHARSET = 'charset';
const PREFIX_INDEXES = 'prefix_indexes';

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', MYSQL),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            DRIVER => 'sqlite',
            'url' => env(DATABASE_URL),
            DATABASE => env(DB_DATABASE, database_path('database.sqlite')),
            PREFIX => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        MYSQL => [
            DRIVER => MYSQL,
            'url' => env(DATABASE_URL),
            'host' => env(DB_HOST, HOST_127_0_0_1),
            'port' => env(DB_PORT, '3306'),
            DATABASE => env(DB_DATABASE, FORGE),
            USERNAME => env(DB_USERNAME, FORGE),
            PASSWORD => env(DB_PASSWORD, ''),
            'unix_socket' => env('DB_SOCKET', ''),
            CHARSET => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            PREFIX => '',
            PREFIX_INDEXES => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            DRIVER => 'pgsql',
            'url' => env(DATABASE_URL),
            'host' => env(DB_HOST, HOST_127_0_0_1),
            'port' => env(DB_PORT, '5432'),
            DATABASE => env(DB_DATABASE, FORGE),
            USERNAME => env(DB_USERNAME, FORGE),
            PASSWORD => env(DB_PASSWORD, ''),
            CHARSET => 'utf8',
            PREFIX => '',
            PREFIX_INDEXES => true,
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            DRIVER => 'sqlsrv',
            'url' => env(DATABASE_URL),
            'host' => env(DB_HOST, 'localhost'),
            'port' => env(DB_PORT, '1433'),
            DATABASE => env(DB_DATABASE, FORGE),
            USERNAME => env(DB_USERNAME, FORGE),
            PASSWORD => env(DB_PASSWORD, ''),
            CHARSET => 'utf8',
            PREFIX => '',
            PREFIX_INDEXES => true,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            PREFIX => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', HOST_127_0_0_1),
            PASSWORD => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            DATABASE => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', HOST_127_0_0_1),
            PASSWORD => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            DATABASE => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];
