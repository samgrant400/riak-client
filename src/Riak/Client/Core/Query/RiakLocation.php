<?php

namespace Riak\Client\Core\Query;

/**
 * Encapsulates a key and Namespace.
 *
 * @author Fabio B. Silva <fabio.bat.silva@gmail.com>
 */
class RiakLocation
{
    /**
     * @var \Riak\Client\Core\Query\RiakNamespace
     */
    private $namespace;

    /**
     * @var string
     */
    private $key;

    /**
     * @param \Riak\Client\Core\Query\RiakNamespace $namespace
     * @param string                                $key
     */
    public function __construct(RiakNamespace $namespace, $key)
    {
        $this->namespace = $namespace;
        $this->key       = (string) $key;
    }

    /**
     * Returns the key for this location.
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * Return the Namespace for this location.
     *
     * @return \Riak\Client\Core\Query\RiakNamespace
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * @param \Riak\Client\Core\Query\RiakNamespace $namespace
     */
    public function setNamespace(RiakNamespace $namespace)
    {
        $this->namespace = $namespace;
    }
}
