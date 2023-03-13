<?php

namespace Tests\Helpers;

use App\Models\User;

class UserRoleProvider
{
    protected ?User $leader = null;
    protected ?User $member = null;

    public function leader(): User
    {
        if (is_null($this->leader)) {
            $this->leader = User::getUserRole('leader');
        }
        return $this->leader;
    }

    public function member(): User
    {
        if (is_null($this->member)) {
            $this->member = User::getUserRole('member');
        }
        return $this->member;
    }
}
