<?php

/*
 * This file is part of OpenRTB package.
 * 
 * (c) Vahe Markarian <contact@vahemark.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace OpenRTB\Object;

use OpenRTB\Base;

/**
 * The banner object must be included directly in the impression object if the impression offered for auction is
 * display or rich media, or it may be optionally embedded in the video object to describe the companion banners
 * available for the linear or non-linear video ad. The banner object may include a unique identifier; this can be
 * useful if these IDs can be leveraged in the VAST response to dictate placement of the companion creatives when
 * multiple companion ad opportunities of the same size are available on a page.
 *
 * @author  Vahe Markarian <contact@vahemark.com>
 * @package \OpenRTB\Object
 */
class Banner extends Base\OpenRtbObject
{
    
    // Supported ad positions
    const AD_POSITION_UNKNOWN           = 0;
    const AD_POSITION_ABOVE_THE_FOLD    = 1;
    const AD_POSITION_VISIBILITY_VAGUE  = 2; // deprecated
    const AD_POSITION_BELOW_THE_FOLD    = 3;
    const AD_POSITION_HEADER            = 4;
    const AD_POSITION_FOOTER            = 5;
    const AD_POSITION_SIDEBAR           = 6;
    const AD_POSITION_FULLSCREEN        = 7;
    
    // Supported frame types
    const TOP_FRAME = 0;
    const IFRAME    = 1;
    
    // Supported expandable directions
    const DIRECTION_LEFT        = 1;
    const DIRECTION_RIGHT       = 2;
    const DIRECTION_UP          = 3;
    const DIRECTION_DOWN        = 4;
    const DIRECTION_FULLSCREEN  = 5;
    
    // Supported API frameworks
    const API_VPAID_1   = 1;
    const API_VPAID_2   = 2;
    const API_MRAID_1   = 3;
    const API_ORMMA     = 4;
    const API_MRAID_2   = 5;
    
    
    /**
     * Width of the impression in pixels. Since some ad types are not restricted by size this field is not required,
     * but it’s highly recommended that this information be included when possible.
     * 
     * @var     int
     * @field   w
     * @scope   recommended
     */
    private $width;
    
    /**
     * Height of the impression in pixels. Since some ad types are not restricted by size this field is not required,
     * but it’s highly recommended that this information be included when possible.
     * 
     * @var     int
     * @field   h
     * @scope   recommended
     */
    private $height;
    
    /**
     * Maximum width of the impression in pixels. If included, it indicates that a range of sizes is allowed with
     * this maximum width and "w" is taken as recommended. If not included, then "w" should be considered an exact
     * requirement.
     * 
     * @var     int
     * @field   wmax
     * @scope   optional
     */
    private $maxWidth;
    
    /**
     * Maximum height of the impression in pixels. If included, it indicates that a range of sizes is allowed with
     * this maximum height and "h" is taken as recommended. If not included, then "h" should be considered an exact
     * requirement.
     * 
     * @var     int
     * @field   hmax
     * @scope   optional
     */
    private $maxHeight;
    
    /**
     * Minimum width of the impression in pixels. If included, it indicates that a range of sizes is allowed with
     * this minimum width and "w" is taken as recommended. If not included, then "w" should be considered an exact
     * requirement.
     * 
     * @var     int
     * @field   wmin
     * @scope   optional
     */
    private $minWidth;
    
    /**
     * Minimum height of the impression in pixels. If included, it indicates that a range of sizes is allowed with
     * this minimum height and "h" is taken as recommended. If not included, then "h" should be considered an exact
     * requirement.
     * 
     * @var     int
     * @field   hmin
     * @scope   optional
     */
    private $minHeight;
    
    /**
     * Unique identifier for this banner object. Useful for tracking multiple banner objects (e.g., in companion
     * banner array). Usually starts with 1, increasing with each object. Combination of impression id banner object
     * should be unique.
     * 
     * @var     string
     * @field   id
     * @scope   recommended when subordinate to a video object
     */
    private $id;
    
    /**
     * Ad position.
     * 
     * Please check the class constants specific to the ad positions.
     * Please refer to http://www.iab.net/media/file/OpenRTBAPISpecificationVersion2_2.pdf in Table 6.5 for details.
     * 
     * @var     int
     * @field   pos
     * @scope   optional
     */
    private $adPosition;
    
    /**
     * Blocked creative types. If blank, assume all types are allowed.
     * 
     * @var     string[]
     * @field   btype
     * @scope   optional
     */
    private $blockedCreativeTypes;
    
    /**
     * Blocked creative attributes. If blank, assume all types are allowed.
     * 
     * @var     string[]
     * @field   battr
     * @scope   optional
     */
    private $blockedCreativeAttributes;
    
    /**
     * Whitelist of content MIME types supported. Popular MIME types include, but are notlimited to “image/jpg”,
     * “image/gif” and “application/x-shockwave-flash”.
     * 
     * @var     string[]
     * @field   mimes
     * @scope   optional
     */
    private $mimes;
    
    /**
     * Specify if the banner is delivered in the top frame or in an iframe. “0” means it is not in the top frame,
     * and “1” means that it is iframe.
     * 
     * Please check the class constants TOP_FRAME and IFRAME.
     * 
     * @var     int
     * @field   topframe
     * @scope   optional
     */
    private $topFrame = self::TOP_FRAME;
    
    /**
     * Specify properties for an expandable ad.
     * 
     * Please check the class constants specific to the expandable direction.
     * Please refer to http://www.iab.net/media/file/OpenRTBAPISpecificationVersion2_2.pdf in Table 6.11 for details.
     * 
     * @var     int[]
     * @field   expdir
     * @scope   optional
     */
    private $expandableDirections;
    
