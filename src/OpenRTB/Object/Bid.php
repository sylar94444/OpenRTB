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
 * Bid object.
 * 
 * For each bid, the “winNoticeUrl” attribute contains the win notice URL. If the bidder wins the impression,
 * the exchange calls this notice URL:
 *      a.  to inform the bidder of the win and
 *      b.  to convey certain information using substitution macros.
 * 
 * Please refer to http://www.iab.net/media/file/OpenRTBAPISpecificationVersion2_2.pdf in Table 4.6 for
 * Substitution Macros details.
 * 
 * The “adDomain” attribute can be used to check advertiser block list compliance. The “imageUrl” attribute can provide
 * a link to an image that is representative of the campaign’s content (irrespective of whether the campaign may have
 * multiple creatives). This enables human review for spotting inappropriate content. The “campaignId” attribute can be
 * used to block ads that were previously identified as inappropriate; essentially a safety net beyond the block lists.
 * The “creativeId” attribute can be helpful in reporting creative issues back to bidders. Finally, the
 * “creativeAttributes” array indicates the creative attributes that describe the ad to be served.
 *
 * @author  Vahe Markarian <contact@vahemark.com>
 * @package \OpenRTB\Object
 */
class Bid extends Base\OpenRtbObject
{
    
    /**
     * ID for the bid object chosen by the bidder for tracking and debugging purposes. Useful when multiple bids are
     * submitted for a single impression for a given seat.
     * 
     * @var     string
     * @field   id
     * @scope   required
     */
    private $id;
    
    /**
     * ID of the impression object to which this bid applies.
     * 
     * @var     string
     * @field   impid
     * @scope   required
     */
    private $impressionId;
    
    /**
     * Bid price in CPM.
     * 
     * WARNING/Best Practice Note: Although this value is a float, OpenRTB strongly suggests using integer math for
     * accounting to avoid rounding errors.
     * 
     * @var     float
     * @field   price
     * @scope   required
     */
    private $price;
    
    /**
     * ID that references the ad to be served if the bid wins.
     * 
     * @var     string
     * @field   adid
     * @scope   optional
     */
    private $adId;
    
    /**
     * Win notice URL.
     * 
     * Note that ad markup is also typically, but not necessarily, returned via this URL.
     * 
     * @var     string
     * @field   nurl
     * @scope   optional
     */
    private $winNoticeUrl;
    
    /**
     * Actual ad markup. XHTML if a response to a banner object, or VAST XML if a response to a video object.
     * 
     * @var     string
     * @field   adm
     * @scope   optional
     */
    private $adMarkup;
    
    /**
     * Advertiser’s primary or top-level domain for advertiser checking. This can be a list of domains if there is
     * a rotating creative. However, exchanges may mandate that only one landing domain is allowed.
     * 
     * @var     string[]
     * @field   adomain
     * @scope   optional
     */
    private $adDomain;
    
    /**
     * Sample image URL (without cache busting) for content checking.
     * 
     * @var     string
     * @field   iurl
     * @scope   optional
     */
    private $imageUrl;
    
    /**
     * Campaign ID or similar that appears within the ad markup.
     * 
     * @var     string
     * @field   cid
     * @scope   optional
     */
    private $campaignId;
    
    /**
     * Creative ID for reporting content issues or defects. This could also be used as a reference to a creative ID
     * that is posted with an exchange.
     * 
     * @var     string
     * @field   crid
     * @scope   optional
     */
    private $creativeId;
    
    /**
     * Array of creative attributes.
     * 
     * Please refer to http://www.iab.net/media/file/OpenRTBAPISpecificationVersion2_2.pdf in Table 6.3 for details.
     * 
     * @var     int[]
     * @field   attr
     * @scope   optional
     */
    private $creativeAttributes;
    
    /**
     * A unique identifier for the direct deal associated with the bid. If the bid is associated and in response to
     * a dealid in the request object it is required in the response object.
     * 
     * @var     string
     * @field   dealid
     * @scope   optional
     */
    private $dealId;
    
    /**
     * Width of the ad in pixels. If the bid request contained the wmax/hmax and wmin/hmin optional fields it is
     * recommended that the response bid contains this field to signal the size of ad chosen.
     * 
     * @var     int
     * @field   w
     * @scope   optional
     */
    private $adWidth;
    
