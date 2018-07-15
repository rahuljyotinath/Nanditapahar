<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface,\Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=55,unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=45,unique=true)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=55)
     */
    private $email;

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
    
    public function getRoles()
    {
     return array(
         'ROLE_USER'
     );   
    }
    public function getSalt(){}
     public function eraseCredentials(){}

     public function serialize()
     {
         return serialize([
                 $this ->id,
                 $this ->username,
                 $this ->email,
                 $this ->password
                 ]);
     }
     public function unserialize($string)
     {
       list(     
                 $this ->id,
                 $this ->username,
                 $this ->email,
                 $this ->password
               ) = unserialize($string, ['allowed_classes' => false]);        
     }
}


