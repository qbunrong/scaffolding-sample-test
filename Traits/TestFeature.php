<?php

namespace Tests\Traits;

trait TestFeature
{
    // getting user as leader from seed data
    protected function actingAsApiLeader()
    {
        $this->actingAs($this->users->leader());
        return $this;
    }

    // getting user as member from seed data
    protected function actingAsApiMember()
    {
        $this->actingAs($this->users->member());
        return $this;
    }

    // create new user with no relation to community
    // user-access
    protected function actingAsApiUser()
    {
        $this->actingAs($this->users->newUser());
        return $this;
    }

    // create fresh new user with relation to community as leader/member
    // community-access
    protected function actingAsApiUserRole(string $role = 'leader')
    {
        $this->actingAs($this->users->newUserWithRole($role));
        return $this;
    }
}
