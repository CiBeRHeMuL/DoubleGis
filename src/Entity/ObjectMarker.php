<?php

namespace AndrewGos\DoubleGis\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldCompareChecker;
use AndrewGos\ClassBuilder\Enum\CompareOperatorEnum;
use stdClass;

#[BuildIf(new FieldCompareChecker('type', 'coordinates', CompareOperatorEnum::StrictNotEqual))]
class ObjectMarker extends AbstractMarker
{
    /**
     * @param string $type Тип маркера.
     * @param string $id Уникальный идентификатор.
     * @param float|int $lon Долгота
     * @param float|int $lat Широта
     * @param bool $is_advertising Флаг, указывающий на рекламодателя.
     * @param string|null $geometry_id Идентификатор геометрии, к которой принадлежит маркер.
     * @param float|int|null $match_type
     * @param bool|null $is_deleted Признак удаленного объекта
     * @param float|int|null $source_type
     * @param int|null $vital Признак релевантности объекта.
     * @param string|null $floor_id Идентификатор этажа.
     * @param string|null $rubr Идентификатор рубрики.
     * @param array|null $rubric_ids Идентификаторы известных рубрик.
     */
    public function __construct(
        string $type,
        protected string $id,
        protected float|int $lon,
        protected float|int $lat,
        protected bool $is_advertising,
        protected string|null $geometry_id = null,
        protected float|int|null $match_type = null,
        protected bool|null $is_deleted = null,
        protected float|int|null $source_type = null,
        protected int|null $vital = null,
        protected string|null $floor_id = null,
        protected string|null $rubr = null,
        #[ArrayType('string')] protected array|null $rubric_ids = null,
    ) {
        parent::__construct($type);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): ObjectMarker
    {
        $this->id = $id;
        return $this;
    }

    public function getLon(): float|int
    {
        return $this->lon;
    }

    public function setLon(float|int $lon): ObjectMarker
    {
        $this->lon = $lon;
        return $this;
    }

    public function getLat(): float|int
    {
        return $this->lat;
    }

    public function setLat(float|int $lat): ObjectMarker
    {
        $this->lat = $lat;
        return $this;
    }

    public function isIsAdvertising(): bool
    {
        return $this->is_advertising;
    }

    public function setIsAdvertising(bool $is_advertising): ObjectMarker
    {
        $this->is_advertising = $is_advertising;
        return $this;
    }

    public function getGeometryId(): string|null
    {
        return $this->geometry_id;
    }

    public function setGeometryId(string|null $geometry_id): ObjectMarker
    {
        $this->geometry_id = $geometry_id;
        return $this;
    }

    public function getMatchType(): float|int|null
    {
        return $this->match_type;
    }

    public function setMatchType(float|int|null $match_type): ObjectMarker
    {
        $this->match_type = $match_type;
        return $this;
    }

    public function getIsDeleted(): bool|null
    {
        return $this->is_deleted;
    }

    public function setIsDeleted(bool|null $is_deleted): ObjectMarker
    {
        $this->is_deleted = $is_deleted;
        return $this;
    }

    public function getSourceType(): float|int|null
    {
        return $this->source_type;
    }

    public function setSourceType(float|int|null $source_type): ObjectMarker
    {
        $this->source_type = $source_type;
        return $this;
    }

    public function getVital(): int|null
    {
        return $this->vital;
    }

    public function setVital(int|null $vital): ObjectMarker
    {
        $this->vital = $vital;
        return $this;
    }

    public function getFloorId(): string|null
    {
        return $this->floor_id;
    }

    public function setFloorId(string|null $floor_id): ObjectMarker
    {
        $this->floor_id = $floor_id;
        return $this;
    }

    public function getRubr(): string|null
    {
        return $this->rubr;
    }

    public function setRubr(string|null $rubr): ObjectMarker
    {
        $this->rubr = $rubr;
        return $this;
    }

    public function getRubricIds(): array|null
    {
        return $this->rubric_ids;
    }

    public function setRubricIds(array|null $rubric_ids): ObjectMarker
    {
        $this->rubric_ids = $rubric_ids;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type,
            'id' => $this->id,
            'lon' => $this->lon,
            'lat' => $this->lat,
            'is_advertising' => $this->is_advertising,
            'geometry_id' => $this->geometry_id,
            'match_type' => $this->match_type,
            'is_deleted' => $this->is_deleted,
            'source_type' => $this->source_type,
            'vital' => $this->vital,
            'floor_id' => $this->floor_id,
            'rubr' => $this->rubr,
            'rubric_ids' => $this->rubric_ids,
        ];
    }
}
