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

/**
 * The Extension object contain custom JSON agreed to by the parties in an OpenRTB transaction to support flexibility
 * beyond the standard defined in this specification.
 *
 * @author  Vahe Markarian <contact@vahemark.com>
 * @package \OpenRTB\Object
 */
class Extension
{
    
    /**
     * Custom JSON.
     * 
     * @var string
     */
    private $json;
    
    /**
     * Returns the json data.
     * 
     * @return string
     */
    function getJson()
    {
        return $this->json;
    }

    /**
     * Sets the json data.
     * 
     * @param string $jsonData
     */
    function setJson($jsonData)
    {
        $this->json = $jsonData;
    }
    
}
