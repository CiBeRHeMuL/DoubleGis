<?php

namespace AndrewGos\DoubleGis\Request;

class RubricGetRequest implements RequestInterface
{
    /**
     * @param array|null $id Идентификатор категории или набор идентификаторов, перечисленных через запятую. Конфликтует с alias.
     * @param string|null $alias Название псевдонима категории. Конфликтует с параметром id.
     * @param string $region_id Идентификатор региона.
     * @param string[]|null $fields Дополнительные поля, которые необходимо отобразить в ответе, перечисляются через запятую.
     */
    public function __construct(
        protected string $region_id,
        protected array|null $id = null,
        protected string|null $alias = null,
        protected array|null $fields = null,
    ) {
    }

    public function getId(): array|null
    {
        return $this->id;
    }

    public function setId(array|null $id): RubricGetRequest
    {
        $this->id = $id;
        return $this;
    }

    public function getAlias(): string|null
    {
        return $this->alias;
    }

    public function setAlias(string|null $alias): RubricGetRequest
    {
        $this->alias = $alias;
        return $this;
    }

    public function getRegionId(): string
    {
        return $this->region_id;
    }

    public function setRegionId(string $region_id): RubricGetRequest
    {
        $this->region_id = $region_id;
        return $this;
    }

    public function getFields(): array|null
    {
        return $this->fields;
    }

    public function setFields(array|null $fields): RubricGetRequest
    {
        $this->fields = $fields;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id !== null ? implode(',', $this->id) : null,
            'alias' => $this->alias,
            'region_id' => $this->region_id,
            'fields' => $this->fields !== null ? implode(',', $this->fields) : null,
        ];
    }
}
