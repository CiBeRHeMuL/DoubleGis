<?php

namespace AndrewGos\DoubleGis\Entity;

use DateTime;
use stdClass;

class Dates implements EntityInterface
{
    /**
     * @param DateTime|null $created_at Дата открытия организации в формате ISO 8601.
     * @param DateTime|null $updated_at Дата последнего изменения информации об организации в формате ISO 8601.
     * @param DateTime|null $deleted_at Дата удаления организации из базы в формате ISO 8601.
     */
    public function __construct(
        protected DateTime|null $created_at = null,
        protected DateTime|null $updated_at = null,
        protected DateTime|null $deleted_at = null,
    ) {
    }

    public function getCreatedAt(): DateTime|null
    {
        return $this->created_at;
    }

    public function setCreatedAt(DateTime|null $created_at): Dates
    {
        $this->created_at = $created_at;
        return $this;
    }

    public function getUpdatedAt(): DateTime|null
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(DateTime|null $updated_at): Dates
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    public function getDeletedAt(): DateTime|null
    {
        return $this->deleted_at;
    }

    public function setDeletedAt(DateTime|null $deleted_at): Dates
    {
        $this->deleted_at = $deleted_at;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at?->format('Y-m-d H:i:s'),
            'deleted_at' => $this->deleted_at?->format('Y-m-d H:i:s'),
        ];
    }
}
