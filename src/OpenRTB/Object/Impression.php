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
 * The impression object describes the ad position or impression being auctioned. A single bid request can include
 * multiple impression objects, a use case for which might be an exchange that supports selling all ad positions on
 * a given page as a bundle. Each impression object has a required ID so that bids can reference them individually.
 * An exchange can also conduct private auctions by restricting involvement to specific subsets of seats within bidders.
 *
 * @author  Vahe Markarian <contact@vahemark.com>
 * @package \OpenRTB\Object
 */
class Impression extends Base\OpenRtbObject
{
    
    const AD_UNKNOWN = 0;
    const AD_INTERSTITIAL_OR_FULLSCREEN = 1;
    
    // secure or not secure impression URL creative assets and markup
    const SECURE = 1;
    const NOT_SECURE = 0;
    
    
    /**
     * A unique identifier for this impression within the context of the bid request (typically, value starts with 1,
     * and increments up to n for n impressions.
     * 
     * @var     string
     * @field   id
     * @scope   required 
     */
    private $id;
    
    /**
     * A reference to a banner object. Either a banner or video object (or both if the impression could be either)
     * must be included in an impression object.
     * 
     * @var     Banner
     * @field   banner
     * @scope   required for banner impressions
     */
    private $banner;
    
    /**
     * A reference to a video object. Either a banner or video object (or both if the impression could be either)
     * must be included in an impression object.
     * 
     * @var     Video
     * @field   video
     * @scope   required for video impressions
     */
    private $video;
    
    /**
     * Name of ad mediation partner, SDK technology, or native player responsible for rendering ad (typically video
     * or mobile). Used by some ad servers to customize ad code by partner.
     * 
     * @var     string
     * @field   displaymanager
     * @scope   recommended for video and native apps
     */
    private $displayManager;
    
    /**
     * Version of ad mediation partner, SDK technology, or native player responsible for rendering ad (typically
     * video or mobile). Used by some ad servers to customize ad code by partner.
     * 
     * @var     string
     * @field   displaymanagerver
     * @scope   recommended for video and native apps
     */
    private $displayManagerVersion;
    
    /**
     * 1 if the ad is interstitial or fullscreen; else 0 (i.e., no).
     * 
     * Please check class constants AD_UNKNOWN and AD_INTERSTITIAL_OR_FULLSCREEN.
     * 
     * @var     int
     * @field   instl
     * @scope   optional
     */
    private $adInterstitialOrFullScreen = self::AD_UNKNOWN;
    
    /**
     * Identifier for specific ad placement or ad tag that was used to initiate the auction. This can be useful for
     * debugging of any issues, or for optimization by the buyer.
     * 
     * @var     string
     * @field   tagid
     * @scope   optional
     */
    private $tagId;
    
    /**
     * Bid floor for this impression.
     * 
     * @var     float
     * @field   bidfloor
     * @scope   optional
     */
    private $bidFloor;
    
    /**
     * If bid floor is specified and multiple currencies supported per bid request, then currency should be specified
     * here using ISO-4217 alphabetic codes. Note, this may be different from bid currency returned by bidder, if this
     * is allowed on an exchange.
     * 
     * @var     string
     * @field   bidfloorcur
     * @scope   optional
     */
    private $bidFloorCurrency;
    
    /**
     * Flag to indicate whether the impression requires secure HTTPS URL creative assets and markup. A value of “1”
     * means that the impression requires secure assets. A value of "0" means non-secure assets. If this field is
     * omitted the bidder should interpret the secure state is unknown and assume HTTP is supported.
     * 
     * Please check the class constants SECURE and NOT_SECURE.
     * 
     * @var     int
     * @field   secure
     * @scope   optional
     */
    private $secure;
    
    /**
     * Array of names for supported iframe busters. Exchange specific.
     * 
     * @var     string[]
     * @field   iframebuster
     * @scope   optional
     */
    private $iframeBuster;
    
    /**
     * A reference to the private market place object containing any Deals eligible for the impression object.
     * See the PrivateMarketPlace Object definition.
     * 
     * @var     PrivateMarketPlace
     * @field   pmp
     * @scope   optional
     */
    private $privateMarketPlace;

    /**
     * Returns the impression id.
     * 
     * @return string
     */
    function getId()
    {
        return $this->id;
    }

