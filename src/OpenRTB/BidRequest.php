<?php

/*
 * This file is part of OpenRTB package.
 * 
 * (c) Vahe Markarian <contact@vahemark.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace OpenRTB;

use OpenRTB\Base;
use OpenRTB\Object;

/**
 * The top-level bid request object contains a globally unique bid request or auction ID. This “id” attribute is
 * required as is at least one “imp” (i.e., impression) object. Other attributes are optional since an exchange
 * may establish default values.
 *
 * @author  Vahe Markarian <contact@vahemark.com>
 * @package \OpenRTB
 */
class BidRequest extends Base\OpenRtbObject
{
    
    const AUCTION_TYPE_FIRST_PRICE  = 1;
    const AUCTION_TYPE_SECOND_PRICE = 2;
    
    const ALL_IMPRESSIONS_EXCHANGE_CANNOT_VERIFY = 0;
    const ALL_IMPRESSIONS_AVAILABLE = 1;
    
    /**
     * Unique ID of the bid request, provided by the exchange.
     * 
     * @var     string
     * @field   id
     * @scope   required
     */
    private $id;
    
    /**
     * Array of impression objects. Multiple impression auctions may be specified in a single bid request. At least
     * one impression is required for a valid bid request.
     * 
     * @var     Object\Impression[]
     * @field   imp
     * @scope   required
     */
    private $impressions;
    
    /**
     * Site object.
     * 
     * @var     Object\Site
     * @field   site
     * @scope   recommended for websites
     */
    private $site;
    
    /**
     * App object.
     * 
     * @var     Object\App
     * @field   app
     * @scope   recommended for native apps
     */
    private $app;
    
    /**
     * Device object.
     * 
     * @var     Object\Device
     * @field   device
     * @scope   recommended
     */
    private $device;
    
    /**
     * User object.
     * 
     * @var     Object\User
     * @field   user
     * @scope   recommended
     */
    private $user;
    
    /**
     * Auction Type. If “1”, then first price auction. If “2”, then second price auction. Additional auction types
     * can be defined as per the exchange’s business rules. Exchange specific rules should be numbered over 500.
     * 
     * Please check class constants AUCTION_TYPE_FIRST_PRICE and AUCTION_TYPE_SECOND_PRICE.
     * 
     * @var     int
     * @field   at
     * @scope   optional
     */
    private $auctionType = self::AUCTION_TYPE_SECOND_PRICE;
    
    /**
     * Maximum amount of time in milliseconds to submit a bid (e.g., 120 means the bidder has 120ms to submit a bid
     * before the auction is complete). If this value never changes across an exchange, then the exchange can supply
     * this information offline.
     * 
     * @var     int
     * @field   tmax
     * @scope   optional
     */
    private $maxTime;
    
    /**
     * Array of buyer seats allowed to bid on this auction. Seats are an optional feature of exchange. For example,
     * [“4”,”34”,”82”,”A45”] indicates that only advertisers using these exchange seats are allowed to bid on the
     * impressions in this auction.
     * 
     * @var     string[]
     * @field   wseat
     * @scope   optional 
     */
    private $seats;
    
    /**
     * Flag to indicate whether Exchange can verify that all impressions offered represent all of the impressions
     * available in context (e.g., all impressions available on the web page; all impressions available for a video
     * [pre, mid and postroll spots], etc.) to support road-blocking. A true value should only be passed if the
     * exchange is aware of all impressions in context for the publisher. “0” means the exchange cannot verify,
     * and “1” means that all impressions represent all impressions available.
     * 
     * Please check class constants ALL_IMPRESSIONS_EXCHANGE_CANNOT_VERIFY and ALL_IMPRESSIONS_AVAILABLE.
     * 
     * @var     int
     * @field   allimps
     * @scope   optional
     */
    private $allImpressionsFlag = self::ALL_IMPRESSIONS_EXCHANGE_CANNOT_VERIFY;
    
    /**
     * Array of allowed currencies for bids on this bid request using ISO-4217 alphabetic codes. If only one currency
     * is used by the exchange, this parameter is not required.
     * 
     * @var     string[]
     * @field   cur
     * @scope   optional 
     */
    private $currency;
    
    /**
     * Blocked Advertiser Categories. Note that there is no existing categorization / taxonomy of advertiser
     * industries. However, as a substitute exchanges may decide to use IAB categories as an approximation.
     * 
     * Please refer to http://www.iab.net/media/file/OpenRTBAPISpecificationVersion2_2.pdf in Table 6.1
     * 
     * @var     string[]
     * @field   bcat
     * @scope   optional
     */
    private $blockedAdvertiserCategories;
    
    /**
     * Array of strings of blocked top-level domains of advertisers. For example, {“company1.com”, “company2.com”}.
     * 
     * @var     string[]
     * @field   badv
     * @scope   optional
     */
    private $blockedAdvertiserDomains;
    
    /**
     * This object is a container for any legal, governmental or industry regulations in force for the request.
     * 
     * @var     Regulations\Regulations
     * @field   regs
     * @scope   optional
     */
    private $regulations;
    
