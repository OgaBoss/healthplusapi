<?php

    use Illuminate\Foundation\Testing\WithoutMiddleware;
    use Illuminate\Foundation\Testing\DatabaseTransactions;

    class UsersTest extends TestCase
    {
        use DatabaseTransactions;
        use WithoutMiddleware;

        /**
         * @test
         *
         * Test: POST /api/v1/user
         */
        public function it_should_create_a_user_and_attach_to_entity()
        {
            $data = [
                'entity_id' => 3,
                'entity_type_id' => 1,
                'entity_name' => 'hmo',
                'role_id' => 1,
                'first_name' => 'Sally',
                'last_name' => 'Faker',
                'email' => 'faker@email.com',
                'password' => bcrypt(str_random(10)),
                'remember_token' => str_random(10),
                'activated' => 0
            ];

            $this->post('/api/v1/user', $data)
                ->seeJson(['success' => 'User Attached']);
        }
    }
