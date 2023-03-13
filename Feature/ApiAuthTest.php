<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiAuthTest extends TestCase
{
    protected $endpoint = "api/deliveries/categories";

    public function testRequestsSucceedWithLeaderRole()
    {
        $this->actingAsApiLeader();

        $res = $this->get($this->endpoint);
        $res->assertStatus(200);
    }

    public function testRequestsFailedWithMemberRole()
    {
        $this->actingAsApiMember();

        $res = $this->get($this->endpoint);
        $res->assertStatus(403);
    }

    public function testNoTokenThrowsError()
    {
        $res = $this->get($this->endpoint);
        $res->assertStatus(401);
    }

    public function testBadTokenTormatThrowsError()
    {
        $res = $this->get($this->endpoint, ['Authorization' => 'Token in valid format 123']);
        $res->assertStatus(401);
    }
}
