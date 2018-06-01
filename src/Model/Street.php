<?php
/**
 * User: Serhii T.
 * Date: 5/29/18
 */

namespace App\Model;

class Street implements ModelInterface
{
    private $id;
    private $name;
    private $type;
    private $district;

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return District
     */
    public function getDistrict(): ?District
    {
        return $this->district;
    }

    /**
     * @param District $district
     */
    public function setDistrict(District $district): void
    {
        $this->district = $district;
    }
}
