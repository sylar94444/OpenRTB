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
 * Description of Impression
 *
 * @author  Vahe Markarian <contact@vahemark.com>
 * @package \OpenRTB\Object
 */
class Impression extends Base\OpenRtbObject
{
    private $id;
    
    private $banner;
    
    private $video;
    
    private $displayManager;
    
    private $displayManagerVersion;
    
    private $adInterstitialOrFullScreen;
    
    private $tagId;
    
    private $bidFloor;
    
    private $bidFloorCurrency;
    
    private $secure;
    
    private $iframeBuster;
    
    private $pmp;
    
    private $extension;
}
