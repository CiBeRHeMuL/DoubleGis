<?php

namespace AndrewGos\DoubleGis\Entity;

use AndrewGos\DoubleGis\Enum\ItemRubricKindEnum;
use AndrewGos\DoubleGis\ValueObject\NumId;
use stdClass;

class ItemRubric implements EntityInterface
{
    /**
     * @param NumId $id
     * @param int<1, max> $short_id
     * @param non-empty-string $name
     * @param ItemRubricKindEnum $kind
     * @param non-empty-string|null $alias
     * @param NumId|null $parent_id
     */
    public function __construct(
        protected NumId $id,
        protected int $short_id,
        protected string $name,
        protected ItemRubricKindEnum $kind,
        protected string|null $alias = null,
        protected NumId|null $parent_id = null,
    ) {
    }

    public function getId(): NumId
    {
        return $this->id;
    }

    public function setId(NumId $id): ItemRubric
    {
        $this->id = $id;
        return $this;
    }

    public function getShortId(): int
    {
        return $this->short_id;
    }

    public function setShortId(int $short_id): ItemRubric
    {
        $this->short_id = $short_id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ItemRubric
    {
        $this->name = $name;
        return $this;
    }

    public function getKind(): ItemRubricKindEnum
    {
        return $this->kind;
    }

    public function setKind(ItemRubricKindEnum $kind): ItemRubric
    {
        $this->kind = $kind;
        return $this;
    }

    public function getAlias(): string|null
    {
        return $this->alias;
    }

    public function setAlias(string|null $alias): ItemRubric
    {
        $this->alias = $alias;
        return $this;
    }

    public function getParentId(): NumId|null
    {
        return $this->parent_id;
    }

    public function setParentId(NumId|null $parent_id): ItemRubric
    {
        $this->parent_id = $parent_id;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'id' => $this->id->getId(),
            'short_id' => $this->short_id,
            'name' => $this->name,
            'kind' => $this->kind->value,
            'alias' => $this->alias,
            'parent_id' => $this->parent_id?->getId(),
        ];
    }
}
