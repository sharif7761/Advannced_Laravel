<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemberPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function premiumMembersOnly($user)
    {
        if($user->premium_member == User::PREMIUM_MEMBER) {
            return true;
        } else {
            return false;
        }
    }

}
