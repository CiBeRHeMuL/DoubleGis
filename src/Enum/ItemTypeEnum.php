<?php

namespace AndrewGos\DoubleGis\Enum;

enum ItemTypeEnum: string
{
    case AdmDiv = 'adm_div';
    case AdmDivCity = 'adm_div.city'; // город
    case AdmDivCountry = 'adm_div.country'; // страна
    case AdmDivDistrict_area = 'adm_div.district_area'; // район области
    case AdmDivDistrict = 'adm_div.district'; // район
    case AdmDivDivision = 'adm_div.division'; // округ
    case AdmDivLiving_area = 'adm_div.living_area'; // жилмассив, микрорайон
    case AdmDivPlace = 'adm_div.place'; // разные площадные объекты: парки, пляжи, территории баз отдыха, озёра и прочие места
    case AdmDivRegion = 'adm_div.region'; // регион (область/край/республика и т.п.)
    case AdmDivSettlement = 'adm_div.settlement'; // населённый пункт (деревня, посёлок и т.п.)
}
