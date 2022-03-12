<?php

namespace App\Repositories\Users;


class UserDataProviderXRepository extends UserRepository  implements UserRepositoryInterface 
{
    
    public function __construct(){

        $this->provider_name='DataProviderX';

        $this->file_name='DataProviderX.json';

        $this->file_path=public_path('dataProviders/DataProviderX.json');

        $this->status_code=[
                            'authorised' => 1,
                            'decline' => 2,
                            'refunded'=>3   
                            ];
                            
    }

    public function getAllUsers($request) 
    {

        if(isset($request->provider) &&$request->provider != $this->provider_name){

            return collect([]);
        }

        $users=$this->getUsersCollection($this->file_path ,$this->file_name);
       
        if(isset($request->statusCode)){
           $users=$this->filterByStatusCode($users,'statusCode',$this->status_code[$request->statusCode]);
        }
        if(isset($request->balanceMin) &&isset($request->balanceMax)){
            $users=$this->filterByBalance($users,'parentAmount',$request->balanceMin, $request->balanceMax);
        }
        if(isset($request->currency)){
            $users=$this->filterByCurrency($users,'Currency',$request->currency);
        }
        
        return  $users->map(function ($user, $key) {
            return UserDataMapper::dataToDomain($user->parentAmount,$user->Currency,$user->parentEmail,$user->statusCode,$user->registerationDate,$user->parentIdentification);
           
        });
  
    }

    
}