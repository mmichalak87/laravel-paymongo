<?php

namespace Luigel\Paymongo\Facades;

use Illuminate\Support\Facades\Facade;
use Luigel\Paymongo\Paymongo as PaymongoFacade;

/**
 * @see \Luigel\Paymongo\Skeleton\SkeletonClass
 */
class Paymongo extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return PaymongoFacade::class;
    }
}
