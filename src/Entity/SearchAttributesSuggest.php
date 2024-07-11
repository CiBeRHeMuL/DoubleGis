<?php

namespace AndrewGos\DoubleGis\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

class SearchAttributesSuggest implements EntityInterface
{
    /**
     * @param string|null $suggested_text Строка подсказки для suggest.
     * @param SearchAttributesSuggestPart[]|null $suggest_parts Размеченная часть подсказки.
     */
    public function __construct(
        protected string|null $suggested_text = null,
        #[ArrayType(SearchAttributesSuggestPart::class)] protected array|null $suggest_parts = null,
    ) {
    }

    public function getSuggestedText(): string|null
    {
        return $this->suggested_text;
    }

    public function setSuggestedText(string|null $suggested_text): SearchAttributesSuggest
    {
        $this->suggested_text = $suggested_text;
        return $this;
    }

    public function getSuggestParts(): array|null
    {
        return $this->suggest_parts;
    }

    public function setSuggestParts(array|null $suggest_parts): SearchAttributesSuggest
    {
        $this->suggest_parts = $suggest_parts;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'suggested_text' => $this->suggested_text,
            'suggest_parts' => $this->suggest_parts !== null
                ? array_map(fn(SearchAttributesSuggestPart $e) => $e->toArray(), $this->suggest_parts)
                : null,
        ];
    }
}
