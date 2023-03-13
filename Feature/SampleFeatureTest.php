<?php

namespace Tests\Feature;

use Tests\TestCase;

class SampleFeatureTest extends TestCase
{
    protected $endpoint1 = "api/deliveries/categories"; // community-access
    protected $endpoint2 = "api/deliveries/ids/8"; // community-access
    protected $endpoint3 = "api/users/me"; // user-access
    protected $endpoint4 = "api/component_item/delivery/todo"; // no middleware/guard

    public function testRequestsSucceedWithLeaderRole()
    {
        $this->actingAsApiLeader();

        $res = $this->get($this->endpoint1);
        $res->assertStatus(200);
    }

    public function testRequestsFailedWithMemberRole()
    {
        $this->actingAsApiMember();

        $res = $this->get($this->endpoint1);
        $res->assertStatus(403);
    }

    public function testNoTokenThrowsError()
    {
        $res = $this->get($this->endpoint1);
        $res->assertStatus(401);
    }

    public function testBadTokenTormatThrowsError()
    {
        $res = $this->get($this->endpoint1, ['Authorization' => 'Token in valid format 123']);
        $res->assertStatus(401);
    }

    public function testRequestsAsCommunityLeader()
    {
        $this->actingAsApiUserRole();
        $res = $this->get($this->endpoint1);
        $res->assertStatus(200);
    }

    public function testRequestsAsCommunityMember()
    {
        $this->actingAsApiUserRole('member');
        $res = $this->get($this->endpoint1);
        $res->assertStatus(403);
    }

    public function testRequestAsUsers()
    {
        $this->actingAsApiUser();
        $res = $this->get($this->endpoint3);
        $res->assertStatus(200);
    }

    public function testGetGcsPathFromFixtures()
    {
        config(['app.env' => 'testing']);

        $this->actingAsApiLeader();

        $res = $this->get($this->endpoint2);

        $res->assertStatus(200);
    }

    public function testRequestsPublicApi()
    {
        $res = $this->get($this->endpoint4);
        $res->assertStatus(200);
    }
}
