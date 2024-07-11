<?php

namespace AndrewGos\DoubleGis\Entity;

use stdClass;

class RegionTimeZone implements EntityInterface
{
    /**
     * @param int|null $offset Сдвиг времени относительно времени по Гринвичу в минутах.
     * @param string|null $name Часовой пояс в формате Time Zone Database.
     */
    public function __construct(
        protected int|null $offset = null,
        protected string|null $name = null,
    ) {
    }

    public function getOffset(): int|null
    {
        return $this->offset;
    }

    public function setOffset(int|null $offset): RegionTimeZone
    {
        $this->offset = $offset;
        return $this;
    }

    public function getName(): string|null
    {
        return $this->name;
    }

    public function setName(string|null $name): RegionTimeZone
    {
        $this->name = $name;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'offset' => $this->offset,
            'name' => $this->name,
        ];
    }
}
