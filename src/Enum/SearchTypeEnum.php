<?php

namespace AndrewGos\DoubleGis\Enum;

enum SearchTypeEnum: string
{
    /**
     * Максимально широкий поиск с возможностью раскрытия связанных объектов (категории, соответсвующие запросу,
     * будут раскрыты до входящих в них компаний)
     */
    case Discovery = 'discovery';
    /**
     * Идентичен discovery, но для организации будет отдан только один филиал компании
     */
    case OneBranch = 'one_branch';
    /**
     * Конфигурация для качественного поиска компаний в здании. Допускает поиск по префиксу, как подсказчик. Для отключения
     * префикса используйте search_is_query_text_complete
     */
    case Indoor = 'indoor';
    /**
     * Идентичен discovery, но будут выданы только объекты с рекламой. Кроме того, для организации будет отдан только один первый
     * по ранжированию филиал компании
     */
    case Ads = 'ads';
    /**
     * Идентичен discovery, но будет задействовано больше вариантов пересечений связей
     */
    case DiscoveryPartialSearcher = 'discovery_partial_searcher';
    /**
     * Идентичен discovery_partial_searcher, но с выключенным префиксным поиском
     */
    case DiscoveryPartialSearcherStrict = 'discovery_partial_searcher_strict';
}
