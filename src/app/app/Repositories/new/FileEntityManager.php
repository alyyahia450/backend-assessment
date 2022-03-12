<?php

namespace Others\Repository;


class FileEntityManager implements PersistenceInterface
{
    
    private $provider_name;

    private $file_name;

    private $file_path;

    private $status_code;

    private $collection;

    public function __construct($provider_name,$file_name,$file_path)
    {
     
        $this->provider_name=$provider_name;

       $this->file_name=$file_name;
    
        $this->file_path=$file_path;
    
        // private $status_code;
    }

    public function persist(array $data)
    {
        $this->db [] = $data;
    }

   

    
}