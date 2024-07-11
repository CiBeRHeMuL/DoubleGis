<?php

namespace AndrewGos\DoubleGis\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\DoubleGis\Enum\RegionTypeEnum;
use AndrewGos\DoubleGis\ValueObject\Locale;
use AndrewGos\DoubleGis\ValueObject\NumId;
use stdClass;

class Region implements EntityInterface
{
    /**
     * @param NumId $id Уникальный идентификатор региона.
     * @param RegionTypeEnum $type Тип объекта.
     * @param string $name Название региона.
     * @param string|null $code Код региона.
     * @param string|null $uri_code Код региона, который будет отображаться в домене.
     * @param string[]|null $uri_aliases Набор алиасов региона.
     * @param string|null $domain Значение домена
     * @param Locale|null $locale Текущая локаль для региона.
     * @param Locale[]|null $locales Список локалей, на которых возможен поиск для данного региона.
     * @param string[]|null $settlements Список городов-спутников.
     * @param Satellite[]|null $satellites Список городов-спутников в виде объектов.
     * @param string|null $country_code
     * @param ZoomLevel|null $zoom_level Уровень масштаба.
     * @param RegionFlags|null $flags Признаки наличия определённой информации в регионе.
     * @param RegionSeo|null $seo Дополнительные поля для SEO.
     * @param RegionDefaultPos|null $default_pos Позиция по умолчанию для отображения проекта.
     * @param RegionNameGrammaticalCases|null $name_grammatical_cases Склонение названия региона.
     * @param RegionStatistics|null $statistics Статистика по региону.
     * @param array<string, string>|null $tips_languages Допустимые языки.
     * @param string|null $bounds Геометрия границ проекта в формате WKT.
     * @param RegionOnlineLanguages|null $online_languages
     * @param RegionTimeZone|null $time_zone Часовой пояс.
     */
    public function __construct(
        protected NumId $id,
        protected RegionTypeEnum $type,
        protected string $name,
        protected string|null $code = null,
        protected string|null $uri_code = null,
        #[ArrayType('string')] protected array|null $uri_aliases = null,
        protected string|null $domain = null,
        protected Locale|null $locale = null,
        #[ArrayType(Locale::class)] protected array|null $locales = null,
        #[ArrayType('string')] protected array|null $settlements = null,
        #[ArrayType(Satellite::class)] protected array|null $satellites = null,
        protected string|null $country_code = null,
        protected ZoomLevel|null $zoom_level = null,
        protected RegionFlags|null $flags = null,
        protected RegionSeo|null $seo = null,
        protected RegionDefaultPos|null $default_pos = null,
        protected RegionNameGrammaticalCases|null $name_grammatical_cases = null,
        protected RegionStatistics|null $statistics = null,
        protected array|null $tips_languages = null,
        protected string|null $bounds = null,
        protected RegionOnlineLanguages|null $online_languages = null,
        protected RegionTimeZone|null $time_zone = null,
    ) {
    }

    public function getId(): NumId
    {
        return $this->id;
    }

    public function setId(NumId $id): Region
    {
        $this->id = $id;
        return $this;
    }

    public function getType(): RegionTypeEnum
    {
        return $this->type;
    }

