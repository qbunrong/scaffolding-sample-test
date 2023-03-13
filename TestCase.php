<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Helpers\UserRoleProvider;
use Tests\Traits\CreatesApplication;
use Tests\Traits\TestFeature;

use Database\Seeders\AdminSeeder;
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

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase, TestFeature;

    protected UserRoleProvider $users;
    protected string $joynet_api;

    protected function setUp(): void
    {
        $this->users = new UserRoleProvider();

        parent::setUp();

        $this->joynet_api = config('joynet.joynet_api');
        $this->seedTestingData();
    }

    public function seedTestingData(): void
    {
        $this->seed(ValidationSeeder::class);
        $this->seed(ItemSeeder::class);
        $this->seed(ComponentSeeder::class);
        $this->seed(DeliverableReceivableCategorySeeder::class);
        $this->seed(TemplateSeeder::class);
        $this->seed(ComponentItemLinkSeeder::class);
        $this->seed(DeliverySeeder::class);
        $this->seed(ReceiveSeeder::class);
        $this->seed(CommonItemSaveSeeder::class);
        $this->seed(PersonalItemSaveSeeder::class);
        $this->seed(UserSeeder::class);
        $this->seed(CommunitySeeder::class);
        $this->seed(CommunityAffiliationSeeder::class);
        $this->seed(AdminSeeder::class);
    }
}
