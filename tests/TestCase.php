<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function admin(array $overrides = []): User
    {
        $admin = $this->user($overrides);
        /* $admin->roles()->attach(
            Role::factory()->admin()->create()
        ); */

        return $admin;
    }

    /**
     * Return an user
     *
     * @return User
     */
    protected function user(array $overrides = []): User
    {
        return User::factory()->create($overrides);
    }

    /**
     * Acting as an admin
     */
    protected function actingAsAdmin()
    {
        $this->actingAs($this->admin());

        return $this;
    }

    /**
     * Acting as an user
     */
    protected function actingAsUser($api = null)
    {
        $this->actingAs($this->user(), $api);

        return $this;
    }
}
