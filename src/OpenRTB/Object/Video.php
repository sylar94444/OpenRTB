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
 * The video object must be included directly in the impression object if the impression offered for auction is an
 * in-stream video ad opportunity. The Default column indicates how optional parameters should be interpreted if
 * explicit values are not provided. Note that for the video object, many of the fields are non-essential for a
 * minimally viable exchange interfaces. These parameters do not necessarily need to be specified to the bidder,
 * if they are always the same for all impression, of if the exchange chooses not to supply the additional information
 * to the bidder.
 *
 * @author  Vahe Markarian <contact@vahemark.com>
 * @package \OpenRTB\Object
 */
class Video extends Base\OpenRtbObject
{
    // Supported video bid response protocols
    const PROTOCOL_VAST_1           = 1;
    const PROTOCOL_VAST_2           = 2;
    const PROTOCOL_VAST_3           = 3;
    const PROTOCOL_VAST_1_WRAPPER   = 4;
    const PROTOCOL_VAST_2_WRAPPER   = 5;
    const PROTOCOL_VAST_3_WRAPPER   = 6;
    
    // Supported video start delay
    const DELAY_PREROLL             = 0;
    const DELAY_GENERIC_MIDROLL     = -1;
    const DELAY_GENERIC_POSTROLL    = -2;
    
    // Supported video linearity
    const LINEAR        = 1; // In-stream
    const NON_LINEAR    = 2; // Overlay
    
    /**
     * Content MIME types supported. Popular MIME types include, but are not limited to “video/x-ms-wmv” for
     * Windows Media, and “video/x-flv” for Flash Video.
     * 
     * @var     string[]
     * @field   mimes
     * @scope   required
     */
    private $mimes;
    
    /**
     * Minimum video ad duration in seconds.
     * 
     * @var     int
     * @field   minduration
     * @scope   required
     */
    private $minDuration;
    
    /**
     * Maximum video ad duration in seconds.
     * 
     * @var     int
     * @field   maxduration
     * @scope   required
     */
    private $maxDuration;
    
    /**
     * Video bid response protocols.
     * NOTE: Use protocols property when multiple protocols are supported. Its use is also highly recommended even
     * for one since this “protocol” attribute is likely to be deprecated in a future version. At least one supported
     * protocol must be specified in either the protocol or protocols property.
     * 
     * Please check the class constants specific to the supported video bid response protocols.
     * Please refer to http://www.iab.net/media/file/OpenRTBAPISpecificationVersion2_2.pdf in Table 6.7 for details.
     * 
     * @var     int
     * @field   protocol
     * @scope   optional
     */
    private $protocol;
    
    /**
     * Video bid response protocols. At least one supported protocol must be specified in either the protocol or
     * protocols property.
     * 
     * Please check the class constants specific to the supported video bid response protocols.
     * Please refer to http://www.iab.net/media/file/OpenRTBAPISpecificationVersion2_2.pdf in Table 6.7 for details.
     * 
     * @var     int[]
     * @field   protocols
     * @scope   recommended
     */
    private $protocols;
    
    /**
     * Width of the player in pixels. This field is not required, but it’s highly recommended that this information
     * be included.
     * 
     * @var     int
     * @field   w
     * @scope   recommended
     */
    private $width;
    
    /**
     * Height of the player in pixels. This field is not required, but it’s highly recommended that this information
     * be included.
     * 
     * @var     int
     * @field   h
     * @scope   recommended
     */
    private $height;
    
    /**
     * Indicates the start delay in seconds for preroll, midroll, or postroll ad placement.
     * 
     * Please check the class constants specific to the video start delay.
     * Please refer to http://www.iab.net/media/file/OpenRTBAPISpecificationVersion2_2.pdf in Table 6.9 for details.
     * 
     * @var     int
     * @field   startdelay
     * @scope   recommended
     */
    private $startDelay;
    
    /**
     * Indicates whether the ad impression must be linear, non-linear or can be of any type (field not set).
     * 
     * Please check the class constants LINEAR and NON_LINEAR.
     * Please refer to http://www.iab.net/media/file/OpenRTBAPISpecificationVersion2_2.pdf in Table 6.6 for details.
     * 
     * 
     * @var     int
     * @field   linearity
     * @scope   optional
     */
    private $linearity;
    
    /**
     * If multiple ad impressions are offered in the same bid request, the sequence number will allow for the
     * coordinated delivery of multiple creatives.
     * 
     * @var     int
     * @field   sequence
     * @scope   optional
     */
    private $sequence = 1;
    
    /**
     * Blocked creative attributes. If blank assume all types are allowed.
     * 
     * Please refer to http://www.iab.net/media/file/OpenRTBAPISpecificationVersion2_2.pdf in Table 6.3 for details.
     * 
     * @var     int[]
     * @field   battr
     * @scope   optional
     */
    private $blockedCreativeAttributes;
    
