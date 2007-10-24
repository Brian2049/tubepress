<?php
/**
 * TubePressStatic.php
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

defined(TP_OPTION_NAME)
    || require(dirname(__FILE__) . "/../../defines.php");

/**
 * A bunch of "static" utilities that are used throughout the app
 */
class TubePressStatic
{    
    /**
     * Take a PEAR error object and return a prettified message
     */
    function bail($error)
    {
        $returnMsg = sprintf("%s<br /><br />", $error->message);
        return $returnMsg;
    }
    
    /**
     * Returns what's in the address bar (obviously, only http, not https)
     */
    function fullURL()
    {
        return "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    }
    
    /**
     * Try to figure out what page we're on by looking at the query string
     * Defaults to '1' if there's any doubt
     */
    function getPageNum()
    {
        $pageNum = ((isset($_GET[TP_PARAM_PAGE]))?
            $_GET[TP_PARAM_PAGE] : 1);
            if (!is_numeric($pageNum)
                || ($pageNum < 1)) {
                $pageNum = 1;
            }
        return $pageNum;
    }
}
?>