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
class FinderTest extends \PHPUnit_Framework_TestCase
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
    public function testInstanceOfFinder()
    {
        $this->assertInstanceOf(
            'Symfony\Component\Finder\Finder',
            new NachoNerd\Silex\Finder\Extensions\Finder()
        );
    }

    /**
     * Test Sort By Name Desc
     *
     * @return void
     */
    public function testSortByNameDesc()
    {
        $path = realpath(__DIR__."/../../resources/")."/";
        $newFinder = new NachoNerd\Silex\Finder\Extensions\Finder();
        $oldFinder = new Symfony\Component\Finder\Finder();

        $oldFinder->sort(
            function ($a, $b) {
                return strcmp($b->getRealpath(), $a->getRealpath());
            }
        )->in($path);

        $newFinder->sortByNameDesc()->in($path);

        $filesOldWay = array();
        foreach ($oldFinder as $files) {
            $filesOldWay[] = $files;
        }

        $filesNewWay = array();
        foreach ($newFinder as $files) {
            $filesNewWay[] = $files;
        }

        $this->assertEquals(
            $filesOldWay,
            $filesNewWay
        );
    }

    /**
     * Test Sort By Type Desc
     *
     * @return void
     */
    public function testSortByTypeDesc()
    {
        $path = realpath(__DIR__."/../../resources/")."/";
        $newFinder = new NachoNerd\Silex\Finder\Extensions\Finder();
        $oldFinder = new Symfony\Component\Finder\Finder();

        $oldFinder->sort(
            function ($a, $b) {
                if ($a->isDir() && $b->isFile()) {
                    return 1;
                } elseif ($a->isFile() && $b->isDir()) {
                    return -1;
                }

                return strcmp($b->getRealpath(), $a->getRealpath());
            }
        )->in($path);

        $newFinder->sortByTypeDesc()->in($path);

        $filesOldWay = array();
        foreach ($oldFinder as $files) {
            $filesOldWay[] = $files;
        }


        $filesNewWay = array();
        foreach ($newFinder as $files) {
            $filesNewWay[] = $files;
        }

        $this->assertEquals(
            $filesOldWay,
            $filesNewWay
        );
    }

    /**
     * Test Sort By Accessed Time Desc
     *
     * @return void
     */
    public function testSortByAccessedTimeDesc()
    {
        $path = realpath(__DIR__."/../../resources/")."/";
        $newFinder = new NachoNerd\Silex\Finder\Extensions\Finder();
        $oldFinder = new Symfony\Component\Finder\Finder();

        $oldFinder->sort(
            function ($a, $b) {
                return ($b->getATime() - $a->getATime());
            }
        )->in($path);

        $newFinder->sortByAccessedTimeDesc()->in($path);

        $filesOldWay = array();
        foreach ($oldFinder as $files) {
            $filesOldWay[] = $files;
        }


        $filesNewWay = array();
        foreach ($newFinder as $files) {
            $filesNewWay[] = $files;
        }

        $this->assertEquals(
            $filesOldWay,
            $filesNewWay
        );
    }

    /**
     * Test Sort By Changed Time Desc
     *
     * @return void
     */
    public function testSortByChangedTimeDesc()
    {
        $path = realpath(__DIR__."/../../resources/")."/";
        $newFinder = new NachoNerd\Silex\Finder\Extensions\Finder();
        $oldFinder = new Symfony\Component\Finder\Finder();

        $oldFinder->sort(
            function ($a, $b) {
                return ($b->getCTime() - $a->getCTime());
            }
        )->in($path);

        $newFinder->sortByChangedTimeDesc()->in($path);

        $filesOldWay = array();
        foreach ($oldFinder as $files) {
            $filesOldWay[] = $files;
        }


        $filesNewWay = array();
        foreach ($newFinder as $files) {
            $filesNewWay[] = $files;
        }

        $this->assertEquals(
            $filesOldWay,
            $filesNewWay
        );
    }

    /**
     * Test Sort By Modified Time Desc
     *
     * @return void
     */
    public function testSortByModifiedTimeDesc()
    {
        $path = realpath(__DIR__."/../../resources/")."/";
        $newFinder = new NachoNerd\Silex\Finder\Extensions\Finder();
        $oldFinder = new Symfony\Component\Finder\Finder();

        $oldFinder->sort(
            function ($a, $b) {
                return ($b->getMTime() - $a->getMTime());
            }
        )->in($path);

        $newFinder->sortByModifiedTimeDesc()->in($path);

        $filesOldWay = array();
        foreach ($oldFinder as $files) {
            $filesOldWay[] = $files;
        }


        $filesNewWay = array();
        foreach ($newFinder as $files) {
            $filesNewWay[] = $files;
        }

        $this->assertEquals(
            $filesOldWay,
            $filesNewWay
        );
    }

    /**
     * ProviderTestUmpteenth
     *
     * @return array
     */
    public function providerTestUmpteenth()
    {
        return array(
            array(""),
            array(null),
            array("a"),
            array(1),
            array(2),
            array(4),
            array(5),
            array(10)
        );
    }

    /**
     * Test Get Umpteenth First
     *
     * @param integer $n Umpteenth Number
     *
     * @return void
     *
     * @dataProvider providerTestUmpteenth
     */
    public function testGetUmpteenthFirst($n)
    {
        $path = realpath(__DIR__."/../../resources/")."/";
        $newFinder = new NachoNerd\Silex\Finder\Extensions\Finder();
        $oldFinder = new Symfony\Component\Finder\Finder();

        $oldFinder->in($path);

        $newFinder->in($path);
        $newFinder = $newFinder->getNFirst($n);

        $filesOldWay = array();
        $j = 0;
        foreach ($oldFinder as $files) {
            if ($j == $n) {
                break;
            }
            $j++;
            $filesOldWay[] = $files;
        }


        $filesNewWay = array();
        foreach ($newFinder as $files) {
            $filesNewWay[] = $files;
        }

        $this->assertEquals(
            $filesOldWay,
            $filesNewWay
        );
    }

    /**
     * Test Get Umpteenth First
     *
     * @param integer $n Umpteenth Number
     *
     * @return void
     *
     * @dataProvider providerTestUmpteenth
     */
    public function testGetUmpteenthLastFirst($n)
    {
        $path = realpath(__DIR__."/../../resources/")."/";
        $newFinder = new NachoNerd\Silex\Finder\Extensions\Finder();
        $oldFinder = new Symfony\Component\Finder\Finder();

        $oldFinder->sort(
            function ($a, $b) {
                return ($b->getMTime() - $a->getMTime());
            }
        )->in($path);

        $newFinder->sortByModifiedTimeDesc()->in($path);
        $newFinder = $newFinder->getNFirst($n);

        $filesOldWay = array();
        $j = 0;
        foreach ($oldFinder as $files) {
            if ($j == $n) {
                break;
            }
            $j++;
            $filesOldWay[] = $files;
        }


        $filesNewWay = array();
        foreach ($newFinder as $files) {
            $filesNewWay[] = $files;
        }

        $this->assertEquals(
            $filesOldWay,
            $filesNewWay
        );
    }
}