    /**
     * Maximum extended video ad duration, if extension is allowed. If blank or 0, extension is not allowed. If -1,
     * extension is allowed, and there is no time limit imposed. If greater than 0, then the value represents the
     * number of seconds of extended play supported beyond the maxduration value.
     * 
     * @var     int
     * @field   maxextended
     * @scope   optional
     */
    private $maxExtendedDuration;
    
    /**
     * Minimum bit rate in Kbps. Exchange may set this dynamically, or universally across their set of publishers.
     * 
     * @var     int
     * @field   minbitrate
     * @scope   optional
     */
    private $minBitRate;
    
    /**
     * Maximum bit rate in Kbps. Exchange may set this dynamically, or universally across their set of publishers.
     * 
     * @var     int
     * @field   maxbitrate
     * @scope   optional
     */
    private $maxBitRate;
    
    /**
     * If exchange publisher has rules preventing letter boxing of 4x3 content to play in a 16x9 window, then this
     * should be set to false. Default setting is true, which assumes that boxing of content to fit into a window is
     * allowed. “1” indicates boxing is allowed. “0” indicates it is not allowed.
     * 
     * @var     int
     * @field   boxingallowed
     * @scope   optional
     */
    private $boxingAllowed = 1;
    
    /**
     * List of allowed playback methods. If blank, assume that all are allowed.
     * 
     * Please refer to http://www.iab.net/media/file/OpenRTBAPISpecificationVersion2_2.pdf in Table 6.8 for details.
     * 
     * @var     int[]
     * @field   playbackmethod
     * @scope   optional
     */
    private $playbackMethod;
    
    /**
     * List of supported delivery methods (streaming, progressive). If blank, assume all are supported.
     *
     * Please refer to http://www.iab.net/media/file/OpenRTBAPISpecificationVersion2_2.pdf in Table 6.12 for details.
     * 
     * @var     int[]
     * @field   delivery
     * @scope   optional
     */
    private $delivery;
    
    /**
     * Ad Position.
     * 
     * Please refer to http://www.iab.net/media/file/OpenRTBAPISpecificationVersion2_2.pdf in Table 6.5 for details.
     * 
     * @var     int
     * @field   pos
     * @scope   optional
     */
    private $position;
    
    /**
     * If companion ads are available, they can be listed as an array of banner objects. See Banner Object.
     * 
     * @var     Banner[]
     * @field   companionad
     * @scope   optional
     */
    private $companionAd;
    
    /**
     * List of supported API frameworks for this impression. If an API is not explicitly listed it is assumed not to
     * be supported.
     * 
     * Please refer to http://www.iab.net/media/file/OpenRTBAPISpecificationVersion2_2.pdf in Table 6.4 for details.
     * 
     * @var     int[]
     * @field   api
     * @scope   optional
     */
    private $api;
    
    /**
     * Recommended if companion objects are included.
     * 
     * Please refer to http://www.iab.net/media/file/OpenRTBAPISpecificationVersion2_2.pdf in Table 6.17 for details.
     * 
     * @var     int[]
     * @field   companiontype
     * @scope   optional
     */
    private $companionType;

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
     * Returns the minimum video ad duration in seconds.
     * 
     * @return int
     */
    function getMinDuration()
    {
        return $this->minDuration;
    }

    /**
     * Sets the minimum video ad duration in seconds.
     * 
     * @param int $minDuration
     */
    function setMinDuration($minDuration)
    {
        $this->minDuration = $minDuration;
    }

    /**
     * Returns the maximum video ad duration in seconds.
     * 
     * @return int
     */
    function getMaxDuration()
    {
        return $this->maxDuration;
    }

    /**
     * Sets the maximum video ad duration in seconds.
     * 
     * @param int $maxDuration
     */
    function setMaxDuration($maxDuration)
    {
        $this->maxDuration = $maxDuration;
    }

    /**
     * Returns the video bid response protocol.
     * 
     * @return int
     */
    function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * Sets the video bid response protocol.
     * 
     * @param int $protocol
     */
    function setProtocol($protocol)
    {
        $this->protocol = $protocol;
    }

    /**
     * Returns the video bid response protocols.
     * 
     * @return int[]
     */
    function getProtocols()
    {
        return $this->protocols;
    }

    /**
     * Sets the video bid response protocols.
     * 
     * @param int[] $protocols
     */
    function setProtocols($protocols)
    {
        $this->protocols = $protocols;
    }

    /**
     * Returns the width of the video player in pixels.
     * 
     * @return int
     */
    function getWidth()
    {
        return $this->width;
    }

    /**
     * Sets the width of the video player in pixels.
     * 
     * @param int $width
     */
    function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * Returns the height of the video player in pixels.
     * 
     * @return int
     */
    function getHeight()
    {
        return $this->height;
    }

    /**
     * Sets the height of the video player in pixels.
     * 
     * @param int $height
     */
    function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * Returns the start delay in seconds for preroll, midroll, or postroll ad placement.
     * 
     * @return int
     */
    function getStartDelay()
    {
        return $this->startDelay;
    }

