<?php

namespace Chromabits\Tests\Purifier;

use Chromabits\Purifier\Purifier;
use Chromabits\Tests\TestCase;
use Illuminate\Config\Repository;
use Mockery as m;

/**
 * Class PurifierTest
 *
 * @package Chromabits\Tests\Purifier
 */
class PurifierTest extends TestCase
{
    public function testConstructor()
    {
        $config = new Repository([]);

        new Purifier($this->app, $config);
    }

    public function testClean()
    {
        $config = new Repository([]);

        $purifier = new Purifier($this->app, $config);

        $result = $purifier->clean('<script></script><p>Some string</p>');

        $this->assertEquals('<p>Some string</p>', $result);
    }

    public function testCleanWithConfigFile()
    {
        $config = new Repository([
            'purifier' => [
                'settings' => [
                    'default' => [
                        'HTML.Doctype' => 'XHTML 1.0 Strict',
                        'HTML.Allowed' => 'div,b,strong,i,em,a[href|title],ul,ol,li,p[style],br,span[style],img[width|height|alt|src]',
                        'CSS.AllowedProperties' => 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align',
                        'AutoFormat.AutoParagraph' => false,
                        'AutoFormat.RemoveEmpty' => true,
                    ]
                ]
            ]
        ]);

        $purifier = new Purifier($this->app, $config);

        $result = $purifier->clean('<script></script>Some string');

        $this->assertEquals('Some string', $result);
    }

    public function testCleanWithConfigInheritance()
    {
        $config = new Repository([
            'purifier' => [
                'settings' => [
                    'myconfig' => [
                        'HTML.Allowed' => 'div,b,strong,i,em,a[href|title],ul,ol,li,p[style],br,span[style]',
                        'AutoFormat.AutoParagraph' => false,
                    ]
                ]
            ]
        ]);

        $purifier = new Purifier($this->app, $config);

        $result = $purifier->clean('<script></script>Some string<img />', 'myconfig');

        $this->assertEquals('Some string', $result);
    }
}
