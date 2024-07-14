<?php

namespace AndrewGos\DoubleGis\Request;

use AndrewGos\DoubleGis\Enum\ItemTypeEnum;
use AndrewGos\DoubleGis\Enum\SearchTypeEnum;
use AndrewGos\DoubleGis\Enum\LocaleEnum;
use AndrewGos\DoubleGis\Enum\SearchInputMethodEnum;
use AndrewGos\DoubleGis\Enum\SortEnum;
use AndrewGos\DoubleGis\ValueObject\Point;
use AndrewGos\DoubleGis\ValueObject\Polygon;
use DateTimeInterface;
use InvalidArgumentException;

class ItemsRequest implements RequestInterface
{
    /**
     * @param LocaleEnum|null $locale Локаль, с которой производится поиск и отдаются результаты.
     * @param string|null $q Произвольная поисковая строка. 1-500 символов
     * @param ItemTypeEnum[]|null $type Типы объектов, среди которых производится поиск.
     * При передаче нескольких типов менее релевантные результаты одних типов могут вытесниться более релевантными других типов.
     * Типы перечисляются через запятую. Значение adm_div является псевдонимом для всех типов adm_div.* одновременно.
     * @param string[]|null $fields Дополнительные поля, которые необходимо отобразить в ответе, перечисляются через запятую.
     * Поля с пометкой требуется дополнительное разрешение у ключа API будут присутствовать в выдаче только при выставленных
     * разрешениях на это поле у ключа. По умолчанию ключ не имеет никакие из указанных дополнительных разрешений.
     * @param SearchTypeEnum|null $search_type Тип производимого поиска. По умолчанию - discovery
     * @param bool|null $search_is_query_text_complete Указание поисковому движку, что запрос является законченным
     * (пользователь нажал на кнопку заверешения ввода). Отключает префиксность, т.е. по "банк" не будет находиться "банкомат".
     * @param bool|null $search_nearby Указание поисковому движку использовать режима поиска рядом с пользователем.
     * Сильно повышает значимость расстояния от пользователя. В ранжирование всё ещё участвует популярность,
     * реклама и другие параметры, но в меньшей степени
     * @param SearchInputMethodEnum|null $search_input_method Указание поисковому движку способа ввода текста запроса
     * @param SortEnum|null $sort Сортировка результатов. По умолчанию - relevance
     * @param Point|null $location Координаты пользователя
     * @param float|null $lon Долгота точки — центра области поиска. Обязательно использование совместно с параметром lat.
     * Допустимый интервал значений: от -180 до 180. Может использоваться совместно с параметром radius для фильтрации результатов в окружности.
     * @param float|null $lat Широта точки — центра области поиска. Обязательно использование совместно с параметром lon.
     * Допустимый интервал значений: от -90 до 90. Может использоваться совместно с параметром radius для фильтрации результатов в окружности.
     * @param Point|null $point Центр области поиска (координаты точки в формате lon, lat).
     * Используется для фильтрации результатов в окружности. Параметр конфликтует с параметрами polygon, point1, point2.
     * @param int|null $radius Радиус поиска в метрах.
     * Ограничение: от 0 до 40000 — при наличии поискового запроса (q), от 0 до 2000 — при отсутствии.
     * Значение по умолчанию: 250 — в сочетании с point, 0 — в сочетании с lon/lat.
     * Используется для фильтрации результатов в окружности. По умолчанию - 250
     * @param int[]|null $district_id Идентификаторы районов, разделённые запятыми. Используется для фильтрации объектов по району.
     * Максимальное количество — 50.
     * @param int[]|null $building_id Идентификаторы зданий, разделённые запятыми. Используется для фильтрации объектов в здании.
     * Максимальное количество — 50.
     * @param int[]|null $city_id Идентификаторы городов, разделённые запятыми. Используется для фильтрации объектов по городу.
     * Максимальное количество — 50.
     * @param int[]|null $subway Идентификаторы станций метро, разделённые запятыми. Используется для фильтрации объектов по станциям метро.
     * Максимальное количество — 50.
     * @param Point|null $point1 Координаты левой верхней вершины прямоугольной области в формате lon, lat, ограничивающей результаты выборки.
     * Используется для фильтрации результатов в прямоугольной области.
     * Допустимая разность координат point2 и point1 не более: для lon 0.06, для lat 0.04 (приблизительно 6.6 х 4.4 км).
     * Если передан параметр q — ограничения не накладываются. Параметр конфликтует с параметрами point, polygon.
     * @param Point|null $point2 Координаты правой нижней вершины прямоугольной области в формате lon, lat, ограничивающей результаты выборки.
     * Используется для фильтрации результатов в прямоугольной области.
     * Максимальное расстояние между точками point2 и point1 не более 2 км.
     * Если передан параметр q — ограничения не накладываются. Параметр конфликтует с параметрами point, polygon.
     * @param Polygon|null $polygon Полигон в формате WKT.
     * Используется для фильтрации результатов в произвольной области.
     * Допустимая площадь полигона ~ 6 км^2. Если передан параметр q — ограничения не накладываются.
     * Параметр конфликтует с параметрами point, point1, point2.
     * @param Point|null $viewpoint1 Координаты левой верхней вершины прямоугольной области видимости в формате lon, lat.
     * Параметры viewpoint1 и viewpoint2 передают область карты, куда смотрел пользователь перед вводом запроса.
     * Используется как один из критериев для выбора, где нужны результаты, и для ранжирования.
     * Не ограничивает жёстко результаты поиска только переданной областью.
     * @param Point|null $viewpoint2 Координаты правой нижней вершины прямоугольной области видимости в формате lon, lat.
     * Параметры viewpoint1 и viewpoint2 передают область карты, куда смотрел пользователь перед вводом запроса.
     * Используется как один из критериев для выбора, где нужны результаты, и для ранжирования.
     * Не ограничивает жёстко результаты поиска только переданной областью.
     * @param int|null $region_id Идентификатор региона. Обязателен, если не задано географическое ограничение поиска.
     * Подробности про территориальное деление карты на регионы можно посмотреть в описании Regions API.
     * @param int|null $page Номер запрашиваемой страницы. 1-1000000
     * @param int|null $page_size Количество результатов поиска, выводимых на одной странице. 1-50 По умолчанию 20
     * @param int[]|null $rubric_id Идентификатор категории. Необходимо передать параметр region_id.
     * Также можно передавать список идентификаторов категорий через запятую. В этом случае все категории должны быть из одного региона.
     * @param int|null $org_id Фильтр по идентификатору организации, к которой относится компания.
     * @param bool|null $has_photos Фильтр по наличию фотографий. Принимает значения: true или false.
     * @param bool|null $has_rating Фильтр по наличию рейтинга на flamp.ru. Принимает значения: true или false.
     * @param bool|null $has_reviews Фильтр по наличию отзывов на flamp.ru. Принимает значения: true или false.
     * @param bool|null $has_site Фильтр по наличию сайта. Принимает значения: true или false.
     * @param string|null $work_time Время работы организации. Формат: [day],[time] или now (текущий день и время).
     * Примеры:
     * Понедельник, 17:00 — mon,17:00
     * Четверг, 9:00 — thu,09:00
     * Сегодня, 9:00 — today,09:00
     * Пятница, весь день — fri,alltime
     * Сейчас — now
     * @param DateTimeInterface|null $opened_after_date Фильтрует компании у которых дата открытия позже чем переданный параметр.
     * Принимает значения в формате Y-m-d
     * @param bool|null $has_itin Фильтр по наличию индивидуального номера налогоплательщика. Принимает значения: true или false.
     * @param bool|null $has_trade_license Фильтр по наличию торговой лицензии. Принимает значения true или false.
     *
     * @link https://docs.2gis.com/ru/api/search/places/reference/3.0/items#/paths/~13.0~1items/get
     */
    public function __construct(
        protected LocaleEnum|null $locale = null,
        protected string|null $q = null,
        protected array|null $type = null,
        protected array|null $fields = null,
        protected SearchTypeEnum|null $search_type = null,
        protected bool|null $search_is_query_text_complete = null,
        protected bool|null $search_nearby = null,
        protected SearchInputMethodEnum|null $search_input_method = null,
        protected SortEnum|null $sort = null,
        protected Point|null $location = null,
        protected float|null $lon = null,
        protected float|null $lat = null,
        protected Point|null $point = null,
        protected int|null $radius = null,
        protected array|null $district_id = null,
        protected array|null $building_id = null,
        protected array|null $city_id = null,
        protected array|null $subway = null,
        protected Point|null $point1 = null,
        protected Point|null $point2 = null,
        protected Polygon|null $polygon = null,
        protected Point|null $viewpoint1 = null,
        protected Point|null $viewpoint2 = null,
        protected int|null $region_id = null,
        protected int|null $page = null,
        protected int|null $page_size = null,
        protected array|null $rubric_id = null,
        protected int|null $org_id = null,
        protected bool|null $has_photos = null,
        protected bool|null $has_rating = null,
        protected bool|null $has_reviews = null,
        protected bool|null $has_site = null,
        protected string|null $work_time = null,
        protected DateTimeInterface|null $opened_after_date = null,
        protected bool|null $has_itin = null,
        protected bool|null $has_trade_license = null,
    ) {
        foreach ($this->type ?? [] as $type) {
            if (!$type instanceof ItemTypeEnum) {
                throw new InvalidArgumentException('This method worked only with types specified in ItemTypeEnum');
            }
        }
    }

