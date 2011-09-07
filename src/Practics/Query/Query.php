<?php

/*
 * This file is part of the Practics PHP API
 *
 * (c) 2011-2012 Practo.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Practics\Query;

use Practics\Query\PullQuery;
use Practics\Query\InsertQuery;
use Practics\Query\RemoveQuery;

class Query
{
    public function pull($id)
    {
        return new PullQuery($id);
    }

    public function insert($id)
    {
        return new InsertQuery($id);
    }

    public function remove($id)
    {
        return new RemoveQuery($id);
    }
}
