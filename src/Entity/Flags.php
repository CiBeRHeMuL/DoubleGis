<?php

namespace AndrewGos\DoubleGis\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

class Flags implements EntityInterface
{
    /**
     * @param array|null $temporary_closed_parameters
     * @param bool|null $photos
     * @param bool|null $is_default Есть ли для объекта фотографии.
     * @param bool|null $is_region_center Заполняется только для type=city и принимает единственное значение true в случае,
     * если город является главным городом текущего проекта (например Новосибирск)
     * @param bool|null $is_district_area_center Заполняется только для type=adm_div, subtype=city|settlement
     * и принимает единственное значение true в случае, если населённый пункт является областным центром.
     * @param string|null $temporary_closed
     */
    public function __construct(
        #[ArrayType(TemporaryCloseParameter::class)] protected array|null $temporary_closed_parameters = null,
        protected bool|null $photos = null,
        protected bool|null $is_default = null,
        protected bool|null $is_region_center = null,
        protected bool|null $is_district_area_center = null,
        protected string|null $temporary_closed = null,
    ) {
    }

    public function getTemporaryClosedParameters(): array|null
    {
        return $this->temporary_closed_parameters;
    }

    public function setTemporaryClosedParameters(array|null $temporary_closed_parameters): Flags
    {
        $this->temporary_closed_parameters = $temporary_closed_parameters;
        return $this;
    }

    public function getPhotos(): bool|null
    {
        return $this->photos;
    }

    public function setPhotos(bool|null $photos): Flags
    {
        $this->photos = $photos;
        return $this;
    }

    public function getIsDefault(): bool|null
    {
        return $this->is_default;
    }

    public function setIsDefault(bool|null $is_default): Flags
    {
        $this->is_default = $is_default;
        return $this;
    }

    public function getIsRegionCenter(): bool|null
    {
        return $this->is_region_center;
    }

    public function setIsRegionCenter(bool|null $is_region_center): Flags
    {
        $this->is_region_center = $is_region_center;
        return $this;
    }

    public function getIsDistrictAreaCenter(): bool|null
    {
        return $this->is_district_area_center;
    }

    public function setIsDistrictAreaCenter(bool|null $is_district_area_center): Flags
    {
        $this->is_district_area_center = $is_district_area_center;
        return $this;
    }

    public function getTemporaryClosed(): string|null
    {
        return $this->temporary_closed;
    }

    public function setTemporaryClosed(string|null $temporary_closed): Flags
    {
        $this->temporary_closed = $temporary_closed;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'temporary_closed_parameters' => $this->temporary_closed_parameters !== null
                ? array_map(fn(TemporaryCloseParameter $e) => $e->toArray(), $this->temporary_closed_parameters)
                : null,
            'photos' => $this->photos,
            'is_default' => $this->is_default,
            'is_region_center' => $this->is_region_center,
            'is_district_area_center' => $this->is_district_area_center,
            'temporary_closed' => $this->temporary_closed,
        ];
    }
}