    public function getLocale(): LocaleEnum|null
    {
        return $this->locale;
    }

    public function setLocale(LocaleEnum|null $locale): ItemsRequest
    {
        $this->locale = $locale;
        return $this;
    }

    public function getQ(): string|null
    {
        return $this->q;
    }

    public function setQ(string|null $q): ItemsRequest
    {
        $this->q = $q;
        return $this;
    }

    public function getType(): array|null
    {
        return $this->type;
    }

    public function setType(array|null $type): ItemsRequest
    {
        $this->type = $type;
        return $this;
    }

    public function getFields(): array|null
    {
        return $this->fields;
    }

    public function setFields(array|null $fields): ItemsRequest
    {
        $this->fields = $fields;
        return $this;
    }

    public function getSearchType(): SearchTypeEnum|null
    {
        return $this->search_type;
    }

    public function setSearchType(SearchTypeEnum|null $search_type): ItemsRequest
    {
        $this->search_type = $search_type;
        return $this;
    }

    public function getSearchIsQueryTextComplete(): bool|null
    {
        return $this->search_is_query_text_complete;
    }

    public function setSearchIsQueryTextComplete(bool|null $search_is_query_text_complete): ItemsRequest
    {
        $this->search_is_query_text_complete = $search_is_query_text_complete;
        return $this;
    }

