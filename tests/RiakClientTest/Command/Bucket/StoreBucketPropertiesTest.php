<?php

namespace RiakClientTest\Command\Bucket;

use RiakClientTest\TestCase;
use Riak\Client\Core\RiakNode;
use Riak\Client\RiakClientBuilder;
use Riak\Client\Core\Query\RiakNamespace;
use Riak\Client\Command\Bucket\StoreBucketProperties;

class StoreBucketPropertiesTest extends TestCase
{
    /**
     * @var \Riak\Client\Core\Query\RiakNamespace
     */
    private $namespace;

    /**
     * @var \Riak\Client\RiakClient
     */
    private $client;

    /**
     * @var \Riak\Client\Core\RiakTransport
     */
    private $adapter;

    protected function setUp()
    {
        parent::setUp();

        $builder = new RiakClientBuilder();

        $this->adapter   = $this->getMock('Riak\Client\Core\RiakTransport');
        $this->namespace = new RiakNamespace('bucket', 'type');
        $this->node      = new RiakNode($this->adapter);
        $this->client    = $builder
            ->withNode($this->node)
            ->build();
    }

    public function testBuildCommand()
    {
        $builder = StoreBucketProperties::builder()
            ->withNamespace($this->namespace);

        $this->assertInstanceOf('Riak\Client\Command\Bucket\StoreBucketProperties', $builder->build());
    }
}