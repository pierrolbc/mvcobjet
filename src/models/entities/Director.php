<?php 

namespace mvc_objet\Models\Entities;

class Director
{

    private $id;
    private $first_name;
    private $last_name;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Director
     */
    public function setId(int $id): Director
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     * @return Director
     */


    public function setFirstName(string $first_name): Director
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * @return string
     */

    public function getLastName(): string
    {
        return $this->last_name;
    }

     /**
     * @param string $lastName
     * @return Director
     */

    public function setLastName(string $lastName): Director
    {
        $this->last_name = $last_name;
        return $this;
    }
}