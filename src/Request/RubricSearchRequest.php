<?php

namespace AndrewGos\DoubleGis\Request;

class RubricSearchRequest implements RequestInterface
{
    /**
     * @param string $region_id Идентификатор региона.
     * @param string<1, 400> $q Произвольная поисковая строка.
     * @param int|null $page Номер запрашиваемой страницы.
     * @param int|null $page_size Количество результатов поиска, выводимых на одной странице.
     * @param string[]|null $fields Дополнительные поля, которые необходимо отобразить в ответе, перечисляются через запятую
     *
     * @link https://docs.2gis.com/ru/api/search/categories/reference/2.0/catalog/rubric/search
     */
    public function __construct(
        protected string $region_id,
        protected string $q,
        protected int|null $page = null,
        protected int|null $page_size = null,
        protected array|null $fields = null,
    ) {
    }

    public function getRegionId(): string
    {
        return $this->region_id;
    }

    public function setRegionId(string $region_id): RubricSearchRequest
    {
        $this->region_id = $region_id;
        return $this;
    }

    public function getQ(): string
    {
        return $this->q;
    }

    public function setQ(string $q): RubricSearchRequest
    {
        $this->q = $q;
        return $this;
    }

    public function getPage(): int|null
    {
        return $this->page;
    }

    public function setPage(int|null $page): RubricSearchRequest
    {
        $this->page = $page;
        return $this;
    }

    public function getPageSize(): int|null
    {
        return $this->page_size;
    }

    public function setPageSize(int|null $page_size): RubricSearchRequest
    {
        $this->page_size = $page_size;
        return $this;
    }

    public function getFields(): array|null
    {
        return $this->fields;
    }

    public function setFields(array|null $fields): RubricSearchRequest
    {
        $this->fields = $fields;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'region_id' => $this->region_id,
            'q' => $this->q,
            'page' => $this->page,
            'page_size' => $this->page_size,
            'fields' => $this->fields !== null ? implode(',', $this->fields) : null,
        ];
    }
}
