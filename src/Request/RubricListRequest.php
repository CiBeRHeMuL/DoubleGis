<?php

namespace AndrewGos\DoubleGis\Request;

class RubricListRequest implements RequestInterface
{
    /**
     * @param string $region_id Идентификатор региона.
     * @param string|null $parent_id Идентификатор родительской категории.
     * @param int|null $page Номер запрашиваемой страницы.
     * @param int|null $page_size Количество результатов поиска, выводимых на одной странице.
     * @param string|null $sort Сортировка результатов.
     * Допустимые значения:
     * name — по алфавиту;
     * popularity — по убыванию популярности.
     * @param string[]|null $fields Дополнительные поля, которые необходимо отобразить в ответе, перечисляются через запятую
     *
     * @link https://docs.2gis.com/ru/api/search/categories/reference/2.0/catalog/rubric/list
     */
    public function __construct(
        protected string $region_id,
        protected string|null $parent_id = null,
        protected int|null $page = null,
        protected int|null $page_size = null,
        protected string|null $sort = null,
        protected array|null $fields = null,
    ) {
    }

    public function getRegionId(): string
    {
        return $this->region_id;
    }

    public function setRegionId(string $region_id): RubricListRequest
    {
        $this->region_id = $region_id;
        return $this;
    }

    public function getPage(): int|null
    {
        return $this->page;
    }

    public function setPage(int|null $page): RubricListRequest
    {
        $this->page = $page;
        return $this;
    }

    public function getPageSize(): int|null
    {
        return $this->page_size;
    }

    public function setPageSize(int|null $page_size): RubricListRequest
    {
        $this->page_size = $page_size;
        return $this;
    }

    public function getFields(): array|null
    {
        return $this->fields;
    }

    public function setFields(array|null $fields): RubricListRequest
    {
        $this->fields = $fields;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'region_id' => $this->region_id,
            'parent_id' => $this->parent_id,
            'page' => $this->page,
            'page_size' => $this->page_size,
            'sort' => $this->sort,
            'fields' => $this->fields !== null ? implode(',', $this->fields) : null,
        ];
    }
}
