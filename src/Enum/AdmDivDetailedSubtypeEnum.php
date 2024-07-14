<?php

namespace AndrewGos\DoubleGis\Enum;

enum AdmDivDetailedSubtypeEnum: string
{
    case City = 'city'; // город
    case Microdistrict = 'microdistrict'; // микрорайон
    case ResidentialDistrict = 'residential_district'; // жилмассив
    case ResidentialQuarter = 'residential_quarter'; // квартал
    case Poselok = 'poselok'; // посёлок
    case ResidentialComplex = 'residential_complex'; // жилой комплекс
    case Selo = 'selo'; // село
    case Derevnja = 'derevnja'; // деревня
    case CottageEstate = 'cottage_estate'; // коттеджный посёлок
    case UrbanSettlement = 'urban_settlement'; // посёлок городского типа
    case WorkersSettlement = 'workers_settlement'; // рабочий посёлок
    case DachaSettlement = 'dacha_settlement'; // дачный посёлок
    case ResortSettlement = 'resort_settlement'; // курортный посёлок
    case Stanitsa = 'stanitsa'; // станица
    case Sloboda = 'sloboda'; // слобода
    case Khutor = 'khutor'; // хутор
    case Aul = 'aul'; // аул
    case Aal = 'aal'; // аал
    case Town = 'town'; // (военный) городок
    case Farmstead = 'farmstead'; // заимка
    case Vyselok = 'vyselok'; // выселок
    case Municipality = 'municipality'; // муниципальное образование
    case Station = 'station'; // станция
    case TownhouseSettlement = 'townhouse_settlement'; // посёлок таунхаусов
    case Territory = 'territory'; // территория
    case Cooperative = 'cooperative'; // кооператив
    case Partnership = 'partnership'; // товарищество
}
