<?php

namespace AndrewGos\DoubleGis\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\DoubleGis\Entity\EntityInterface;
use AndrewGos\DoubleGis\Enum\AdmDivDetailedSubtypeEnum;
use AndrewGos\DoubleGis\Enum\AdmDivItermSubtypeEnum;
use AndrewGos\DoubleGis\ValueObject\Id;
use AndrewGos\DoubleGis\ValueObject\Locale;
use AndrewGos\DoubleGis\ValueObject\NumId;
use AndrewGos\DoubleGis\ValueObject\Point;
use stdClass;

class AdmDiv implements EntityInterface
{
    /**
     * @param AdmDivItermSubtypeEnum $type Тип объекта административной единицы.
     * @param NumId $id Идентификатор объекта административной единицы.
     * @param string $name Имя объекта.
     * @param AdmDivDetailedSubtypeEnum|null $detailed_subtype Детализированный тип административно-территориальной единицы.
     * @param string|null $caption Название территории (для использования в функционале «поделиться», для конечных точек маршрута и т.д.).
     * @param Flags|null $flags Список признаков объекта.
     * @param bool|null $is_default Заполняется только для type=city и принимает единственное значение true в случае,
     * если город является главным городом текущего проекта (например Новосибирск).
     * @param string|null $city_alias Алиас города, в котором находится объект.
     */
    public function __construct(
        protected AdmDivItermSubtypeEnum $type,
        protected NumId $id,
        protected string $name,
        protected AdmDivDetailedSubtypeEnum|null $detailed_subtype = null,
        protected string|null $caption = null,
        protected Flags|null $flags = null,
        protected bool|null $is_default = null,
        protected string|null $city_alias = null,
    ) {
    }

    public function getType(): AdmDivItermSubtypeEnum
    {
        return $this->type;
    }

    public function setType(AdmDivItermSubtypeEnum $type): AdmDiv
    {
        $this->type = $type;
        return $this;
    }

    public function getId(): NumId
    {
        return $this->id;
    }

    public function setId(NumId $id): AdmDiv
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): AdmDiv
    {
        $this->name = $name;
        return $this;
    }

    public function getDetailedSubtype(): AdmDivDetailedSubtypeEnum|null
    {
        return $this->detailed_subtype;
    }

    public function setDetailedSubtype(AdmDivDetailedSubtypeEnum|null $detailed_subtype): AdmDiv
    {
        $this->detailed_subtype = $detailed_subtype;
        return $this;
    }

    public function getCaption(): string|null
    {
        return $this->caption;
    }

    public function setCaption(string|null $caption): AdmDiv
    {
        $this->caption = $caption;
        return $this;
    }

    public function getFlags(): Flags|null
    {
        return $this->flags;
    }

    public function setFlags(Flags|null $flags): AdmDiv
    {
        $this->flags = $flags;
        return $this;
    }

    public function getIsDefault(): bool|null
    {
        return $this->is_default;
    }

    public function setIsDefault(bool|null $is_default): AdmDiv
    {
        $this->is_default = $is_default;
        return $this;
    }

    public function getCityAlias(): string|null
    {
        return $this->city_alias;
    }

    public function setCityAlias(string|null $city_alias): AdmDiv
    {
        $this->city_alias = $city_alias;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'id' => $this->id->getId(),
            'name' => $this->name,
            'detailed_subtype' => $this->detailed_subtype?->value,
            'caption' => $this->caption,
            'flags' => $this->flags?->toArray(),
            'is_default' => $this->is_default,
            'city_alias' => $this->city_alias,
            'type' => $this->type->value,
        ];
    }
}
