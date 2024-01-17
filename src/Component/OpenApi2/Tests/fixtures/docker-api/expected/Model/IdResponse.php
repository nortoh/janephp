<?php

namespace Docker\Api\Model;

class IdResponse
{
    /**
     * @var array
     */
    protected $initialized = [];
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * The id of the newly created object.
     *
     * @var string
     */
    protected $iD;
    /**
     * The id of the newly created object.
     *
     * @return string
     */
    public function getID(): string
    {
        return $this->iD;
    }
    /**
     * The id of the newly created object.
     *
     * @param string $iD
     *
     * @return self
     */
    public function setID(string $iD): self
    {
        $this->initialized['iD'] = true;
        $this->iD = $iD;
        return $this;
    }
}