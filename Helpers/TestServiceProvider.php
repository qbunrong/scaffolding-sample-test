<?php

namespace Tests\Helpers;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\ParallelTesting;

class TestServiceProvider extends ServiceProvider
{
    public function boot()
    {
        ParallelTesting::setUpTestDatabase(function ($database, $token) {
            Artisan::call("db:seed --class=ValidationSeeder");
            Artisan::call("db:seed --class=ItemSeeder");
            Artisan::call("db:seed --class=ComponentSeeder");
            Artisan::call("db:seed --class=DeliverableReceivableCategorySeeder");
            Artisan::call("db:seed --class=TemplateSeeder");
            Artisan::call("db:seed --class=ComponentItemLinkSeeder");
            Artisan::call("db:seed --class=ReceiveSeeder");
            Artisan::call("db:seed --class=DeliverySeeder");
            Artisan::call("db:seed --class=PersonalItemSaveSeeder");
            Artisan::call("db:seed --class=UserSeeder");
            Artisan::call("db:seed --class=CommunitySeeder");
            Artisan::call("db:seed --class=CommunityAffiliationSeeder");
        });
    }
}
