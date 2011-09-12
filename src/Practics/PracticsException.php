<?php

/*
 * This file is part of the Practics PHP API
 *
 * (c) 2011-2012 Practo.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Practics;

class PracticsException extends \Exception
{
    const PRACTICS_EXCEPTION_BAD_REQUEST = 400;
    const PRACTICS_EXCEPTION_SERVER_DOWN = 503;
}