    /**
     * Height of the ad in pixels. If the bid request contained the wmax/hmax and wmin/hmin optional fields it is
     * recommended that the response bid contains this field to signal the size of ad chosen.
     * 
     * @var     int
     * @field   h
     * @scope   optional
     */
    private $adHeight;

    /**
     * Returns the bid id.
     * 
     * @return string
     */
    function getId()
    {
        return $this->id;
    }

    /**
     * Sets the bid id.
     * 
     * @param string $id
     */
    function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Returns the impression id.
     * 
     * @return string
     */
    function getImpressionId()
    {
        return $this->impressionId;
    }

    /**
     * Sets the impression id.
     * 
     * @param string $impressionId
     */
    function setImpressionId($impressionId)
    {
        $this->impressionId = $impressionId;
    }

    /**
     * Returns the bid price in CPM.
     * 
     * @return float
     */
    function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets the bid price in CPM.
     * 
     * @param float $price
     */
    function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Returns the ad id.
     * 
     * @return string
     */
    function getAdId()
    {
        return $this->adId;
    }

    /**
     * Sets the ad id.
     * 
     * @param string $adId
     */
    function setAdId($adId)
    {
        $this->adId = $adId;
    }

    /**
     * Returns the win notice URL.
     * 
     * @return string
     */
    function getWinNoticeUrl()
    {
        return $this->winNoticeUrl;
    }

    /**
     * Sets the win notice URL.
     * 
     * @param string $noticeUrl
     */
    function setWinNoticeUrl($noticeUrl)
    {
        $this->winNoticeUrl = $noticeUrl;
    }

    /**
     * Returns the ad markup.
     * 
     * @return string
     */
    function getAdMarkup()
    {
        return $this->adMarkup;
    }

    /**
     * Sets the ad markup.
     * 
     * @param string $adMarkup
     */
    function setAdMarkup($adMarkup)
    {
        $this->adMarkup = $adMarkup;
    }

    /**
     * Returns the advertiser's ad domain.
     * 
     * @return string[]
     */
    function getAdDomain()
    {
        return $this->adDomain;
    }

    /**
     * Sets the advertiser's ad domain.
     * 
     * @param string[] $adDomain
     */
    function setAdDomain($adDomain)
    {
        $this->adDomain = $adDomain;
    }

    /**
     * Returns the sample image URL for content checking.
     * 
     * @return string
     */
    function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * Sets the sample image URL for content checking.
     * 
     * @param string $imageUrl
     */
    function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * Returns the campaign id .
     * 
     * @return string
     */
    function getCampaignId()
    {
        return $this->campaignId;
    }

    /**
     * Sets the campaign id.
     * 
     * @param string $campaignId
     */
    function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;
    }

    /**
     * Returns the creative id.
     * 
     * @return string
     */
    function getCreativeId()
    {
        return $this->creativeId;
    }

    /**
     * Sets the creative id.
     * 
     * @param string $creativeId
     */
    function setCreativeId($creativeId)
    {
        $this->creativeId = $creativeId;
    }

    /**
     * Returns the creative attributes.
     * 
     * @return int[]
     */
    function getCreativeAttributes()
    {
        return $this->creativeAttributes;
    }

    /**
     * Sets the creative attributes.
     * 
     * @param int[] $creativeAttributes
     */
    function setCreativeAttributes($creativeAttributes)
    {
        $this->creativeAttributes = $creativeAttributes;
    }

    /**
     * Returns the direct deal id associated with the bid.
     * 
     * @return string
     */
    function getDealId()
    {
        return $this->dealId;
    }

    /**
     * Sets the direct deal id associated with the bid.
     * 
     * @param string $dealId
     */
    function setDealId($dealId)
    {
        $this->dealId = $dealId;
    }

    /**
     * Returns the ad width.
     * 
     * @return int
     */
    function getAdWidth()
    {
        return $this->adWidth;
    }

    /**
     * Sets the ad width.
     * 
     * @param int $adWidth
     */
    function setAdWidth($adWidth)
    {
        $this->adWidth = $adWidth;
    }

    /**
     * Returns the ad height.
     * 
     * @return int
     */
    function getAdHeight()
    {
        return $this->adHeight;
    }

    /**
     * Sets the ad height.
     * 
     * @param int $adHeight
     */
    function setAdHeight($adHeight)
    {
        $this->adHeight = $adHeight;
    }
    
}
