<?php

namespace Docker\Api\Model;

class ContainersCreatePostResponse201
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
     * The ID of the created container
     *
     * @var string
     */
    protected $iD;
    /**
     * Warnings encountered when creating the container
     *
     * @var string[]
     */
    protected $warnings;
    /**
     * The ID of the created container
     *
     * @return string
     */
    public function getID(): string
    {
        return $this->iD;
    }
    /**
     * The ID of the created container
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
     * Warnings encountered when creating the container
     *
     * @return string[]
     */
    public function getWarnings(): array
    {
        return $this->warnings;
    }
    /**
     * Warnings encountered when creating the container
     *
     * @param string[] $warnings
     *
     * @return self
     */
    public function setWarnings(array $warnings): self
    {
        $this->initialized['warnings'] = true;
        $this->warnings = $warnings;
        return $this;
    }
}