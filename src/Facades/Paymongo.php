<?php

namespace Luigel\LaravelPaymongo\Facades;

use Illuminate\Support\Facades\Facade;
use Luigel\LaravelPaymongo\Paymongo as PaymongoFacade;

/**
 * @see \Luigel\LaravelPaymongo\Skeleton\SkeletonClass
 * @method static Paymongo token()
 * @method static Paymongo payment()
 * @method static Paymongo source()
 * @method static Paymongo webhook()
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
