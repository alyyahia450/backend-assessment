<?php

namespace App\Repositories\Users;

class User
{
    private string $id;
    
    private string $email;

    private int $status;

    private float $balance;

    private string $currency;
    
    private string $created_at;

    // 
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $name
     * @return User
     */
    public function setId(string $id): User
    {
        $this->id = $id;
        return $this;
    }

  
    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }
    public function getStatusAsString():string
    {
        return $this->status==1||$this->status==100
                ?'authorised'
                :$this->status==2||$this->status==200
                ?'decline'
                :$this->status==3||$this->status==300
                ?'refunded'
                :'';   

    }

    /**
     * @param int $status
     * @return User
     */
    public function setStatus(int $status): User
    {
        $this->status = $status;
        return $this;
    }
    /**
     * @return float
     */
    public function getBalance(): float
    {
        return $this->balance;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setBalance(float$balance): User
    {
        $this->balance = $balance;
        return $this;
    }
    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return User
     */
    public function setCurrency(string $currency): User
    {
        $this->currency = $currency;
        return $this;
    }
       /**
     * @return string
     */
    public function getCreated_at(): string
    {
        return $this->created_at;
    }

    /**
     * @param string $created_at
     * @return User
     */
    public function setCreated_at(string $created_at): User
    {
        $this->created_at = $created_at;
        return $this;
    }

}