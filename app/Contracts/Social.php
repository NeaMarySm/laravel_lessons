<?php
namespace App\Contracts;

use Laravel\Socialite\Contracts\User As SocialContract;

interface Social
{
    public function authUser(SocialContract $socialUser): string;
}