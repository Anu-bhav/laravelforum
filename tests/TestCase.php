<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    // Defining the connection to be used for phpunit tests
    public function setUp(): void
    {
        parent::setUp();

        $this->app['config']->set('database.default', 'sqlite_testing');
        $this->app['config']->set('database.connections.sqlite_testing', [
            'driver' => 'sqlite',
            'database' => ':memory:', // In Memory Sqlite Database created for phpunit tests
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ]);

    }
}
