<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    // use db transactions to prevent inserting test data to db during testing
    use DatabaseTransactions;

    public function getUserData()
    {
        return User::factory()->make()->toArray();
    }
}
