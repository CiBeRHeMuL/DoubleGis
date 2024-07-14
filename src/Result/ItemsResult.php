<?php

namespace AndrewGos\DoubleGis\Result;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\DoubleGis\Entity\ContextRubric;
use AndrewGos\DoubleGis\Entity\SearchAttributes;

readonly class ItemsResult
{
    /**
     * @param int $total Количество найденных объектов.
     * @param array $items Объекты результата.
     * @param SearchAttributes|null $search_attributes Информация о произведённом поиске.
     * @param ContextRubric[]|null $context_rubrics Массив контекстных категорий.
     */
    public function __construct(
        protected int $total,
        protected array $items,
        protected SearchAttributes|null $search_attributes = null,
        #[ArrayType(ContextRubric::class)] protected array|null $context_rubrics = null,
    ) {
    }
}
