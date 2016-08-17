<?php

    /**
     * Created by PhpStorm.
     * User: OluwadamilolaAdebayo
     * Date: 8/12/16
     * Time: 11:58 PM
     */
    namespace App\Transformers;

    use App\User;
    use League\Fractal\TransformerAbstract;

    class UserTransformer extends TransformerAbstract {
        /**
         * List of resources possible to include
         *
         * @var array
         */
        protected $defaultIncludes = [
            'role',
            'entity',
            'hmo'
        ];

        /**
         * @param User $user
         * @return array
         */
        public function transform(User $user){
            return[
                'user_id'   => (int) $user->id,
                'email'     => $user->email,
                'name'      => $user->first_name." ".$user->last_name,
                'account_status'    => $user->activated,
                'date_joined'       => $user->date_activated
            ];
        }

        /**
         * @param User $user
         * @return \League\Fractal\Resource\Item
         */
        public function includeRole(User $user){
            return $this->item($user->role, new RoleTransformer);
        }

        /**
         * @param User $user
         * @return \League\Fractal\Resource\Item
         */
        public function includeEntity(User $user){
            return $this->item($user->entity, new EntityTransformer);
        }

        public function includeHmo(User $user){
            return $this->collection($user->hmo, new HmoTransformer);
        }
    }