<?php

require_once 'vendor/autoload.php';

$gis = \AndrewGos\DoubleGis\DoubleGisFactory::getDefault(new \AndrewGos\DoubleGis\ValueObject\AuthToken('f161e74a-e7f5-4db4-8ea9-656f0a105467'));

$a = $gis->getApi()->items(new \AndrewGos\DoubleGis\Request\ItemsRequest(q: 'Королев', type: [\AndrewGos\DoubleGis\Enum\ItemTypeEnum::AdmDivCity]));
$b = 1;
