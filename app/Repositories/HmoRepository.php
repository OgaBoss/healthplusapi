<?php
    /**
     * Created by PhpStorm.
     * User: OluwadamilolaAdebayo
     * Date: 8/15/16
     * Time: 11:20 PM
     */

    namespace App\Repositories;

    use Bosnadev\Repositories\Contracts\RepositoryInterface;
    use Bosnadev\Repositories\Eloquent\Repository;

    class HmoRepository extends Repository {
        public function model(){
            return 'App\Hmo';
        }
    }