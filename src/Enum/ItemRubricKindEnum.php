<?php

namespace AndrewGos\DoubleGis\Enum;

enum ItemRubricKindEnum: string
{
    case Primary = 'primary'; // основная
    case Additional = 'additional'; // дополнительная
    case Geo = 'geo'; // гео
}
