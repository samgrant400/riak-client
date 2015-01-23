<?php

namespace Riak\Client\Command\Bucket\Builder;

use Riak\Client\Command\Bucket\ListBuckets;
use Riak\Client\Core\Query\RiakNamespace;

/**
 * Used to construct a ListBuckets command.
 *
 * @author Fabio B. Silva <fabio.bat.silva@gmail.com>
 */
class ListBucketsBuilder extends Builder
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var array
     */
    protected $options = [];

    /**
     * @param string $type
     */
    public function __construct(RiakNamespace $type = null)
    {
        $this->type = $type;
    }

    /**
     * @param string $type
     *
     * @return \Riak\Client\Command\Bucket\Builder\ListBucketsBuilder
     */
    public function withType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Add an optional setting for this command.
     * This will be passed along with the request to Riak.
     *
     * @param string $option
     * @param mixed  $value
     *
     * @return \Riak\Client\Command\Bucket\Builder\ListBucketsBuilder
     */
    public function withOption($option, $value)
    {
        $this->options[$option] = $value;

        return $this;
    }

    /**
     * Build a command object
     *
     * @return \Riak\Client\Command\Bucket\FetchBucketProperties
     */
    public function build()
    {
        return new ListBuckets($this->type, $this->options);
    }
}