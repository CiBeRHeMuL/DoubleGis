<?php

namespace AndrewGos\DoubleGis\Entity;

use stdClass;

class RegionOnlineLanguages implements EntityInterface
{
    /**
     * @param string $available
     * @param string $default_lang
     */
    public function __construct(
        protected string $available,
        protected string $default_lang,
    ) {
    }

    public function getAvailable(): string
    {
        return $this->available;
    }

    public function setAvailable(string $available): RegionOnlineLanguages
    {
        $this->available = $available;
        return $this;
    }

    public function getDefaultLang(): string
    {
        return $this->default_lang;
    }

    public function setDefaultLang(string $default_lang): RegionOnlineLanguages
    {
        $this->default_lang = $default_lang;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'available' => $this->available,
            'default_lang' => $this->default_lang,
        ];
    }
}
