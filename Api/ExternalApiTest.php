<?php

namespace Tests\Api;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ExternalApiTest extends TestCase
{
    use TestApi;

    protected $endpoint = "api/deliveries/categories";

    public function test_get_gcs_temporary_url()
    {
        $body = file_get_contents(base_path('tests/Fixtures/Helpers/menu_bbqs.json'));
        Http::fake([
            'http:/externalapi_test.com/menu' => Http::response($body, 200),
        ]);

        $this->assertOk();
    }
}
