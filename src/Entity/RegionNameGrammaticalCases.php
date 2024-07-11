<?php

namespace AndrewGos\DoubleGis\Entity;

use stdClass;

class RegionNameGrammaticalCases implements EntityInterface
{
    /**
     * @param string|null $prepositional В предложном падеже.
     * @param string|null $accusative В винительном падеже.
     * @param string|null $dative В дательном падеже.
     * @param string|null $genitive В родительном падеже.
     */
    public function __construct(
        protected string|null $prepositional = null,
        protected string|null $accusative = null,
        protected string|null $dative = null,
        protected string|null $genitive = null,
    ) {
    }

    public function getPrepositional(): string|null
    {
        return $this->prepositional;
    }

    public function setPrepositional(string|null $prepositional): RegionNameGrammaticalCases
    {
        $this->prepositional = $prepositional;
        return $this;
    }

    public function getAccusative(): string|null
    {
        return $this->accusative;
    }

    public function setAccusative(string|null $accusative): RegionNameGrammaticalCases
    {
        $this->accusative = $accusative;
        return $this;
    }

    public function getDative(): string|null
    {
        return $this->dative;
    }

    public function setDative(string|null $dative): RegionNameGrammaticalCases
    {
        $this->dative = $dative;
        return $this;
    }

    public function getGenitive(): string|null
    {
        return $this->genitive;
    }

    public function setGenitive(string|null $genitive): RegionNameGrammaticalCases
    {
        $this->genitive = $genitive;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'prepositional' => $this->prepositional,
            'accusative' => $this->accusative,
            'dative' => $this->dative,
            'genitive' => $this->genitive,
        ];
    }
}
