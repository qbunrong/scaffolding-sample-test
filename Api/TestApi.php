<?php

namespace Tests\Api;

trait TestApi
{
    protected $token = 'bearer token';

    protected function actingAsApiLeader()
    {
        $this->actingAs($this->users->leader());
        return $this;
    }

    protected function actingAsApiMember() {
        $this->actingAs($this->users->member());
        return $this;
    }

    protected function apiAuthHeader(): array
    {
        return [
            "Authorization' => 'Bearer $this->token"
        ];
    }
}
