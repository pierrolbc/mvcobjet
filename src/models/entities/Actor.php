<?php 

namespace mvc_objet\Models\Entities;

class Actor
{

    private $id;
    private $firstName;
    private $lastName;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Actor
     */
    public function setId(int $id): Actor
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Actor
     */


    public function setFirstName(string $firstName): Actor
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */

    public function getLastName(): string
    {
        return $this->lastName;
    }

     /**
     * @param string $lastName
     * @return Actor
     */

    public function setLastName(string $lastName): Actor
    {
        $this->lastName = $lastName;
        return $this;
    }
}