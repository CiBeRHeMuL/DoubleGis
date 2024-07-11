<?php

namespace AndrewGos\DoubleGis\Request;

use AndrewGos\DoubleGis\Enum\RegionTypeEnum;

class RegionSearchRequest implements RequestInterface
{
    /**
     * @param string<1, 400> $q Произвольная поисковая строка.
     * @param string|null $lang Язык регионов.
     * @param string|null $locale Локаль, с которой производится поиск и отдаются результаты.
     * @param string[]|null $country_code_filter Список кодов страны через запятую, по которым нужно фильтровать.
     * @param int|null $page Номер запрашиваемой страницы.
     * @param int|null $page_size Количество результатов поиска, выводимых на одной странице.
     * @param string[]|null $locale_filter Список локалей через запятую, по которым нужно фильтровать.
     * @param string[]|null $fields Дополнительные поля, которые необходимо отобразить в ответе, перечисляются через запятую.
     * @param RegionTypeEnum[]|null $type Фильтр по типу объекта, перечисляются через запятую.
     */
    public function __construct(
        protected string $q,
        protected string|null $lang = null,
        protected string|null $locale = null,
        protected array|null $country_code_filter = null,
        protected int|null $page = null,
        protected int|null $page_size = null,
        protected array|null $locale_filter = null,
        protected array|null $fields = null,
        protected array|null $type = null,
    ) {
    }

    public function getQ(): string
    {
        return $this->q;
    }

    public function setQ(string $q): RegionSearchRequest
    {
        $this->q = $q;
        return $this;
    }

    public function getLang(): string|null
    {
        return $this->lang;
    }

    public function setLang(string|null $lang): RegionSearchRequest
    {
        $this->lang = $lang;
        return $this;
    }

    public function getLocale(): string|null
    {
        return $this->locale;
    }

    public function setLocale(string|null $locale): RegionSearchRequest
    {
        $this->locale = $locale;
        return $this;
    }

    public function getCountryCodeFilter(): array|null
    {
        return $this->country_code_filter;
    }

    public function setCountryCodeFilter(array|null $country_code_filter): RegionSearchRequest
    {
        $this->country_code_filter = $country_code_filter;
        return $this;
    }

    public function getPage(): int|null
    {
        return $this->page;
    }

    public function setPage(int|null $page): RegionSearchRequest
    {
        $this->page = $page;
        return $this;
    }

    public function getPageSize(): int|null
    {
        return $this->page_size;
    }

    public function setPageSize(int|null $page_size): RegionSearchRequest
    {
        $this->page_size = $page_size;
        return $this;
    }

    public function getLocaleFilter(): array|null
    {
        return $this->locale_filter;
    }

    public function setLocaleFilter(array|null $locale_filter): RegionSearchRequest
    {
        $this->locale_filter = $locale_filter;
        return $this;
    }

    public function getFields(): array|null
    {
        return $this->fields;
    }

    public function setFields(array|null $fields): RegionSearchRequest
    {
        $this->fields = $fields;
        return $this;
    }

    public function getType(): array|null
    {
        return $this->type;
    }

    public function setType(array|null $type): RegionSearchRequest
    {
        $this->type = $type;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'q' => $this->q,
            'lang' => $this->lang,
            'locale' => $this->locale,
            'country_code_filter' => $this->country_code_filter !== null
                ? implode(',', $this->country_code_filter)
                : null,
            'page' => $this->page,
            'page_size' => $this->page_size,
            'locale_filter' => $this->locale_filter !== null
                ? implode(',', $this->locale_filter)
                : null,
            'fields' => $this->fields !== null
                ? implode(',', $this->fields)
                : null,
            'type' => $this->type !== null
                ? implode(',', array_map(fn(RegionTypeEnum $e) => $e->value, $this->type))
                : null,
        ];
    }
}
