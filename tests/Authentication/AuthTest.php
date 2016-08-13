<?php

    use Illuminate\Foundation\Testing\WithoutMiddleware;
    use Illuminate\Foundation\Testing\DatabaseMigrations;
    use Illuminate\Foundation\Testing\DatabaseTransactions;

    class AuthTest extends TestCase
    {
        use DatabaseTransactions;
        /**
         * @test
         *
         * Test: POST /authenticate.
         */
        public function it_authenticate_a_user()
        {
            $user = factory(App\User::class)->create(['password' => bcrypt('foo')]);

            $this->post('/authenticate', ['email' => $user->email, 'password' => 'foo'])
                ->seeJsonStructure(['token']);
        }
    }
