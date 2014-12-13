<?php

namespace Chromabits\Tests\Purifier;

use Mockery as m;
use Chromabits\Purifier\PurifierServiceProvider;
use Chromabits\Tests\TestCase;

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

        $mockApp->shouldReceive('bind')->once();

        $provider = new PurifierServiceProvider($mockApp);

        $provider->register();
    }
}
