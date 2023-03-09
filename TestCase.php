<?php

namespace Tests;

use Database\Seeders\CommonItemSaveSeeder;
use Database\Seeders\CommunityAffiliationSeeder;
use Database\Seeders\CommunitySeeder;
use Database\Seeders\ComponentItemLinkSeeder;
use Database\Seeders\ComponentSeeder;
use Database\Seeders\DeliverableReceivableCategorySeeder;
use Database\Seeders\DeliverySeeder;
use Database\Seeders\ItemSeeder;
use Database\Seeders\PersonalItemSaveSeeder;
use Database\Seeders\ReceiveSeeder;
use Database\Seeders\TemplateSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ValidationSeeder;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Helpers\TestServiceProvider;
use Illuminate\Contracts\Console\Kernel;
use Tests\Helpers\UserRoleProvider;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected UserRoleProvider $users;

    protected function setUp(): void {
        $this->users = new UserRoleProvider();

        parent::setUp();

        // $this->seed(ValidationSeeder::class);
        // $this->seed(ItemSeeder::class);
        // $this->seed(ComponentSeeder::class);
        // $this->seed(DeliverableReceivableCategorySeeder::class);
        // $this->seed(TemplateSeeder::class);
        // $this->seed(ComponentItemLinkSeeder::class);
        // $this->seed(DeliverySeeder::class);
        // $this->seed(ReceiveSeeder::class);
        // $this->seed(CommonItemSaveSeeder::class);
        // $this->seed(PersonalItemSaveSeeder::class);
        // $this->seed(UserSeeder::class);
        // $this->seed(CommunitySeeder::class);
        // $this->seed(CommunityAffiliationSeeder::class);
    }

    /**
     * Creates the application
     */
    public function createApplication() {
        $app = require __DIR__ . '/../bootstrap/app.php';
        $app->register(TestServiceProvider::class);
        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
