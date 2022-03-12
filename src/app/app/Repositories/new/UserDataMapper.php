<?php

namespace Others\Repository;

class UserDataMapper
{
    public static function domainToData(User $user): array
    {
        return  [
            'balance' => $user->getBalance(),
            'currency'=>$user->getCurrency(),
            'email' => $user->getEmail(),
            'status'=>$user->getStatus(),
            'created_at'=>$user->getCreated_at(),
            'id'=>$user->getId()
       
        ];
    }

    public static function dataToDomain(array $data) :User
    {
         $user = new User();
         return  $user->setBalance($balance)
            ->setCurrency($currency)
            ->setEmail($data['email'])
            ->setStatus($status)
            ->setCreated_at($created_at)
            ->setId($id);
    }
}