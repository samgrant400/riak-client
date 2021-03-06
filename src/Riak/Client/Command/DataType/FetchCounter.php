<?php

namespace Riak\Client\Command\DataType;

use Riak\Client\Core\RiakCluster;
use Riak\Client\Core\Query\RiakLocation;
use Riak\Client\Command\DataType\Builder\FetchCounterBuilder;
use Riak\Client\Core\Operation\DataType\FetchCounterOperation;

/**
 * Command used to fetch a counter datatype from Riak.
 *
 * @author Fabio B. Silva <fabio.bat.silva@gmail.com>
 */
class FetchCounter extends FetchDataType
{
    /**
     * {@inheritdoc}
     */
    public function execute(RiakCluster $cluster)
    {
        $config    = $cluster->getRiakConfig();
        $converter = $config->getCrdtResponseConverter();
        $operation = new FetchCounterOperation($converter, $this->location, $this->options);
        $response  = $cluster->execute($operation);

        return $response;
    }

    /**
     * @param \Riak\Client\Command\Kv\RiakLocation $location
     * @param array                                $options
     *
     * @return \Riak\Client\Command\DataType\Builder\FetchCounterBuilder
     */
    public static function builder(RiakLocation $location = null, array $options = [])
    {
        return new FetchCounterBuilder($location, $options);
    }
}
