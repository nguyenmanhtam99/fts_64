<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\SocialAccountService;
use Socialite;

class SocialAuthController extends Controller
{
    /**
     * [$socialAccountService description]
     * @var [type]
     */
    private $socialAccountService;

    public function __construct(SocialAccountService $socialAccountService)
    {
        $this->socialAccountService = $socialAccountService;
    }

    /**
     * [redirect description]
     * @param  [type] $provider [description]
     * @return [type]           [description]
     */
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * [callback description]
     * @param  SocialAccountService $service  [description]
     * @param  [type]               $provider [description]
     * @return function                       [description]
     */
    public function callback($provider)
    {
        $user = $this->socialAccountService->createOrGetUser(Socialite::driver($provider));

        auth()->login($user);

        return redirect()->to('/');
    }
}
