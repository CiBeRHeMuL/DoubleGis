<?php

namespace AndrewGos\DoubleGis\Enum;

enum RegionTypeEnum: string
{
    case Region = 'region'; // регион
    case Segment = 'segment'; // сегмент
    case Universe = 'universe'; // universe
}
