<?php
/**
 * NachoNerd Silex Finder Provider
 * Copyright (C) 2015  Ignacio R. Galieri
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * PHP VERSION 5.4
 *
 * @category  TestCase
 * @package   Tests
 * @author    Ignacio R. Galieri <irgalieri@gmail.com>
 * @copyright 2015 Ignacio R. Galieri
 * @license   GNU GPL v3
 * @link      https://github.com/nachonerd/markdownblog
 */

/**
 * ProviderTest Class
 *
 * @category  TestCase
 * @package   Tests
 * @author    Ignacio R. Galieri <irgalieri@gmail.com>
 * @copyright 2015 Ignacio R. Galieri
 * @license   GNU GPL v3
 * @link      https://github.com/nachonerd/markdownblog
 */
class ProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Sets up the fixture. This method is called before a test is executed.
     *
     * @return void
     */
    public function setUp()
    {
        // To no call de parent setUp.
    }
    /**
     * Tears down the fixture. This method is called after a test is executed.
     *
     * @return void
     */
    protected function tearDown()
    {
    }

    /**
     * Test Instance Of Provider
     *
     * @return void
     */
    public function testInstanceOfProvider()
    {
        $this->assertInstanceOf(
            'Silex\ServiceProviderInterface',
            new NachoNerd\Silex\Finder\Provider()
        );
    }

    /**
     * Test Register Finder
     *
     * @return void
     */
    public function testRegisterFinder()
    {

        $app = new Silex\Application();
        $app->register(new \NachoNerd\Silex\Finder\Provider());

        $this->assertInstanceOf(
            'Symfony\Component\Finder\Finder',
            $app['nn.finder']
        );
    }

    /**
     * Test Boot Finder
     *
     * @return void
     */
    public function testBootFinder()
    {

        $app = new Silex\Application();
        $app->register(new \NachoNerd\Silex\Finder\Provider());
        $app->boot();

        $this->assertInstanceOf(
            'Symfony\Component\Finder\Finder',
            $app['nn.finder']
        );
    }
}
