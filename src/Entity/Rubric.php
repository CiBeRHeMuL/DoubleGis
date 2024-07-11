<?php

namespace AndrewGos\DoubleGis\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\DoubleGis\Enum\RubricTypeEnum;
use AndrewGos\DoubleGis\ValueObject\NumId;
use AndrewGos\DoubleGis\ValueObject\Url;
use stdClass;

#[BuildIf(new FieldIsChecker('type', RubricTypeEnum::Rubric->value))]
class Rubric extends AbstractRubric
{
    /**
     * @param NumId $id Идентификатор рубрики.
     * @param string $name Название рубрики.
     * @param NumId|null $region_id Идентификатор региона.
     * @param int|null $geo_count Количество геообъектов в данной рубрике.
     * @param string|null $seo_name Сео-синоним.
     * @param Url|null $icon_url Ссылка на изображение.
     * @param int|null $org_count Количество организаций в данной рубрике.
     * @param int|null $branch_count Количество филиалов организаций в данной рубрике.
     * @param string|null $keyword Ключевое слово, по которому была найдена рубрика.
     * @param string|null $tag Уникальное имя (в нижнем регистре), которое можно использовать как часть имени файла-иконки.
     * @param string|null $alias Транслитерированное название рубрики.
     * @param string|null $title Заголовок для отображения в UI
     * @param string|null $caption Короткая подпись к иконке для отображения в UI.
     * @param int|null $short_id Краткий идентификатор рубрики.
     * @param SearchAttributesSuggest|null $search_attributes Подсказка, соответствующая запросу. Поле доступно только в методах автодополнения.
     * @param NumId|null $parent_id Идентификатор родительской рубрики.
     */
    public function __construct(
        protected NumId $id,
        protected string $name,
        protected NumId|null $region_id = null,
        protected int|null $geo_count = null,
        protected string|null $seo_name = null,
        protected Url|null $icon_url = null,
        protected int|null $org_count = null,
        protected int|null $branch_count = null,
        protected string|null $keyword = null,
        protected string|null $tag = null,
        protected string|null $alias = null,
        protected string|null $title = null,
        protected string|null $caption = null,
        protected int|null $short_id = null,
        protected SearchAttributesSuggest|null $search_attributes = null,
        protected NumId|null $parent_id = null,
    ) {
        parent::__construct(RubricTypeEnum::Rubric);
    }

    public function getId(): NumId
    {
        return $this->id;
    }

    public function setId(NumId $id): Rubric
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Rubric
    {
        $this->name = $name;
        return $this;
    }

    public function getRegionId(): NumId|null
    {
        return $this->region_id;
    }

    public function setRegionId(NumId|null $region_id): Rubric
    {
        $this->region_id = $region_id;
        return $this;
    }

    public function getGeoCount(): int|null
    {
        return $this->geo_count;
    }

    public function setGeoCount(int|null $geo_count): Rubric
    {
        $this->geo_count = $geo_count;
        return $this;
    }

    public function getSeoName(): string|null
    {
        return $this->seo_name;
    }

    public function setSeoName(string|null $seo_name): Rubric
    {
        $this->seo_name = $seo_name;
        return $this;
    }

    public function getIconUrl(): Url|null
    {
        return $this->icon_url;
    }

    public function setIconUrl(Url|null $icon_url): Rubric
    {
        $this->icon_url = $icon_url;
        return $this;
    }

    public function getOrgCount(): int|null
    {
        return $this->org_count;
    }

    public function setOrgCount(int|null $org_count): Rubric
    {
        $this->org_count = $org_count;
        return $this;
    }

    public function getBranchCount(): int|null
    {
        return $this->branch_count;
    }

    public function setBranchCount(int|null $branch_count): Rubric
    {
        $this->branch_count = $branch_count;
        return $this;
    }

    public function getKeyword(): string|null
    {
        return $this->keyword;
    }

    public function setKeyword(string|null $keyword): Rubric
    {
        $this->keyword = $keyword;
        return $this;
    }

    public function getTag(): string|null
    {
        return $this->tag;
    }

    public function setTag(string|null $tag): Rubric
    {
        $this->tag = $tag;
        return $this;
    }

    public function getAlias(): string|null
    {
        return $this->alias;
    }

    public function setAlias(string|null $alias): Rubric
    {
        $this->alias = $alias;
        return $this;
    }

    public function getTitle(): string|null
    {
        return $this->title;
    }

    public function setTitle(string|null $title): Rubric
    {
        $this->title = $title;
        return $this;
    }

    public function getCaption(): string|null
    {
        return $this->caption;
    }

    public function setCaption(string|null $caption): Rubric
    {
        $this->caption = $caption;
        return $this;
    }

    public function getShortId(): int|null
    {
        return $this->short_id;
    }

    public function setShortId(int|null $short_id): Rubric
    {
        $this->short_id = $short_id;
        return $this;
    }

    public function getSearchAttributes(): SearchAttributesSuggest|null
    {
        return $this->search_attributes;
    }

    public function setSearchAttributes(SearchAttributesSuggest|null $search_attributes): Rubric
    {
        $this->search_attributes = $search_attributes;
        return $this;
    }

    public function getParentId(): NumId|null
    {
        return $this->parent_id;
    }

    public function setParentId(NumId|null $parent_id): Rubric
    {
        $this->parent_id = $parent_id;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'id' => $this->id->getId(),
            'name' => $this->name,
            'region_id' => $this->region_id?->getId(),
            'geo_count' => $this->geo_count,
            'seo_name' => $this->seo_name,
            'icon_url' => $this->icon_url?->getUrl(),
            'org_count' => $this->org_count,
            'branch_count' => $this->branch_count,
            'keyword' => $this->keyword,
            'tag' => $this->tag,
            'alias' => $this->alias,
            'title' => $this->title,
            'caption' => $this->caption,
            'short_id' => $this->short_id,
            'search_attributes' => $this->search_attributes?->toArray(),
            'parent_id' => $this->parent_id?->getId(),
        ];
    }
}
