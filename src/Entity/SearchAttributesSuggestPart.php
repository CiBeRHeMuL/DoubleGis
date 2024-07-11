<?php

namespace AndrewGos\DoubleGis\Entity;

use stdClass;

class SearchAttributesSuggestPart implements EntityInterface
{
    /**
     * @param string $text Текст части подсказки.
     * @param bool $is_suggested Сообщает, является ли текст подсказанным:
     * true - текст сгенерирован подсказчиком;
     * false - текст совпадает с частью запроса.
     */
    public function __construct(
        protected string $text,
        protected bool $is_suggested,
    ) {
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): SearchAttributesSuggestPart
    {
        $this->text = $text;
        return $this;
    }

    public function isIsSuggested(): bool
    {
        return $this->is_suggested;
    }

    public function setIsSuggested(bool $is_suggested): SearchAttributesSuggestPart
    {
        $this->is_suggested = $is_suggested;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'text' => $this->text,
            'is_suggested' => $this->is_suggested,
        ];
    }
}
