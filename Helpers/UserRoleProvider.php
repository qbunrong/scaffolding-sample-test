<?php

namespace Tests\Helpers;

use App\Models\Community;
use App\Models\CommunityAffiliation;
use App\Models\User;

class UserRoleProvider
{
    protected ?User $leader = null;
    protected ?User $member = null;

    public function leader(): User
    {
        if(is_null($this->leader)) {
            $this->leader = User::getSystemRole('leader');
        }
        return $this->leader;
    }

    public function member(): User {
        if(is_null($this->member)) {
            $this->member = User::getSystemRole('member');
        }
        return $this->member;
    }
}
