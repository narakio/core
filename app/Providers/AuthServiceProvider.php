<?php

namespace App\Providers;

use Naraki\Sentry\Contracts\User as UserInterface;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \Naraki\Sentry\Models\User::class => \App\Policies\User::class,
        \App\Models\Group::class => \App\Policies\Group::class,
        \Naraki\Blog\Models\BlogPost::class => \Naraki\Blog\Policies\BlogPost::class,
        \Naraki\System\Models\System::class => \Naraki\System\Policies\System::class,
        \Naraki\Media\Models\MediaEntity::class => \Naraki\Media\Policies\Media::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @param \Naraki\Sentry\Contracts\User|\Naraki\Sentry\Providers\User $userProvider
     * @return void
     */
    public function boot(UserInterface $userProvider)
    {
        \Auth::provider('CustomUserProvider', function () use ($userProvider) {
            return $userProvider;
        });

        foreach ($this->policies as $model => $policy) {
            Gate::policy($model, $policy);
        }

    }
}
