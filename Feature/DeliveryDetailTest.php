<?php

namespace Tests\Feature;

use Tests\TestCase;

class DeliveryDetailTest extends TestCase
{
    protected $endpoint = "api/deliveries/ids/8";

    public function testRequestsSucceedWithLeaderRole()
    {
        config(['app.env' => 'testing']);

        $this->actingAsApiLeader();

        $res = $this->get($this->endpoint);

        $res->assertStatus(200);
    }
}
