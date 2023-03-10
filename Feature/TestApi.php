<?php

namespace Tests\Feature;

trait TestApi
{
    protected function actingAsApiLeader()
    {
        $this->actingAs($this->users->leader());
        return $this;
    }

    protected function actingAsApiMember()
    {
        $this->actingAs($this->users->member());
        return $this;
    }
}
