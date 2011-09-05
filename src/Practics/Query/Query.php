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

use Practics\Query\GetQuery;
use Practics\Query\SetQuery;

class Query
{
    public function get($id)
    {
        return new GetQuery($id);
    }

    public function set($id)
    {
        return new SetQuery($id);
    }
}