    /**
     * Sets the start delay in seconds for preroll, midroll, or postroll ad placement.
     * 
     * @param int $startDelay
     */
    function setStartDelay($startDelay)
    {
        $this->startDelay = $startDelay;
    }

    /**
     * Returns the linearity of the ad impression.
     * 
     * @return type
     */
    function getLinearity()
    {
        return $this->linearity;
    }

    /**
     * Sets the linearity of the ad impression.
     * 
     * @param type $linearity
     */
    function setLinearity($linearity)
    {
        $this->linearity = $linearity;
    }

    /**
     * Returns the ad impression sequence number.
     * 
     * @return int
     */
    function getSequence()
    {
        return $this->sequence;
    }

    /**
     * Sets the ad impression sequence number.
     * 
     * @param int $sequence
     */
    function setSequence($sequence)
    {
        $this->sequence = $sequence;
    }

    /**
     * Returns the blocked creative attributes.
     * 
     * @return int[]
     */
    function getBlockedCreativeAttributes()
    {
        return $this->blockedCreativeAttributes;
    }

    /**
     * Sets the blocked craetive attributes.
     * 
     * @param int[] $blockedCreativeAttributes
     */
    function setBlockedCreativeAttributes($blockedCreativeAttributes)
    {
        $this->blockedCreativeAttributes = $blockedCreativeAttributes;
    }

    /**
     * Returns the maximum extended video ad duration.
     * 
     * @return int
     */
    function getMaxExtendedDuration()
    {
        return $this->maxExtendedDuration;
    }

    /**
     * Sets the maximum extended video ad duration.
     * 
     * @param int $maxExtendedDuration
     */
    function setMaxExtendedDuration($maxExtendedDuration)
    {
        $this->maxExtendedDuration = $maxExtendedDuration;
    }

    /**
     * Returns the minimum bit rate in Kbps.
     * 
     * @return int
     */
    function getMinBitRate()
    {
        return $this->minBitRate;
    }

    /**
     * Sets the minimum bit rate in Kbps.
     * 
     * @param int $minBitRate
     */
    function setMinBitRate($minBitRate)
    {
        $this->minBitRate = $minBitRate;
    }

    /**
     * Returns the maximum bit rate in Kbps.
     * 
     * @return int
     */
    function getMaxBitRate()
    {
        return $this->maxBitRate;
    }

    /**
     * Sets the maximum bit rate in Kbps.
     * 
     * @param int $maxBitRate
     */
    function setMaxBitRate($maxBitRate)
    {
        $this->maxBitRate = $maxBitRate;
    }

    /**
     * Returns the boxing content to fit into the window flag.
     * 
     * @return int
     */
    function getBoxingAllowed()
    {
        return $this->boxingAllowed;
    }

    /**
     * Sets the boxing content to fit into the window flag.
     * 
     * @param int $boxingAllowed
     */
    function setBoxingAllowed($boxingAllowed)
    {
        $this->boxingAllowed = $boxingAllowed;
    }

    /**
     * Returns the list of allowed playback methods.
     * 
     * @return int[]
     */
    function getPlaybackMethod()
    {
        return $this->playbackMethod;
    }

    /**
     * Sets the list of allowed playback methods.
     * 
     * @param int[] $playbackMethod
     */
    function setPlaybackMethod($playbackMethod)
    {
        $this->playbackMethod = $playbackMethod;
    }

    /**
     * Returns the list of supported delivery methods.
     * 
     * @return int[]
     */
    function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * Sets the list of supported delivery methods.
     * 
     * @param int[] $delivery
     */
    function setDelivery($delivery)
    {
        $this->delivery = $delivery;
    }

    /**
     * Returns the ad position.
     * 
     * @return int
     */
    function getPosition()
    {
        return $this->position;
    }

    /**
     * Sets the ad position.
     * 
     * @param int $position
     */
    function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * Returns the companion ads if available.
     * 
     * @return Banner[]
     */
    function getCompanionAd()
    {
        return $this->companionAd;
    }

    /**
     * Sets the companion ads.
     * 
     * @param Banner[] $companionAd
     */
    function setCompanionAd(array $companionAd)
    {
        $this->companionAd = $companionAd;
    }

    /**
     * Returns the list of supported API frameworks for this ad impression.
     * 
     * @return int[]
     */
    function getApi()
    {
        return $this->api;
    }

    /**
     * Sets the list of supported API frameworks for this ad impression.
     * 
     * @param int[] $api
     */
    function setApi($api)
    {
        $this->api = $api;
    }

    /**
     * Returns the companion types.
     * 
     * @return int[]
     */
    function getCompanionType()
    {
        return $this->companionType;
    }

    /**
     * Sets the companion types.
     * 
     * @param int[] $companionType
     */
    function setCompanionType($companionType)
    {
        $this->companionType = $companionType;
    }

}
