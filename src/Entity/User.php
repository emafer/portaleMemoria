<?php

namespace App\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
#[ORM\Table]
class User extends BaseUser
{

    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column]
    protected $id;
    public function __construct()
    {
        parent::__construct();
        if (!$this->id) {
            $this->id = uniqid();
        }
        // your own logic
    }
}