<?php

namespace App\Entity;
class User extends \FOS\UserBundle\Model\User
{

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}