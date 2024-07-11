<?php

namespace AndrewGos\DoubleGis\Entity;

use AndrewGos\DoubleGis\ValueObject\NumId;
use stdClass;

class Satellite implements EntityInterface
{
    /**
     * @param NumId $id Идентификатор населённого пункта.
     * @param string $name Имя населённого пункта.
     * @param string $geometry Геометрия населённого пункта.
     * @param string $centroid Центроид населённого пункта.
     */
    public function __construct(
        protected NumId $id,
        protected string $name,
        protected string $geometry,
        protected string $centroid,
    ) {
    }

    public function getId(): NumId
    {
        return $this->id;
    }

    public function setId(NumId $id): Satellite
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Satellite
    {
        $this->name = $name;
        return $this;
    }

    public function getGeometry(): string
    {
        return $this->geometry;
    }

    public function setGeometry(string $geometry): Satellite
    {
        $this->geometry = $geometry;
        return $this;
    }

    public function getCentroid(): string
    {
        return $this->centroid;
    }

    public function setCentroid(string $centroid): Satellite
    {
        $this->centroid = $centroid;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'id' => $this->id->getId(),
            'name' => $this->name,
            'geometry' => $this->geometry,
            'centroid' => $this->centroid,
        ];
    }
}
