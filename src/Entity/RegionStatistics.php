<?php

namespace AndrewGos\DoubleGis\Entity;

use stdClass;

class RegionStatistics implements EntityInterface
{
    /**
     * @param int|null $rubric_count Количество рубрик в регионе.
     * @param int|null $org_count Количество организаций в регионе.
     * @param int|null $branch_count Количество филиалов в регионе.
     * @param int|null $route_count Количество маршрутов общественного транспорта.
     */
    public function __construct(
        protected int|null $rubric_count = null,
        protected int|null $org_count = null,
        protected int|null $branch_count = null,
        protected int|null $route_count = null,
    ) {
    }

    public function getRubricCount(): int|null
    {
        return $this->rubric_count;
    }

    public function setRubricCount(int|null $rubric_count): RegionStatistics
    {
        $this->rubric_count = $rubric_count;
        return $this;
    }

    public function getOrgCount(): int|null
    {
        return $this->org_count;
    }

    public function setOrgCount(int|null $org_count): RegionStatistics
    {
        $this->org_count = $org_count;
        return $this;
    }

    public function getBranchCount(): int|null
    {
        return $this->branch_count;
    }

    public function setBranchCount(int|null $branch_count): RegionStatistics
    {
        $this->branch_count = $branch_count;
        return $this;
    }

    public function getRouteCount(): int|null
    {
        return $this->route_count;
    }

    public function setRouteCount(int|null $route_count): RegionStatistics
    {
        $this->route_count = $route_count;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'rubric_count' => $this->rubric_count,
            'org_count' => $this->org_count,
            'branch_count' => $this->branch_count,
            'route_count' => $this->route_count,
        ];
    }
}
