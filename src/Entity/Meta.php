<?php

namespace AndrewGos\DoubleGis\Entity;

use AndrewGos\DoubleGis\Enum\HttpStatusCodeEnum;
use DateTime;
use stdClass;

class Meta implements EntityInterface
{
    /**
     * @param HttpStatusCodeEnum $code Код ответа.
     * @param string $api_version Текущая версия API.
     * @param DateTime $issue_date Дата последнего обновления данных.
     * @param MetaError|null $error Ошибка
     */
    public function __construct(
        protected HttpStatusCodeEnum $code,
        protected string $api_version,
        protected DateTime $issue_date,
        protected MetaError|null $error = null,
    ) {
    }

    public function getCode(): HttpStatusCodeEnum
    {
        return $this->code;
    }

    public function setCode(HttpStatusCodeEnum $code): Meta
    {
        $this->code = $code;
        return $this;
    }

    public function getApiVersion(): string
    {
        return $this->api_version;
    }

    public function setApiVersion(string $api_version): Meta
    {
        $this->api_version = $api_version;
        return $this;
    }

    public function getIssueDate(): DateTime
    {
        return $this->issue_date;
    }

    public function setIssueDate(DateTime $issue_date): Meta
    {
        $this->issue_date = $issue_date;
        return $this;
    }

    public function getError(): MetaError|null
    {
        return $this->error;
    }

    public function setError(MetaError|null $error): Meta
    {
        $this->error = $error;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'code' => $this->code->value,
            'api_version' => $this->api_version,
            'issue_date' => $this->issue_date->format('Ymd'),
            'error' => $this->error?->toArray(),
        ];
    }
}