    public function setType(RegionTypeEnum $type): Region
    {
        $this->type = $type;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Region
    {
        $this->name = $name;
        return $this;
    }

    public function getCode(): string|null
    {
        return $this->code;
    }

    public function setCode(string|null $code): Region
    {
        $this->code = $code;
        return $this;
    }

    public function getUriCode(): string|null
    {
        return $this->uri_code;
    }

    public function setUriCode(string|null $uri_code): Region
    {
        $this->uri_code = $uri_code;
        return $this;
    }

    public function getUriAliases(): array|null
    {
        return $this->uri_aliases;
    }

    public function setUriAliases(array|null $uri_aliases): Region
    {
        $this->uri_aliases = $uri_aliases;
        return $this;
    }

    public function getDomain(): string|null
    {
        return $this->domain;
    }

    public function setDomain(string|null $domain): Region
    {
        $this->domain = $domain;
        return $this;
    }

    public function getLocale(): Locale|null
    {
        return $this->locale;
    }

    public function setLocale(Locale|null $locale): Region
    {
        $this->locale = $locale;
        return $this;
    }

    public function getLocales(): array|null
    {
        return $this->locales;
    }

    public function setLocales(array|null $locales): Region
    {
        $this->locales = $locales;
        return $this;
    }

    public function getSettlements(): array|null
    {
        return $this->settlements;
    }

    public function setSettlements(array|null $settlements): Region
    {
        $this->settlements = $settlements;
        return $this;
    }

    public function getSatellites(): array|null
    {
        return $this->satellites;
    }

    public function setSatellites(array|null $satellites): Region
    {
        $this->satellites = $satellites;
        return $this;
    }

    public function getCountryCode(): string|null
    {
        return $this->country_code;
    }

    public function setCountryCode(string|null $country_code): Region
    {
        $this->country_code = $country_code;
        return $this;
    }

    public function getZoomLevel(): ZoomLevel|null
    {
        return $this->zoom_level;
    }

    public function setZoomLevel(ZoomLevel|null $zoom_level): Region
    {
        $this->zoom_level = $zoom_level;
        return $this;
    }

    public function getFlags(): RegionFlags|null
    {
        return $this->flags;
    }

    public function setFlags(RegionFlags|null $flags): Region
    {
        $this->flags = $flags;
        return $this;
    }

    public function getSeo(): RegionSeo|null
    {
        return $this->seo;
    }

    public function setSeo(RegionSeo|null $seo): Region
    {
        $this->seo = $seo;
        return $this;
    }

    public function getDefaultPos(): RegionDefaultPos|null
    {
        return $this->default_pos;
    }

    public function setDefaultPos(RegionDefaultPos|null $default_pos): Region
    {
        $this->default_pos = $default_pos;
        return $this;
    }

    public function getNameGrammaticalCases(): RegionNameGrammaticalCases|null
    {
        return $this->name_grammatical_cases;
    }

    public function setNameGrammaticalCases(RegionNameGrammaticalCases|null $name_grammatical_cases): Region
    {
        $this->name_grammatical_cases = $name_grammatical_cases;
        return $this;
    }

    public function getStatistics(): RegionStatistics|null
    {
        return $this->statistics;
    }

    public function setStatistics(RegionStatistics|null $statistics): Region
    {
        $this->statistics = $statistics;
        return $this;
    }

    public function getTipsLanguages(): array|null
    {
        return $this->tips_languages;
    }

    public function setTipsLanguages(array|null $tips_languages): Region
    {
        $this->tips_languages = $tips_languages;
        return $this;
    }

    public function getBounds(): string|null
    {
        return $this->bounds;
    }

    public function setBounds(string|null $bounds): Region
    {
        $this->bounds = $bounds;
        return $this;
    }

    public function getOnlineLanguages(): RegionOnlineLanguages|null
    {
        return $this->online_languages;
    }

    public function setOnlineLanguages(RegionOnlineLanguages|null $online_languages): Region
    {
        $this->online_languages = $online_languages;
        return $this;
    }

    public function getTimeZone(): RegionTimeZone|null
    {
        return $this->time_zone;
    }

    public function setTimeZone(RegionTimeZone|null $time_zone): Region
    {
        $this->time_zone = $time_zone;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'id' => $this->id->getId(),
            'type' => $this->type->value,
            'name' => $this->name,
            'code' => $this->code,
            'uri_code' => $this->uri_code,
            'uri_aliases' => $this->uri_aliases,
            'domain' => $this->domain,
            'locale' => $this->locale?->getLocale(),
            'locales' => $this->locales !== null
                ? array_map(fn(Locale $e) => $e->getLocale(), $this->locales)
                : null,
            'settlements' => $this->settlements,
            'satellites' => $this->satellites !== null
                ? array_map(fn(Satellite $e) => $e->toArray(), $this->satellites)
                : null,
            'country_code' => $this->country_code,
            'zoom_level' => $this->zoom_level?->toArray(),
            'flags' => $this->flags?->toArray(),
            'seo' => $this->seo?->toArray(),
            'default_pos' => $this->default_pos?->toArray(),
            'name_grammatical_cases' => $this->name_grammatical_cases?->toArray(),
            'statistics' => $this->statistics?->toArray(),
            'tips_languages' => $this->tips_languages !== null
                ? ($this->tips_languages ?: new stdClass())
                : null,
            'bounds' => $this->bounds,
            'online_languages' => $this->online_languages?->toArray(),
            'time_zone' => $this->time_zone?->toArray(),
        ];
    }
}
