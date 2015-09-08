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
 * @category   ServiceProvider
 * @package    NachoNerd\Silex\Finder
 * @subpackage ControllerProvider
 * @author     Ignacio R. Galieri <irgalieri@gmail.com>
 * @copyright  2015 Ignacio R. Galieri
 * @license    GNU GPL v3
 * @link       https://github.com/nachonerd/markdownblog
 */

namespace NachoNerd\Silex\Finder;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Symfony\Component\Finder\Finder;


/**
 * Provider Class
 *
 * @category   ControllerProvider
 * @package    NachoNerdMarkdownBlog
 * @subpackage ControllerProviders
 * @author     Ignacio R. Galieri <irgalieri@gmail.com>
 * @copyright  2015 Ignacio R. Galieri
 * @license    GNU GPL v3
 * @link       https://github.com/nachonerd/markdownblog
 */
class Provider implements ServiceProviderInterface
{
    /**
     * Register
     *
     * @param Application $app [description]
     *
     * @return void
     */
    public function register(Application $app)
    {
        $app['nn.finder'] = $app->share(
            function () use ($app) {
                return new Finder();
            }
        );
    }
    /**
     * Boot
     *
     * @param Application $app [description]
     *
     * @return void
     */
    public function boot(Application $app)
    {

    }
}
