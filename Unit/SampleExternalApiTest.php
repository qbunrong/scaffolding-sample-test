<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Http;
use App\Helpers\RequestHelper;
use Tests\TestCase;

class SampleExternalApiTest extends TestCase
{
    public function testGetMenuBbqs()
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
