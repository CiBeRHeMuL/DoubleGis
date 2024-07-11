<?php

namespace AndrewGos\DoubleGis\Request;

class RegionGetRequest implements RequestInterface
{
    /**
     * @param string|null $id Идентификатор региона. Конфликтует с параметром branch_id. Можно также передать несколько идентификаторов через запятую.
     * @param string|null $branch_id Идентификатор филиала. Конфликтует с параметром id. Необходим для получения региона.
     * @param array|null $fields Дополнительные поля, которые необходимо отобразить в ответе, перечисляются через запятую.
     */
    public function __construct(
        protected string|null $id = null,
        protected string|null $branch_id = null,
        protected array|null $fields = null,
    ) {
    }

    public function getId(): string|null
    {
        return $this->id;
    }

    public function setId(string|null $id): RegionGetRequest
    {
        $this->id = $id;
        return $this;
    }

    public function getBranchId(): string|null
    {
        return $this->branch_id;
    }

    public function setBranchId(string|null $branch_id): RegionGetRequest
    {
        $this->branch_id = $branch_id;
        return $this;
    }

    public function getFields(): array|null
    {
        return $this->fields;
    }

    public function setFields(array|null $fields): RegionGetRequest
    {
        $this->fields = $fields;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'branch_id' => $this->branch_id,
            'fields' => $this->fields !== null
                ? implode(',', $this->fields)
                : null,
        ];
    }
}
