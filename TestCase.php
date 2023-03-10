<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Helpers\TestServiceProvider;
use Illuminate\Contracts\Console\Kernel;
use Tests\Helpers\UserRoleProvider;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected UserRoleProvider $users;
    protected string $joynet_api;

    protected function setUp(): void
    {
        $this->users = new UserRoleProvider();

        parent::setUp();

        $this->joynet_api = config('joynet.joynet_api');
    }

    /**
     * Creates the application
     */
    public function createApplication()
    {
        $app = require __DIR__ . '/../bootstrap/app.php';
        $app->register(TestServiceProvider::class);
        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
