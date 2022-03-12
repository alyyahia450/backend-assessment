<?php

namespace App\Repositories\Users;

class UserDataMapper{

   

    public static function dataToDomain($balance,$currency,$email,$status,$created_at,$id) :User
    {
         $user = new User();
         return  $user->setBalance($balance)
                    ->setCurrency($currency)
                    ->setEmail($email)
                    ->setStatus($status)
                    ->setCreated_at($created_at)
                    ->setId($id);
    }

}
