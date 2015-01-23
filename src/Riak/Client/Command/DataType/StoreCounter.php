<?php

namespace Riak\Client\Command\DataType;

use Riak\Client\Core\RiakCluster;
use Riak\Client\Core\Query\RiakLocation;
use Riak\Client\Core\Query\Crdt\Op\CounterOp;
use Riak\Client\Command\DataType\Builder\StoreCounterBuilder;
use Riak\Client\Core\Operation\DataType\StoreCounterOperation;

/**
 * Command used to update or create a counter datatype in Riak.
 *
 * @author Fabio B. Silva <fabio.bat.silva@gmail.com>
 */
class StoreCounter extends StoreDataType
{
    /**
     * @param \Riak\Client\Command\Kv\RiakLocation     $location
     * @param array                                   $options
     */
    public function __construct(RiakLocation $location, array $options = [])
    {
        parent::__construct($location, new CounterUpdate(), $options);
    }

    /**
     * @param integer $delta
     *
     * @return \Riak\Client\Command\DataType\Builder\StoreCounterBuilder
     */
    public function withDelta($delta)
    {
        $this->update->withDelta($delta);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function execute(RiakCluster $cluster)
    {
        $op        = $this->update->getOp();
        $config    = $cluster->getRiakConfig();
        $converter = $config->getCrdtResponseConverter();
        $operation = new StoreCounterOperation($converter, $this->location, $op, $this->options);
        $response  = $cluster->execute($operation);

        return $response;
    }

    /**
     * @param \Riak\Client\Command\Kv\RiakLocation     $location
     * @param array                                   $options
     *
     * @return \Riak\Client\Command\DataType\Builder\StoreCounterBuilder
     */
    public static function builder(RiakLocation $location = null, array $options = [])
    {
        return new StoreCounterBuilder($location, $options);
    }
}