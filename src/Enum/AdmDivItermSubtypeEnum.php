<?php

namespace AndrewGos\DoubleGis\Enum;

enum AdmDivItermSubtypeEnum: string
{
    case City = 'city'; // город
    case Settlement = 'settlement'; // населённый пункт
    case Division = 'division'; // округ
    case District = 'district'; // район
    case LivingArea = 'living_area'; // жилмассив, микрорайон
    case Place = 'place'; // место
    case DistrictArea = 'district_area'; // район области
    case Region = 'region'; // регион (область/край/республика и т.п.)
}
