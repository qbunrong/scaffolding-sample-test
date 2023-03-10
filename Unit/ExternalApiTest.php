<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Http;
use App\Helpers\RequestHelper;
use Tests\TestCase;

class ExternalApiTest extends TestCase
{
    public function test_get_menu_bbqs()
    {
        config(['joynet.token' => 'test']);

        $body = file_get_contents(base_path('tests/Fixtures/Helpers/menu_bbqs.json'));
        Http::fake([
            $this->joynet_api . "/*" => Http::response($body, 200),
        ]);

        $this->assertEquals(
            json_decode($body, true),
            RequestHelper::menu_bbqs()
        );
    }
}
