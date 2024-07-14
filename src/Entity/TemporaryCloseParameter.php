<?php

namespace AndrewGos\DoubleGis\Entity;

use stdClass;

class TemporaryCloseParameter implements EntityInterface
{
    /**
     * @param string $type Тип параметра.
     * @param string $value Значение параметра.
     * @param string $name Имя параметра.
     */
    public function __construct(
        protected string $type,
        protected string $value,
        protected string $name,
    ) {
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): TemporaryCloseParameter
    {
        $this->type = $type;
        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): TemporaryCloseParameter
    {
        $this->value = $value;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): TemporaryCloseParameter
    {
        $this->name = $name;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type,
            'value' => $this->value,
            'name' => $this->name,
        ];
    }
}
