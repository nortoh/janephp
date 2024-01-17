<?php

namespace Docker\Api\Model;

class NetworksCreatePostResponse201
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
     * The ID of the created network.
     *
     * @var string
     */
    protected $iD;
    /**
     * 
     *
     * @var string
     */
    protected $warning;
    /**
     * The ID of the created network.
     *
     * @return string
     */
    public function getID(): string
    {
        return $this->iD;
    }
    /**
     * The ID of the created network.
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
    /**
     * 
     *
     * @return string
     */
    public function getWarning(): string
    {
        return $this->warning;
    }
    /**
     * 
     *
     * @param string $warning
     *
     * @return self
     */
    public function setWarning(string $warning): self
    {
        $this->initialized['warning'] = true;
        $this->warning = $warning;
        return $this;
    }
}