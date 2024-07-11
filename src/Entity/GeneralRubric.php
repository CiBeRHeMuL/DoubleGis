<?php

namespace AndrewGos\DoubleGis\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\DoubleGis\Enum\RubricTypeEnum;
use AndrewGos\DoubleGis\ValueObject\NumId;
use stdClass;

#[BuildIf(new FieldIsChecker('type', RubricTypeEnum::GeneralRubric->value))]
class GeneralRubric extends AbstractRubric
{
    /**
     * @param NumId $id Идентификатор рубрики.
     * @param string $name Название рубрики.
     * @param int|null $short_id Краткий идентификатор рубрики.
     * @param NumId|null $region_id Идентификатор региона.
     * @param array|null $rubrics Массив дочерних рубрик.
     * @param string|null $keyword Ключевое слово, по которому была найдена рубрика
     * @param int|null $geo_count Количество геообъектов в данной рубрике.
     * @param int|null $org_count Количество организаций в данной рубрике.
     * @param bool|null $is_reviewable_on_flamp Разрешены ли отзывы к организациям этой рубрики непосредственно на flamp.ru.
     * @param int|null $branch_count Количество филиалов организаций в данной рубрике.
     * @param string|null $alias Транслитерированное название рубрики.
     */
    public function __construct(
        protected NumId $id,
        protected string $name,
        protected int|null $short_id = null,
        protected NumId|null $region_id = null,
        #[ArrayType(Rubric::class)] protected array|null $rubrics = null,
        protected string|null $keyword = null,
        protected int|null $geo_count = null,
        protected int|null $org_count = null,
        protected bool|null $is_reviewable_on_flamp = null,
        protected int|null $branch_count = null,
        protected string|null $alias = null,
    ) {
        parent::__construct(RubricTypeEnum::GeneralRubric);
    }

    public function getId(): NumId
    {
        return $this->id;
    }

    public function setId(NumId $id): GeneralRubric
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): GeneralRubric
    {
        $this->name = $name;
        return $this;
    }

    public function getShortId(): int|null
    {
        return $this->short_id;
    }

    public function setShortId(int|null $short_id): GeneralRubric
    {
        $this->short_id = $short_id;
        return $this;
    }

    public function getRegionId(): NumId|null
    {
        return $this->region_id;
    }

    public function setRegionId(NumId|null $region_id): GeneralRubric
    {
        $this->region_id = $region_id;
        return $this;
    }

    public function getRubrics(): array|null
    {
        return $this->rubrics;
    }

    public function setRubrics(array|null $rubrics): GeneralRubric
    {
        $this->rubrics = $rubrics;
        return $this;
    }

    public function getKeyword(): string|null
    {
        return $this->keyword;
    }

    public function setKeyword(string|null $keyword): GeneralRubric
    {
        $this->keyword = $keyword;
        return $this;
    }

    public function getGeoCount(): int|null
    {
        return $this->geo_count;
    }

    public function setGeoCount(int|null $geo_count): GeneralRubric
    {
        $this->geo_count = $geo_count;
        return $this;
    }

    public function getOrgCount(): int|null
    {
        return $this->org_count;
    }

    public function setOrgCount(int|null $org_count): GeneralRubric
    {
        $this->org_count = $org_count;
        return $this;
    }

    public function getIsReviewableOnFlamp(): bool|null
    {
        return $this->is_reviewable_on_flamp;
    }

    public function setIsReviewableOnFlamp(bool|null $is_reviewable_on_flamp): GeneralRubric
    {
        $this->is_reviewable_on_flamp = $is_reviewable_on_flamp;
        return $this;
    }

    public function getBranchCount(): int|null
    {
        return $this->branch_count;
    }

    public function setBranchCount(int|null $branch_count): GeneralRubric
    {
        $this->branch_count = $branch_count;
        return $this;
    }

    public function getAlias(): string|null
    {
        return $this->alias;
    }

    public function setAlias(string|null $alias): GeneralRubric
    {
        $this->alias = $alias;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'id' => $this->id->getId(),
            'name' => $this->name,
            'short_id' => $this->short_id,
            'region_id' => $this->region_id?->getId(),
            'rubrics' => $this->rubrics !== null
                ? array_map(fn(Rubric $e) => $e->toArray(), $this->rubrics)
                : null,
            'keyword' => $this->keyword,
            'geo_count' => $this->geo_count,
            'org_count' => $this->org_count,
            'is_reviewable_on_flamp' => $this->is_reviewable_on_flamp,
            'branch_count' => $this->branch_count,
            'alias' => $this->alias,
        ];
    }
}
