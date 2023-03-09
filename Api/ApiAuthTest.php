<?php

namespace Tests\Api;

use Tests\TestCase;

class DeliveryCategoryTest extends TestCase
{
    use TestApi;

    protected $endpoint = "api/deliveries/categories";

    public function test_requests_succeed_with_leader_role()
    {
        $this->actingAsApiLeader();

        $res = $this->get($this->endpoint);
        $res->assertStatus(200);
    }

    public function test_requests_failed_with_member_role()
    {
        $this->actingAsApiMember();

        $res = $this->get($this->endpoint);
        $res->assertStatus(403);
    }

    public function test_no_token_throws_error()
    {
        $res = $this->get($this->endpoint);
        $res->assertStatus(401);
    }

    public function test_bad_token_format_throws_error()
    {
        $res = $this->get($this->endpoint, ['Authorization' => 'Token in valid format 123']);
        $res->assertStatus(401);
    }

    // public function test_token_expiry_checked(){}

}