    public function getSearchNearby(): bool|null
    {
        return $this->search_nearby;
    }

    public function setSearchNearby(bool|null $search_nearby): ItemsRequest
    {
        $this->search_nearby = $search_nearby;
        return $this;
    }

    public function getSearchInputMethod(): SearchInputMethodEnum|null
    {
        return $this->search_input_method;
    }

    public function setSearchInputMethod(SearchInputMethodEnum|null $search_input_method): ItemsRequest
    {
        $this->search_input_method = $search_input_method;
        return $this;
    }

    public function getSort(): SortEnum|null
    {
        return $this->sort;
    }

    public function setSort(SortEnum|null $sort): ItemsRequest
    {
        $this->sort = $sort;
        return $this;
    }

    public function getLocation(): Point|null
    {
        return $this->location;
    }

    public function setLocation(Point|null $location): ItemsRequest
    {
        $this->location = $location;
        return $this;
    }

    public function getLon(): float|null
    {
        return $this->lon;
    }

    public function setLon(float|null $lon): ItemsRequest
    {
        $this->lon = $lon;
        return $this;
    }

    public function getLat(): float|null
    {
        return $this->lat;
    }

    public function setLat(float|null $lat): ItemsRequest
    {
        $this->lat = $lat;
        return $this;
    }

