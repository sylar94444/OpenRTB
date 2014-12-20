<?php

/*
 * This file is part of OpenRTB package.
 * 
 * (c) Vahe Markarian <contact@vahemark.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace OpenRTB\Base;

use OpenRTB\Object;

/**
 * This class is the base class of all OpenRTB objects.
 *
 * @author  Vahe Markarian <contact@vahemark.com>
 * @package \OpenRTB\Base
 */
abstract class OpenRtbObject
{
    
    /**
     * This object is a placeholder that may contain custom JSON agreed to by the parties in an OpenRTB transaction
     * to support flexibility beyond the standard defined in this specification.
     * 
     * @var     Object\Extension
     * @field   ext
     * @scope   optional
     */
    private $extension;
    
    /**
     * Returns the extension object.
     * 
     * @return Object\Extension
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Sets the extension object.
     * 
     * @param Object\Extension $extension
     */
    public function setExtension(Object\Extension $extension)
    {
        $this->extension = $extension;
    }
    
}
