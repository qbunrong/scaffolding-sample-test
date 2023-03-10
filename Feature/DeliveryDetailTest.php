<?php

namespace Tests\Feature;

use Tests\TestCase;

class DeliveryDetailTest extends TestCase
{
    use TestApi;

    protected $endpoint = "api/deliveries/ids/8";

    public function test_requests_succeed_with_leader_role()
    {
        config(['app.env' => 'testing']);

        $this->actingAsApiLeader();

        $res = $this->get($this->endpoint);

        $res->assertStatus(200);
    }
}
