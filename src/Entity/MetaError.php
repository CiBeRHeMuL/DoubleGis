<?php

namespace AndrewGos\DoubleGis\Entity;

use stdClass;

class MetaError implements EntityInterface
{
    /**
     * @param string $type Короткий уникальный текстовый код ошибки.
     * @param string $message Описание ошибки.
     */
    public function __construct(
        protected string $type,
        protected string $message,
    ) {
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): MetaError
    {
        $this->type = $type;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): MetaError
    {
        $this->message = $message;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type,
            'message' => $this->message,
        ];
    }
}
