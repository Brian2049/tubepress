<?php
/*
tp_classes.php

The classes used in TubePress

Copyright (C) 2007 Eric D. Hough (k2eric@gmail.com)

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

/**
 * Serves as a constant object to hold CSS info
*/
class TubePressCSS
{
    /**
     * Constructor
     */
    function TubePressCSS()
    {
        $this->container =             "tubepress_container";
        $this->mainVid_id =            "tubepress_mainvideo";
        $this->mainVid_class =         "tubepress_mainvideo";
        $this->meta_class =            "tubepress_meta";
        $this->thumb_container_class = "tubepress_video_thumbs";
        $this->thumb_class =           "tubepress_thumb";
        $this->thumbImg_class =        "tubepress_video_thumb_img";
        $this->runtime_class =         "tubepress_runtime";
        $this->title_class =           "tubepress_title";
        $this->success_class =         "updated fade";
        $this->meta_group =            "tubepress_meta_group";
        $this->pagination =            "tubepress_pagination";
        $this->nextlink =              "tubepress_next";
        $this->prevlink =              "tubepress_prev";
    }
}

/**
 * This class holds all of the options for the plugin,
 * both pulled from the db and those the user defined
 * in the tag string.
 */
class TubePressTag
{
    var $tagString, $customOptions, $dbOptions;

    /**
     * Constructor
     */
    function TubePressTag($tagString, $optionsArray)
    {
        $this->tagString = $tagString;
        $this->customOptions = $optionsArray;
        foreach (get_option(TP_OPTION_NAME) as $dbOptionArray) {
            foreach ($dbOptionArray as $dbOption) {
                $this->dbOptions[$dbOption->name] = $dbOption->value;
            }
        }
        $this->customOptions['site_url'] = get_settings('siteurl');
    }

    /**
     * First checks the tag string for the option, otherwise gets what
     * was in the db
     */
    function get_option($option = '')
    {
        if (!empty($this->customOptions)
            && isset($this->customOptions[$option])) {
                return $this->customOptions[$option];
        }
        if (!empty($this->dbOptions)
            && isset($this->dbOptions[$option])) {
                return $this->dbOptions[$option];
        }
    }
}

/**
 * This class represents a video pulled from YouTube
 */
class TubePressVideo
{
    var $metaValues;

    /**
     * Constructor
     */
    function TubePressVideo($videoXML)
    {
            $this->metaValues =
                array(TP_VID_AUTHOR =>
                          $videoXML['author'],
                        
                      TP_VID_ID =>          
                          $videoXML['id'],
                          
                      TP_VID_TITLE =>       
                          str_replace("'","&#145;", $videoXML['title']),
                          
                      TP_VID_LENGTH =>      
                          tp_humanTime($videoXML['length_seconds']),
                          
                      TP_VID_RATING_AVG =>  
                          $videoXML['rating_avg'],
                          
                      TP_VID_RATING_CNT =>  
                          number_format($videoXML['rating_count']),
                          
                      TP_VID_DESC =>        
                          $videoXML['description'],
                          
                      TP_VID_VIEW =>        
                          number_format($videoXML['view_count']),
                          
                      TP_VID_UPLOAD_TIME => 
                          date("M j, Y", $videoXML['upload_time']),
                          
                      TP_VID_COMMENT_CNT => 
                          number_format($videoXML['comment_count']),
                          
                      TP_VID_TAGS =>        
                          $videoXML['tags'],
                          
                      TP_VID_URL =>         
                          $videoXML['url'],
                          
                      TP_VID_THUMBURL =>    
                          $videoXML['thumbnail_url']);
        
    }
}

/**
 * A single TubePress option
 */
class TubePressOption
{
    var $name, $title, $description, $value;

    /**
     * Constructor
     */
    function TubePressOption($theName, $theTitle, $theDesc, $theValue)
    {
        $this->name = $theName;
        $this->description = $theDesc;
        $this->value = $theValue;
        $this->title = $theTitle;
    }
}
?>