    /**
     * Sets the impression id.
     * 
     * @param string $id
     */
    function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Returns the banner object.
     * 
     * @return Banner
     */
    function getBanner()
    {
        return $this->banner;
    }

    /**
     * Sets the banner object.
     * 
     * @param Banner $banner
     */
    function setBanner(Banner $banner)
    {
        $this->banner = $banner;
    }

    /**
     * Returns the video object.
     * 
     * @return Video
     */
    function getVideo()
    {
        return $this->video;
    }

    /**
     * Sets the video object.
     * 
     * @param Video $video
     */
    function setVideo(Video $video)
    {
        $this->video = $video;
    }

    /**
     * Returns the name of the ad mediation partner.
     * 
     * @return string
     */
    function getDisplayManager()
    {
        return $this->displayManager;
    }

    /**
     * Sets the name of the ad mediation partner.
     * 
     * @param string $displayManager
     */
    function setDisplayManager($displayManager)
    {
        $this->displayManager = $displayManager;
    }

    /**
     * Returns the version of ad mediation partner.
     * 
     * @return string
     */
    function getDisplayManagerVersion()
    {
        return $this->displayManagerVersion;
    }

    /**
     * Sets the version of ad mediation partner.
     * 
     * @param string $displayManagerVersion
     */
    function setDisplayManagerVersion($displayManagerVersion)
    {
        $this->displayManagerVersion = $displayManagerVersion;
    }

    /**
     * Returns 1 if the ad is iterstitial or fullscreen, 0 otherwise.
     * 
     * @return int
     */
    function getAdInterstitialOrFullScreen()
    {
        return $this->adInterstitialOrFullScreen;
    }

    /**
     * Sets the flag if the ad is interstitial or fullscreen.
     * 
     * @param int $adInterstitialOrFullScreen
     */
    function setAdInterstitialOrFullScreen($adInterstitialOrFullScreen)
    {
        $this->adInterstitialOrFullScreen = $adInterstitialOrFullScreen;
    }

    /**
     * Returns the tag id of the ad.
     * 
     * @return string
     */
    function getTagId()
    {
        return $this->tagId;
    }

    /**
     * Sets the tag id of the ad.
     * 
     * @param string $tagId
     */
    function setTagId($tagId)
    {
        $this->tagId = $tagId;
    }

    /**
     * Returns the bid floor.
     * 
     * @return float
     */
    function getBidFloor()
    {
        return $this->bidFloor;
    }

    /**
     * Sets the bid floor.
     * 
     * @param float $bidFloor
     */
    function setBidFloor($bidFloor)
    {
        $this->bidFloor = $bidFloor;
    }

    /**
     * Returns the currency of the bid floor.
     * 
     * @return string
     */
    function getBidFloorCurrency()
    {
        return $this->bidFloorCurrency;
    }

    /**
     * Sets the currency of the bid floor.
     * 
     * @param string $bidFloorCurrency
     */
    function setBidFloorCurrency($bidFloorCurrency)
    {
        $this->bidFloorCurrency = $bidFloorCurrency;
    }

    /**
     * Returns 1 if the ad URL is secure, 0 otherwise.
     * 
     * @return type
     */
    function getSecure()
    {
        return $this->secure;
    }

    /**
     * Sets whether the ad is secure or not.
     * 
     * @param int $secure
     */
    function setSecure($secure)
    {
        $this->secure = $secure;
    }

    /**
     * Returns the names for supported iframe busters.
     * 
     * @return string[]
     */
    function getIframeBuster()
    {
        return $this->iframeBuster;
    }

    /**
     * Sets the names for supported iframe busters.
     * 
     * @param array $iframeBuster
     */
    function setIframeBuster(array $iframeBuster)
    {
        $this->iframeBuster = $iframeBuster;
    }

    /**
     * Returns the private market place object for eligible deals.
     * 
     * @return PrivateMarketPlace
     */
    function getPrivateMarketPlace()
    {
        return $this->privateMarketPlace;
    }

    /**
     * Sets the private market place object for eligible deals.
     * 
     * @param PrivateMarketPlace $privateMarketPlace
     */
    function setPrivateMarketPlace(PrivateMarketPlace $privateMarketPlace)
    {
        $this->privateMarketPlace = $privateMarketPlace;
    }

}
