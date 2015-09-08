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
 * @category  Library
 * @package   NachoNerd\Silex\Finder\Extensions
 * @author    Ignacio R. Galieri <irgalieri@gmail.com>
 * @copyright 2015 Ignacio R. Galieri
 * @license   GNU GPL v3
 * @link      https://github.com/nachonerd/markdownblog
 */

namespace NachoNerd\Silex\Finder\Extensions;

use Symfony\Component\Finder\Finder as FinderBase;

/**
 * Provider Class
 *
 * @category  Library
 * @package   NachoNerd\Silex\Finder\Extensions
 * @author    Ignacio R. Galieri <irgalieri@gmail.com>
 * @copyright 2015 Ignacio R. Galieri
 * @license   GNU GPL v3
 * @link      https://github.com/nachonerd/markdownblog
 */
class Finder extends FinderBase
{
    /**
     * Sorts files and directories by name DESC.
     *
     * This can be slow as all the matching files and directories must
     * be retrieved for comparison.
     *
     * @return Finder The current Finder instance
     *
     * @see SortableIterator
     *
     * @api
     */
    public function sortByNameDesc()
    {
        $this->sort(
            function ($a, $b) {
                return strcmp($b->getRealpath(), $a->getRealpath());
            }
        );
        return $this;
    }

    /**
     * Sorts files and directories by type (directories after files),
     * then by name desc.
     *
     * This can be slow as all the matching files and directories must be
     * retrieved for comparison.
     *
     * @return Finder The current Finder instance
     *
     * @see SortableIterator
     *
     * @api
     */
    public function sortByTypeDesc()
    {
        $this->sort(
            function ($a, $b) {
                if ($a->isDir() && $b->isFile()) {
                    return 1;
                } elseif ($a->isFile() && $b->isDir()) {
                    return -1;
                }
                return strcmp($b->getRealpath(), $a->getRealpath());
            }
        );

        return $this;
    }

    /**
     * Sorts files and directories by the last accessed time desc.
     *
     * This is the time that the file was last accessed, read or written to.
     *
     * This can be slow as all the matching files and directories must be
     * retrieved for comparison.
     *
     * @return Finder The current Finder instance
     *
     * @see SortableIterator
     *
     * @api
     */
    public function sortByAccessedTimeDesc()
    {
        $this->sort(
            function ($a, $b) {
                return ($b->getATime() - $a->getATime());
            }
        );
        return $this;
    }

    /**
     * Sorts files and directories by the last inode changed time Desc.
     *
     * This is the time that the inode information was last modified
     * (permissions, owner, group or other metadata).
     *
     * On Windows, since inode is not available, changed time is actually the
     * file creation time.
     *
     * This can be slow as all the matching files and directories must be
     * retrieved for comparison.
     *
     * @return Finder The current Finder instance
     *
     * @see SortableIterator
     *
     * @api
     */
    public function sortByChangedTimeDesc()
    {
        $this->sort(
            function ($a, $b) {
                return ($b->getCTime() - $a->getCTime());
            }
        );
        return $this;
    }

    /**
     * Sorts files and directories by the last modified time Desc.
     *
     * This is the last time the actual contents of the file were
     * last modified.
     *
     * This can be slow as all the matching files and directories must be
     * retrieved for comparison.
     *
     * @return Finder The current Finder instance
     *
     * @see SortableIterator
     *
     * @api
     */
    public function sortByModifiedTimeDesc()
    {
        $this->sort(
            function ($a, $b) {
                return ($b->getMTime() - $a->getMTime());
            }
        );
        return $this;
    }

    /**
     * Get First N Files or Dirs
     *
     * @param integer $n Umpteenth Number
     *
     * @return Return a new Finder instance
     *
     * @see SortableIterator
     *
     * @api
     */
    public function getNFirst($n)
    {
        $it = new \ArrayIterator();
        $j = 0;
        foreach ($this as $file) {
            if ($j == $n) {
                break;
            }
            $j++;
            $it->append($file);
        }

        $finder = new static();
        $finder->append($it);

        return $finder;
    }
}
