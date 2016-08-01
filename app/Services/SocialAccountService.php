<?php

namespace App\Services;

use Laravel\Socialite\Contracts\Provider;
use App\Models\Social;
use App\Models\User;
use App\Repositories\User\UserRepository;
use App\Repositories\Social\SocialRepository;
use App\Services\BaseService;

class SocialAccountService extends BaseService
{

    protected $userRepository;
    protected $socialRepository;

    /**
     * [__construct description]
     */
    public function __construct(UserRepository $userRepository, SocialRepository $socialRepository)
    {
        parent::__construct();
        $this->userRepository = $userRepository;
        $this->socialRepository = $socialRepository;
    }

    /**
     * [createOrGetUser description]
     * @param  Provider $provider [description]
     * @return [type]             [description]
     */
    public function createOrGetUser(Provider $provider)
    {
        $providerUser = $provider->user();
        $providerName = class_basename($provider);

        $account = $this->socialRepository->whereSocial_user_id($providerName)
            ->whereType_social($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        }

        $account = $this->socialRepository->social_create(['social_user_id' => $providerUser->getId(), 'type_social' => $providerName]);
        $user = $this->userRepository->whereEmail($providerUser->getEmail())->first();

        if (!$user) {
            $user = $this->userRepository->user_create(['emai' => $providerUser->getEmail(), 'name' => $providerUser->getName()]);
        }

        $account->user()->associate($user);
        $account->save();

        return $user;

    }
}
