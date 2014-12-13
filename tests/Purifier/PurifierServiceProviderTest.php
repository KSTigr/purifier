<?php

namespace Chromabits\Tests\Purifier;

use Chromabits\Purifier\Contracts\Purifier;
use Chromabits\Purifier\PurifierServiceProvider;
use Chromabits\Tests\TestCase;
use Closure;
use Mockery as m;

/**
 * Class PurifierServiceProviderTest
 *
 * @package Chromabits\Tests\Purifier
 */
class PurifierServiceProviderTest extends TestCase
{
    public function testRegister()
    {
        $mockApp = m::mock('Illuminate\Contracts\Foundation\Application');

        $mockApp->shouldReceive('bind')->once(
            m::type('string'),
            m::type('closure')
        );

        $provider = new PurifierServiceProvider($mockApp);

        $provider->register();
    }
}
