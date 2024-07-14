<?php

namespace AndrewGos\DoubleGis\Entity;

use AndrewGos\DoubleGis\Entity\EntityInterface;
use stdClass;

class ContextRubric implements EntityInterface
{
    /**
     * @param string $id Идентификатор рубрики.
     * @param int $short_id Короткий идентификатор рубрики.
     * @param int|null $group Значение группы, полученное из Sapphire.
     * @param string|null $caption Название рубрики.
     * @param string|null $name Название рубрики.
     */
    public function __construct(
        protected string $id,
        protected int $short_id,
        protected int|null $group = null,
        protected string|null $caption = null,
        protected string|null $name = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): ContextRubric
    {
        $this->id = $id;
        return $this;
    }

    public function getShortId(): int
    {
        return $this->short_id;
    }

    public function setShortId(int $short_id): ContextRubric
    {
        $this->short_id = $short_id;
        return $this;
    }

    public function getGroup(): int|null
    {
        return $this->group;
    }

    public function setGroup(int|null $group): ContextRubric
    {
        $this->group = $group;
        return $this;
    }

    public function getCaption(): string|null
    {
        return $this->caption;
    }

    public function setCaption(string|null $caption): ContextRubric
    {
        $this->caption = $caption;
        return $this;
    }

    public function getName(): string|null
    {
        return $this->name;
    }

    public function setName(string|null $name): ContextRubric
    {
        $this->name = $name;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'id' => $this->id,
            'short_id' => $this->short_id,
            'group' => $this->group,
            'caption' => $this->caption,
            'name' => $this->name,
        ];
    }
}