    /**
     * List of supported API frameworks for this banner. If an API is not explicitly listed it is assumed not to be
     * supported.
     * 
     * Please check the class constants specific to the API types.
     * Please refer to http://www.iab.net/media/file/OpenRTBAPISpecificationVersion2_2.pdf in Table 6.4 for details.
     * 
     * @var     int[]
     * @field   api
     * @scope   optional
     */
    private $apiFrameworks;
    
    /**
     * Returns the width of the impression in pixel.
     * 
     * @return int
     */
    function getWidth()
    {
        return $this->width;
    }
    
    /**
     * Sets the width of the impression in pixel.
     * 
     * @param int $width
     */
    function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * Returns the height of the impression in pixel.
     * 
     * @return int
     */
    function getHeight()
    {
        return $this->height;
    }

    /**
     * Sets the height of the impression in pixel.
     * 
     * @param int $height
     */
    function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * Returns the maximum width of the impression in pixel.
     * 
     * @return int
     */
    function getMaxWidth()
    {
        return $this->maxWidth;
    }

    /**
     * Sets the maximum width of the impression in pixel.
     * 
     * @param int $maxWidth
     */
    function setMaxWidth($maxWidth)
    {
        $this->maxWidth = $maxWidth;
    }

    /**
     * Returns the maximum height of the impression in pixel.
     * 
     * @return int
     */
    function getMaxHeight()
    {
        return $this->maxHeight;
    }

    /**
     * Sets the maximum height of the impression in pixel.
     * 
     * @param int $maxHeight
     */
    function setMaxHeight($maxHeight)
    {
        $this->maxHeight = $maxHeight;
    }

    /**
     * Returns the minimum width of the impression in pixel.
     * 
     * @return int
     */
    function getMinWidth()
    {
        return $this->minWidth;
    }

    /**
     * Sets the minimum width of the impression in pixel.
     * 
     * @param int $minWidth
     */
    function setMinWidth($minWidth)
    {
        $this->minWidth = $minWidth;
    }

    /**
     * Returns the minimum height of the impression in pixel.
     * 
     * @return int
     */
    function getMinHeight()
    {
        return $this->minHeight;
    }

    /**
     * Sets the minimum height of the impression in pixel.
     * 
     * @param int $minHeight
     */
    function setMinHeight($minHeight)
    {
        $this->minHeight = $minHeight;
    }

    /**
     * Returns the unique identifier of the banner object.
     * 
     * @return string
     */
    function getId()
    {
        return $this->id;
    }

    /**
     * Sets the unique identifier of the banner object.
     * 
     * @param string $id
     */
    function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Returns the ad position.
     * 
     * @return int
     */
    function getAdPosition()
    {
        return $this->adPosition;
    }

    /**
     * Sets the ad position.
     * 
     * @param int $adPosition
     */
    function setAdPosition($adPosition)
    {
        $this->adPosition = $adPosition;
    }

    /**
     * Returns the blocked creative types.
     * 
     * @return string[]
     */
    function getBlockedCreativeTypes()
    {
        return $this->blockedCreativeTypes;
    }

    /**
     * Sets the blocked creative types.
     * 
     * @param string[] $blockedCreativeTypes
     */
    function setBlockedCreativeTypes($blockedCreativeTypes)
    {
        $this->blockedCreativeTypes = $blockedCreativeTypes;
    }
    
    /**
     * Returns the blocked creative attributes.
     * 
     * @return string[]
     */
    function getBlockedCreativeAttributes()
    {
        return $this->blockedCreativeAttributes;
    }

    /**
     * Sets the blocked creative attributes.
     * 
     * @param string[] $blockedCreativeAttributes
     */
    function setBlockedCreativeAttributes($blockedCreativeAttributes)
    {
        $this->blockedCreativeAttributes = $blockedCreativeAttributes;
    }

    /**
     * Returns the supported content MIME types.
     * 
     * @return string[]
     */
    function getMimes()
    {
        return $this->mimes;
    }

    /**
     * Sets the supported content MIME types.
     * 
     * @param string[] $mimes
     */
    function setMimes($mimes)
    {
        $this->mimes = $mimes;
    }

    /**
     * Returns the delivery of the banner either in the top frame or in an iframe.
     * 
     * @return int
     */
    function getTopFrame()
    {
        return $this->topFrame;
    }

    /**
     * Sets the delivery of the banner either in the top frame or in an iframe.
     * 
     * @param int $topFrame
     */
    function setTopFrame($topFrame)
    {
        $this->topFrame = $topFrame;
    }

    /**
     * Returns the properties for an expandable ad.
     * 
     * @return int[]
     */
    function getExpandableDirections()
    {
        return $this->expandableDirections;
    }

    /**
     * Sets the properties for an expandable ad.
     * 
     * @param int[] $expandableDirections
     */
    function setExpandableDirections($expandableDirections)
    {
        $this->expandableDirections = $expandableDirections;
    }

    /**
     * Returns the list of supported API frameworks for this banner.
     * 
     * @return int[]
     */
    function getApiFrameworks()
    {
        return $this->apiFrameworks;
    }

    /**
     * Sets the list of supported API frameworks for this banner.
     * 
     * @param int[] $apiFrameworks
     */
    function setApiFrameworks($apiFrameworks)
    {
        $this->apiFrameworks = $apiFrameworks;
    }

}
