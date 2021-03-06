<?php

namespace Riak\Client\Core\Message\Search;

use Riak\Client\Core\Message\Response;

/**
 * This class represents a schema fetch response.
 *
 * @author Fabio B. Silva <fabio.bat.silva@gmail.com>
 */
class GetSchemaResponse extends Response
{
    public $name;
    public $content;
}
