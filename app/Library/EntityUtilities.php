<?php
    /**
     * Created by PhpStorm.
     * User: OluwadamilolaAdebayo
     * Date: 8/15/16
     * Time: 11:22 PM
     * This Class abstracts all
     * common process in all entities
     */

    namespace App\Library;

    use Illuminate\Http\Request;

    class EntityUtilities {
        protected $request;

        /**
         * @param Request $request
         */
        public function __construct(Request $request){
            $this->request = $request;
        }

        /**
         * @param $data
         * @param $model
         * @return mixed
         */
        public function createNewEntity($data,$model){
            return $model->create($data);
        }

        public function attachUserToNewEntity($data, $model){
          // $newEntity =  $this->createNewEntity($data, $model);
        }
    }