    public function getPoint(): Point|null
    {
        return $this->point;
    }

    public function setPoint(Point|null $point): ItemsRequest
    {
        $this->point = $point;
        return $this;
    }

    public function getRadius(): int|null
    {
        return $this->radius;
    }

    public function setRadius(int|null $radius): ItemsRequest
    {
        $this->radius = $radius;
        return $this;
    }

    public function getDistrictId(): array|null
    {
        return $this->district_id;
    }

    public function setDistrictId(array|null $district_id): ItemsRequest
    {
        $this->district_id = $district_id;
        return $this;
    }

    public function getBuildingId(): array|null
    {
        return $this->building_id;
    }

    public function setBuildingId(array|null $building_id): ItemsRequest
    {
        $this->building_id = $building_id;
        return $this;
    }

    public function getCityId(): array|null
    {
        return $this->city_id;
    }

    public function setCityId(array|null $city_id): ItemsRequest
    {
        $this->city_id = $city_id;
        return $this;
    }

    public function getSubway(): array|null
    {
        return $this->subway;
    }

    public function setSubway(array|null $subway): ItemsRequest
    {
        $this->subway = $subway;
        return $this;
    }

    public function getPoint1(): Point|null
    {
        return $this->point1;
    }

    public function setPoint1(Point|null $point1): ItemsRequest
    {
        $this->point1 = $point1;
        return $this;
    }

    public function getPoint2(): Point|null
    {
        return $this->point2;
    }

    public function setPoint2(Point|null $point2): ItemsRequest
    {
        $this->point2 = $point2;
        return $this;
    }

    public function getPolygon(): Polygon|null
    {
        return $this->polygon;
    }

    public function setPolygon(Polygon|null $polygon): ItemsRequest
    {
        $this->polygon = $polygon;
        return $this;
    }

    public function getViewpoint1(): Point|null
    {
        return $this->viewpoint1;
    }

    public function setViewpoint1(Point|null $viewpoint1): ItemsRequest
    {
        $this->viewpoint1 = $viewpoint1;
        return $this;
    }

    public function getViewpoint2(): Point|null
    {
        return $this->viewpoint2;
    }

    public function setViewpoint2(Point|null $viewpoint2): ItemsRequest
    {
        $this->viewpoint2 = $viewpoint2;
        return $this;
    }

    public function getRegionId(): int|null
    {
        return $this->region_id;
    }

    public function setRegionId(int|null $region_id): ItemsRequest
    {
        $this->region_id = $region_id;
        return $this;
    }

    public function getPage(): int|null
    {
        return $this->page;
    }

    public function setPage(int|null $page): ItemsRequest
    {
        $this->page = $page;
        return $this;
    }

    public function getPageSize(): int|null
    {
        return $this->page_size;
    }

    public function setPageSize(int|null $page_size): ItemsRequest
    {
        $this->page_size = $page_size;
        return $this;
    }

    public function getRubricId(): array|null
    {
        return $this->rubric_id;
    }

    public function setRubricId(array|null $rubric_id): ItemsRequest
    {
        $this->rubric_id = $rubric_id;
        return $this;
    }

    public function getOrgId(): int|null
    {
        return $this->org_id;
    }

    public function setOrgId(int|null $org_id): ItemsRequest
    {
        $this->org_id = $org_id;
        return $this;
    }

    public function getHasPhotos(): bool|null
    {
        return $this->has_photos;
    }

