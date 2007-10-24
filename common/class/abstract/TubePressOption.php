<?php
/**
 * TubePressOption.php
 * 
 * Copyright (C) 2007 Eric D. Hough (http://ehough.com)
 * 
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

class_exists("PEAR")
    || require(dirname(__FILE__) . "/../../../lib/PEAR/PEAR.php");
class_exists("TubePressDataItem")
    || require("TubePressDataItem.php");

/**
 * An "abstract" TubePressOption
 */
class TubePressOption extends TubePressDataItem
{
    /**
     * Makes sure that the candidate value is of the
     * appropriate type. This is meant to be used by the
     * subclasses only
     */
    function checkType($candidate, $type)
    {
        if (gettype($candidate) != $type) {
            return PEAR::raiseError(
            	vsprintf("Type mismatch while setting the value for '%s'. " .
                "Expected any %s but instead got '%s' of type '%s'",
                	array($this->_title, $type,
                	$candidate, gettype($candidate))));
        }
    }
}
?>
