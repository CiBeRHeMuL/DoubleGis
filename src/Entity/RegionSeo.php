<?php

namespace AndrewGos\DoubleGis\Entity;

use stdClass;

class RegionSeo implements EntityInterface
{
    /**
     * @param string $title
     * @param string $description
     */
    public function __construct(
        protected string $title,
        protected string $description,
    ) {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): RegionSeo
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): RegionSeo
    {
        $this->description = $description;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
        ];
    }
}
