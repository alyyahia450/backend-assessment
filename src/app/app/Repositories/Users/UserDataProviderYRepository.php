<?php

namespace App\Repositories\Users;

class UserDataProviderYRepository extends UserRepository implements UserRepositoryInterface 
{
   
   public function __construct(){

        $this->provider_name='DataProviderY';

        $this->file_name='DataProviderY.json';

        $this->file_path=public_path('dataProviders/DataProviderY.json');
        
        $this->status_code=[
                            'authorised' => 100,
                            'decline' => 200,
                            'refunded'=>300
                            ];


    }
    

    public function getAllUsers($request) 
    {

        if(isset($request->provider) &&$request->provider != $this->provider_name){

            return collect([]);
        }

        $users=$this->getUsersCollection($this->file_path,$this->file_name);

        if(isset($request->statusCode)){

            $users=$this->filterByStatusCode($users,'status',$this->status_code[$request->statusCode]);
        }
        if(isset($request->balanceMin) &&isset($request->balanceMax)){

            $users=$this->filterByBalance($users,'balance',$request->balanceMin, $request->balanceMax);
        }

        if(isset($request->currency)){
            
            $users=$this->filterByCurrency($users,'currency',$request->currency);
        }
       
        return  $users->map(function ($user, $key) {

            return UserDataMapper::dataToDomain($user->balance,$user->currency,$user->email,$user->status,$user->created_at,$user->id);
         
        });
  
    }

   

}