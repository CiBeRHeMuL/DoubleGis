<?php

namespace AndrewGos\DoubleGis\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\DoubleGis\Enum\AdmDivDetailedSubtypeEnum;
use AndrewGos\DoubleGis\Enum\AdmDivItermSubtypeEnum;
use AndrewGos\DoubleGis\Enum\ItemTypeEnum;
use AndrewGos\DoubleGis\ValueObject\Id;
use AndrewGos\DoubleGis\ValueObject\Locale;
use AndrewGos\DoubleGis\ValueObject\NumId;
use AndrewGos\DoubleGis\ValueObject\Point;
use stdClass;

#[BuildIf(new FieldIsChecker('type', ItemTypeEnum::AdmDiv->value))]
class AdmDivItem extends AbstractItem
{
    /**
     * @param Id $id Уникальный идентификатор геообъекта.
     * @param AdmDivItermSubtypeEnum $subtype Подтип административной единицы.
     * @param string $name Название территории.
     * @param string $full_name Полное название территории.
     * @param string|null $caption Название территории (для использования в функционале «поделиться», для конечных точек маршрута и т. д.).
     * @param NumId|null $region_id Идентификатор региона.
     * @param NumId|null $segment_id Уникальный идентификатор сегмента.
     * @param Dates|null $dates Время внесения информации о филиале в БД.
     * @param SearchAttributesSuggest|null $search_attributes Подсказка, соответствующая запросу. Поле доступно только в методах автодополнения.
     * @param Flags|null $flags Список признаков объекта.
     * @param string|null $subtype_specification Локализованное название типа населённого пункта (только для subtype = settlement).
     * @param string|null $description
     * @param string[]|null $sources Идентификатор источника данных об объекте. Если отсутсвует, источник данных — 2GIS.
     * @param string|null $city_alias Алиас города, в котором находится объект.
     * @param Locale|null $locale Текущая локаль.
     * @param ItemRubric[]|null $rubrics Рубрики объекта.
     * @param AdmDivDetailedSubtypeEnum|null $detailed_subtype Детализированный тип административно-территориальной единицы.
     * @param Point|null $point Координаты точки поиска, заданные в системе координат WGS84 в формате lon, lat.
     * @param Geometry|null $geometry Геометрия территории.
     * @param AdmDiv[]|null $adm_div Принадлежность к административной территории более высокого уровня.
     */
    public function __construct(
        protected Id $id,
        protected AdmDivItermSubtypeEnum $subtype,
        protected string $name,
        protected string $full_name,
        protected string|null $caption = null,
        protected NumId|null $region_id = null,
        protected NumId|null $segment_id = null,
        protected Dates|null $dates = null,
        protected SearchAttributesSuggest|null $search_attributes = null,
        protected Flags|null $flags = null,
        protected string|null $subtype_specification = null,
        protected string|null $description = null,
        #[ArrayType('string')] protected array|null $sources = null,
        protected string|null $city_alias = null,
        protected Locale|null $locale = null,
        #[ArrayType(ItemRubric::class)] protected array|null $rubrics = null,
        protected AdmDivDetailedSubtypeEnum|null $detailed_subtype = null,
        protected Point|null $point = null,
        protected Geometry|null $geometry = null,
        #[ArrayType(AdmDiv::class)] protected array|null $adm_div = null,
    ) {
        parent::__construct(ItemTypeEnum::AdmDiv);
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function setId(Id $id): AdmDivItem
    {
        $this->id = $id;
        return $this;
    }

    public function getSubtype(): AdmDivItermSubtypeEnum
    {
        return $this->subtype;
    }

    public function setSubtype(AdmDivItermSubtypeEnum $subtype): AdmDivItem
    {
        $this->subtype = $subtype;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): AdmDivItem
    {
        $this->name = $name;
        return $this;
    }

    public function getFullName(): string
    {
        return $this->full_name;
    }

    public function setFullName(string $full_name): AdmDivItem
    {
        $this->full_name = $full_name;
        return $this;
    }

    public function getCaption(): string|null
    {
        return $this->caption;
    }

    public function setCaption(string|null $caption): AdmDivItem
    {
        $this->caption = $caption;
        return $this;
    }

    public function getRegionId(): NumId|null
    {
        return $this->region_id;
    }

    public function setRegionId(NumId|null $region_id): AdmDivItem
    {
        $this->region_id = $region_id;
        return $this;
    }

    public function getSegmentId(): NumId|null
    {
        return $this->segment_id;
    }

    public function setSegmentId(NumId|null $segment_id): AdmDivItem
    {
        $this->segment_id = $segment_id;
        return $this;
    }

    public function getDates(): Dates|null
    {
        return $this->dates;
    }

    public function setDates(Dates|null $dates): AdmDivItem
    {
        $this->dates = $dates;
        return $this;
    }

    public function getSearchAttributes(): SearchAttributesSuggest|null
    {
        return $this->search_attributes;
    }

    public function setSearchAttributes(SearchAttributesSuggest|null $search_attributes): AdmDivItem
    {
        $this->search_attributes = $search_attributes;
        return $this;
    }

    public function getFlags(): Flags|null
    {
        return $this->flags;
    }

    public function setFlags(Flags|null $flags): AdmDivItem
    {
        $this->flags = $flags;
        return $this;
    }

    public function getSubtypeSpecification(): string|null
    {
        return $this->subtype_specification;
    }

    public function setSubtypeSpecification(string|null $subtype_specification): AdmDivItem
    {
        $this->subtype_specification = $subtype_specification;
        return $this;
    }

    public function getDescription(): string|null
    {
        return $this->description;
    }

    public function setDescription(string|null $description): AdmDivItem
    {
        $this->description = $description;
        return $this;
    }

    public function getSources(): array|null
    {
        return $this->sources;
    }

    public function setSources(array|null $sources): AdmDivItem
    {
        $this->sources = $sources;
        return $this;
    }

    public function getCityAlias(): string|null
    {
        return $this->city_alias;
    }

    public function setCityAlias(string|null $city_alias): AdmDivItem
    {
        $this->city_alias = $city_alias;
        return $this;
    }

    public function getLocale(): Locale|null
    {
        return $this->locale;
    }

    public function setLocale(Locale|null $locale): AdmDivItem
    {
        $this->locale = $locale;
        return $this;
    }

    public function getRubrics(): array|null
    {
        return $this->rubrics;
    }

    public function setRubrics(array|null $rubrics): AdmDivItem
    {
        $this->rubrics = $rubrics;
        return $this;
    }

    public function getDetailedSubtype(): AdmDivDetailedSubtypeEnum|null
    {
        return $this->detailed_subtype;
    }

    public function setDetailedSubtype(AdmDivDetailedSubtypeEnum|null $detailed_subtype): AdmDivItem
    {
        $this->detailed_subtype = $detailed_subtype;
        return $this;
    }

    public function getPoint(): Point|null
    {
        return $this->point;
    }

    public function setPoint(Point|null $point): AdmDivItem
    {
        $this->point = $point;
        return $this;
    }

    public function getGeometry(): Geometry|null
    {
        return $this->geometry;
    }

    public function setGeometry(Geometry|null $geometry): AdmDivItem
    {
        $this->geometry = $geometry;
        return $this;
    }

    public function getAdmDiv(): array|null
    {
        return $this->adm_div;
    }

    public function setAdmDiv(array|null $adm_div): AdmDivItem
    {
        $this->adm_div = $adm_div;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'id' => $this->id->getId(),
            'subtype' => $this->subtype->value,
            'name' => $this->name,
            'full_name' => $this->full_name,
            'caption' => $this->caption,
            'region_id' => $this->region_id?->getId(),
            'segment_id' => $this->segment_id?->getId(),
            'dates' => $this->dates?->toArray(),
            'search_attributes' => $this->search_attributes?->toArray(),
            'flags' => $this->flags?->toArray(),
            'subtype_specification' => $this->subtype_specification,
            'description' => $this->description,
            'sources' => $this->sources,
            'city_alias' => $this->city_alias,
            'locale' => $this->locale?->getLocale(),
            'rubrics' => $this->rubrics !== null
                ? array_map(fn(ItemRubric $e) => $e->toArray(), $this->rubrics)
                : null,
            'detailed_subtype' => $this->detailed_subtype?->value,
            'point' => $this->point !== null
                ? ['lon' => $this->point->getLon(), 'lat' => $this->point->getLat()]
                : null,
            'geometry' => $this->geometry?->toArray(),
            'adm_div' => $this->adm_div !== null
                ? array_map(fn(AdmDiv $e) => $e->toArray(), $this->adm_div)
                : null,
        ];
    }
}
