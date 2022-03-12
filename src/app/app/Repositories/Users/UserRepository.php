<?php

namespace App\Repositories\Users;

use App\Repositories\EntityRepository;

class UserRepository extends EntityRepository implements UserRepositoryInterface 
{

    private UserDataProviderXRepository $dataPeoviderX;

    private UserDataProviderYRepository $dataPeoviderY;

    private string $provider_name;

    private string $file_name;

    private string $file_path;

    private string $status_code;

 	public function __construct(UserDataProviderXRepository $UserDataProviderX ,UserDataProviderYRepository $UserDataProviderY) {

        parent::__construct(User::class);
        
        $this->dataPeoviderX = $UserDataProviderX;

        $this->dataPeoviderY = $UserDataProviderY;
	}

    
    public function getAllUsers($request) 
    {
       
        return $this->dataPeoviderX->getAllUsers($request)->merge($this->dataPeoviderY->getAllUsers($request));
    }

    protected function getUsersCollection($file_path,$file_name){

        return collect(json_decode(file_get_contents($file_path, $file_name)));
    }

    protected function filterByStatusCode($users,$status_code_field,$status_code_key){
        return $users->where($status_code_field,$status_code_key);
    }

    protected function filterByBalance($users,$balance_field,$min,$max){

        return $users->whereBetween($balance_field, [$min, $max]);
    }

    protected function filterByCurrency($users,$currency_field,$currency_value){

        return $users->where($currency_field,$currency_value);
    }
    

   

}