    /**
     * Returns the bid request id.
     * 
     * @return string
     */
    function getId()
    {
        return $this->id;
    }

    /**
     * Sets the bid request id.
     * 
     * @param string $id
     */
    function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Returns an array of impression objects.
     * 
     * @return Object\Impression[]
     */
    function getImpressions()
    {
        return $this->impressions;
    }

    /**
     * Sets an array of impression objects.
     * 
     * @param array $impressions
     */
    function setImpressions(array $impressions)
    {
        $this->impressions = $impressions;
    }

    /**
     * Returns the site object.
     * 
     * @return Object\Site
     */
    function getSite()
    {
        return $this->site;
    }

    /**
     * Sets the site object.
     * 
     * @param Object\Site $site
     */
    function setSite(Site\Site $site)
    {
        $this->site = $site;
    }

    /**
     * Returns the app object.
     * 
     * @return Object\App
     */
    function getApp()
    {
        return $this->app;
    }

    /**
     * Sets the app object.
     * 
     * @param Object\App $app
     */
    function setApp(App\App $app)
    {
        $this->app = $app;
    }

    /**
     * Returns the device object.
     * 
     * @return Object\Device
     */
    function getDevice()
    {
        return $this->device;
    }

    /**
     * Sets the device object.
     * 
     * @param Object\Device $device
     */
    function setDevice(Device\Device $device)
    {
        $this->device = $device;
    }
    
    /**
     * Returns the user object.
     * 
     * @return Object\User
     */
    function getUser()
    {
        return $this->user;
    }

    /**
     * Sets the user object.
     * 
     * @param Object\User $user
     */
    function setUser(User\User $user)
    {
        $this->user = $user;
    }

    /**
     * Returns the auction type.
     * 
     * @return int
     */
    function getAuctionType()
    {
        return $this->auctionType;
    }

    /**
     * Sets the auction type.
     * 
     * @param int $auctionType
     */
    function setAuctionType($auctionType)
    {
        $this->auctionType = $auctionType;
    }

    /**
     * Returns the maximum amount of time in milliseconds to submit a bid.
     * 
     * @return int
     */
    function getMaxTime()
    {
        return $this->maxTime;
    }

    /**
     * Sets the maximum amount of time in milliseconds to submit a bid.
     * 
     * @param type $maxTime
     */
    function setMaxTime($maxTime)
    {
        $this->maxTime = $maxTime;
    }

    /**
     * Returns the buyer seats allowed to bid on this auction.
     * 
     * @return string[]
     */
    function getSeats()
    {
        return $this->seats;
    }

    /**
     * Sets the buyer seats allowed to bid on this auction.
     * 
     * @param array $seats
     */
    function setSeats(array $seats)
    {
        $this->seats = $seats;
    }

    /**
     * Returns the flag indicating whether Exchange can verify that all impressions offered represent all of the
     * impressions available in context.
     * 
     * @return int
     */
    function getAllImpressionsFlag()
    {
        return $this->allImpressionsFlag;
    }

    /**
     * Sets the flag indicating whether Exchange can verify that all impressions offered represent all of the
     * impressions available in context.
     * 
     * @param int $allImpressionsFlag
     */
    function setAllImpressionsFlag($allImpressionsFlag)
    {
        $this->allImpressionsFlag = $allImpressionsFlag;
    }

    /**
     * Returns the allowed currencies for bids on this bid request.
     * 
     * @return string[]
     */
    function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Sets the allowed currencies for bids on this bid request.
     * 
     * @param array $currency
     */
    function setCurrency(array $currency)
    {
        $this->currency = $currency;
    }

    /**
     * Returns the blocked categories of the advertiser.
     * 
     * @return string[]
     */
    function getBlockedAdvertiserCategories()
    {
        return $this->blockedAdvertiserCategories;
    }

    /**
     * Sets the blocked categories of the advertiser.
     * 
     * @param array $blockedAdvertiserCategories
     */
    function setBlockedAdvertiserCategories(array $blockedAdvertiserCategories)
    {
        $this->blockedAdvertiserCategories = $blockedAdvertiserCategories;
    }

    /**
     * Returns the blocked top-level domains of advertisers.
     * 
     * @return string[]
     */
    function getBlockedAdvertiserDomains()
    {
        return $this->blockedAdvertiserDomains;
    }

    /**
     * Sets the blocked top-level domains of advertisers.
     * 
     * @param array $blockedAdvertiserDomains
     */
    function setBlockedAdvertiserDomains(array $blockedAdvertiserDomains)
    {
        $this->blockedAdvertiserDomains = $blockedAdvertiserDomains;
    }

    /**
     * Returns the regulations object.
     * 
     * @return Regulations\Regulations
     */
    function getRegulations()
    {
        return $this->regulations;
    }

    /**
     * Sets the regulations object.
     * 
     * @param Regulations\Regulations $regulations
     */
    function setRegulations(Regulations\Regulations $regulations)
    {
        $this->regulations = $regulations;
    }
    
}
