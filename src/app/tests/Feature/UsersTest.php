<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Repositories\Users\UserRepository;
use App\Repositories\Users\UserRepositoryInterface;
use App\Repositories\Users\UserDataProviderXRepository;
use App\Repositories\Users\UserDataProviderYRepository;

class UsersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // private UserDataProviderXRepository $dataPeoviderX;

    // private UserDataProviderYRepository $dataPeoviderY;

    // public UserRepositoryInterface $userRepo;

    // protected function setup():void{
        // $dataPeoviderX=new UserDataProviderXRepository();
        // $dataPeoviderY=new UserDataProviderYRepository();
        // $userRepo=new UserRepository($dataPeoviderX,$dataPeoviderY);
    // }
    
    public function testCollection(){

        $response = $this->get('api/v1/users');
        $response->assertStatus(200);
       
        
    }

    public function testFilters(){

        $dataPeoviderX=new UserDataProviderXRepository();
        $dataPeoviderY=new UserDataProviderYRepository();
        $userRepo=new UserRepository($dataPeoviderX,$dataPeoviderY);

        $q=(object)[];
        $users=$userRepo->getAllUsers($q);
        $this->assertCount(6,$users);

        $response = $this->get('api/v1/users?provider=DataProviderX&statusCode=authorised&balanceMin=100&balanceMax=1000&currency=USD');
        $response->assertStatus(200);
        $q=(object)['provider'=>'DataProviderX','statusCode'=>'authorised','balanceMin'=>100,'balanceMax'=>1000,'currency'=>'USD'];
        $users=$userRepo->getAllUsers($q);
        $this->assertCount(1,$users); 
        
     }
}