    public function setHasPhotos(bool|null $has_photos): ItemsRequest
    {
        $this->has_photos = $has_photos;
        return $this;
    }

    public function getHasRating(): bool|null
    {
        return $this->has_rating;
    }

    public function setHasRating(bool|null $has_rating): ItemsRequest
    {
        $this->has_rating = $has_rating;
        return $this;
    }

    public function getHasReviews(): bool|null
    {
        return $this->has_reviews;
    }

    public function setHasReviews(bool|null $has_reviews): ItemsRequest
    {
        $this->has_reviews = $has_reviews;
        return $this;
    }

    public function getHasSite(): bool|null
    {
        return $this->has_site;
    }

    public function setHasSite(bool|null $has_site): ItemsRequest
    {
        $this->has_site = $has_site;
        return $this;
    }

    public function getWorkTime(): string|null
    {
        return $this->work_time;
    }

    public function setWorkTime(string|null $work_time): ItemsRequest
    {
        $this->work_time = $work_time;
        return $this;
    }

    public function getOpenedAfterDate(): DateTimeInterface|null
    {
        return $this->opened_after_date;
    }

    public function setOpenedAfterDate(DateTimeInterface|null $opened_after_date): ItemsRequest
    {
        $this->opened_after_date = $opened_after_date;
        return $this;
    }

    public function getHasItin(): bool|null
    {
        return $this->has_itin;
    }

    public function setHasItin(bool|null $has_itin): ItemsRequest
    {
        $this->has_itin = $has_itin;
        return $this;
    }

    public function getHasTradeLicense(): bool|null
    {
        return $this->has_trade_license;
    }

    public function setHasTradeLicense(bool|null $has_trade_license): ItemsRequest
    {
        $this->has_trade_license = $has_trade_license;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'locale' => $this->locale?->value,
            'q' => $this->q,
            'type' => $this->type !== null ? implode(',', array_map(fn(ItemTypeEnum $e) => $e->value, $this->type)) : null,
            'fields' => $this->fields !== null ? implode(',', $this->fields) : null,
            'search_type' => $this->search_type?->value,
            'search_is_query_text_complete' => $this->search_is_query_text_complete,
            'search_nearby' => $this->search_nearby,
            'search_input_method' => $this->search_input_method?->value,
            'sort' => $this->sort?->value,
            'location' => $this->pointToStr($this->location),
            'lon' => $this->lon,
            'lat' => $this->lat,
            'point' => $this->pointToStr($this->point),
            'radius' => $this->radius,
            'district_id' => $this->district_id !== null ?  implode(',', $this->district_id) : null,
            'building_id' => $this->building_id !== null ?  implode(',', $this->building_id) : null,
            'city_id' => $this->city_id !== null ?  implode(',', $this->city_id) : null,
            'subway' => $this->subway !== null ?  implode(',', $this->subway) : null,
            'point1' => $this->pointToStr($this->point1),
            'point2' => $this->pointToStr($this->point2),
            'polygon' => $this->polygon !== null ? (string)$this->polygon : null,
            'viewpoint1' => $this->pointToStr($this->viewpoint1),
            'viewpoint2' => $this->pointToStr($this->viewpoint2),
            'region_id' => $this->region_id,
            'page' => $this->page,
            'page_size' => $this->page_size,
            'rubric_id' => $this->rubric_id !== null ? implode(',', $this->rubric_id) : null,
            'org_id' => $this->org_id,
            'has_photos' => $this->has_photos,
            'has_rating' => $this->has_rating,
            'has_reviews' => $this->has_reviews,
            'has_site' => $this->has_site,
            'work_time' => $this->work_time,
            'opened_after_date' => $this->opened_after_date?->format('Y-m-d'),
            'has_itin' => $this->has_itin,
            'has_trade_license' => $this->has_trade_license,
        ];
    }

    private function pointToStr(Point|null $p): string|null
    {
        return $p ? "{$p->getLon()},{$p->getLat()}" : null;
    }
}
