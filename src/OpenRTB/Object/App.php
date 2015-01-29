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
 * An App object should be included if the ad supported content is part of a mobile application (as opposed to a
 * mobile website). A bid request must not contain both an App object and a Site object.
 * 
 * The app object itself and all of its parameters are optional, so default values are not provided. If an optional
 * parameter is not specified, it should be considered unknown. At a minimum, it’s useful to provide an App ID or
 * bundle, but this is not strictly required.
 *
 * @author  Vahe Markarian <contact@vahemark.com>
 * @package \OpenRTB\Object
 */
class App extends Base\OpenRtbObject
{
    
    /**
     * The application id of the exchange.
     * 
     * @var     string
     * @field   id
     * @scope   recommended
     */
    private $id;
    
    /**
     * The application name (may be masked at publisher's request).
     * 
     * @var     string
     * @field   name
     * @scope   optional
     */
    private $name;
    
    /**
     * The domain of the application (e.g., "mygame.foo.com").
     * 
     * @var     string
     * @field   domain
     * @scope   optional
     */
    private $domain;
    
    /**
     * An array of IAB content categories for the overall application.
     * 
     * Please refer to http://www.iab.net/media/file/OpenRTBAPISpecificationVersion2_2.pdf in Table 6.1 for details.
     * 
     * @var     string[]
     * @field   cat
     * @scope   optional
     */
    private $categories;
    
    /**
     * An array of IAB content categories for the current subsection of the app.
     * 
     * Please refer to http://www.iab.net/media/file/OpenRTBAPISpecificationVersion2_2.pdf in Table 6.1 for details.
     * 
     * @var     string[]
     * @field   sectioncat
     * @scope   optional
     */
    private $subsectionCategories;
    
    /**
     * An array of IAB content categories for the current page/view of the app.
     * 
     * Please refer to http://www.iab.net/media/file/OpenRTBAPISpecificationVersion2_2.pdf in Table 6.1 for details.
     * 
     * @var     string[]
     * @field   pagecat
     * @scope   optional
     */
    private $pageCategories;
    
    /**
     * The application version.
     * 
     * @var     string
     * @field   ver
     * @scope   optional
     */
    private $version;
    
    /**
     * Application bundle or package name (e.g., "com.foo.mygame"). This is intended to be a unique ID across
     * multiple exchanges.
     * 
     * @var     string
     * @field   bundle
     * @scope   recommended
     */
    private $bundle;
    
    /**
     * Specifies whether the app has a privacy policy. “1” means there is a policy and “0” means there is not.
     * 
     * @var     int
     * @field   privacypolicy
     * @scope   optional
     */
    private $privacyPolicy;
    
    /**
     * “1” if the application is a paid version; else “0” (i.e., free).
     * 
     * @var     integer
     * @field   paid
     * @scope   optional
     */
    private $paid;
    
    /**
     * The publisher.
     * 
     * @var     Publisher
     * @field   publisher
     * @scope   optional
     */
    private $publisher;
    
    /**
     * The content.
     * 
     * @var     Content
     * @field   content
     * @scope   optional
     */
    private $content;
    
    /**
     * List of keywords describing this app in a comma separated string. ALTERNATE Representation: Array of strings.
     * 
     * @var     string|array
     * @field   keywords
     * @scope   optional
     */
    private $keywords;
    
    /**
     * For QAG 1.5 compliance, an app store URL for an installed app should be passed in the bid request.
     * 
     * @var     string
     * @field   storeurl
     * @scope   optional
     */
    private $storeUrl;

    /**
     * Returns the application id.
     * 
     * @return string
     */
    function getId()
    {
        return $this->id;
    }

    /**
     * Sets the application id.
     * 
     * @param string $id
     */
    function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Returns the application name.
     * 
     * @return string
     */
    function getName()
    {
        return $this->name;
    }

    /**
     * Sets the application name.
     * 
     * @param string $name
     */
    function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the application domain.
     * 
     * @return string
     */
    function getDomain()
    {
        return $this->domain;
    }

    /**
     * Sets the application domain.
     * 
     * @param string $domain
     */
    function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * Returns the content categories for the overall application.
     * 
     * @return string[]
     */
    function getCategories()
    {
        return $this->categories;
    }

    /**
     * Sets the content categories for the overall application.
     * 
     * @param string[] $categories
     */
    function setCategories($categories)
    {
        $this->categories = $categories;
    }

    /**
     * Returns the content categories for the current subsection of the application.
     * 
     * @return string[]
     */
    function getSubsectionCategories()
    {
        return $this->subsectionCategories;
    }

    /**
     * Sets the content categories for the current subsection of the application.
     * 
     * @param string[] $subsectionCategories
     */
    function setSubsectionCategories($subsectionCategories)
    {
        $this->subsectionCategories = $subsectionCategories;
    }

    /**
     * Returns the content categories for the current page/view of the application.
     * 
     * @return string[]
     */
    function getPageCategories()
    {
        return $this->pageCategories;
    }

    /**
     * Sets the content categories for the current page/view of the application.
     * 
     * @param string[] $pageCategories
     */
    function setPageCategories($pageCategories)
    {
        $this->pageCategories = $pageCategories;
    }

    /**
     * Returns the application version.
     * 
     * @return string
     */
    function getVersion()
    {
        return $this->version;
    }

    /**
     * Sets the application version.
     * 
     * @param string $version
     */
    function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Returns the application bundle or package name.
     * 
     * @return string
     */
    function getBundle()
    {
        return $this->bundle;
    }

    /**
     * Sets the application bundle or package name.
     * 
     * @param string $bundle
     */
    function setBundle($bundle)
    {
        $this->bundle = $bundle;
    }

    /**
     * Returns <b>1</b> if the application has privacy policy, <b>0</b> otherwise.
     * 
     * @return int
     */
    function getPrivacyPolicy()
    {
        return $this->privacyPolicy;
    }

    /**
     * Sets the application privacy policy flag.
     * 
     * @param int $privacyPolicy
     */
    function setPrivacyPolicy($privacyPolicy)
    {
        $this->privacyPolicy = $privacyPolicy;
    }

    /**
     * Returns <b>1</b> if the application is a paid version, <b>0</b> otherwise (application is free).
     * 
     * @return int
     */
    function getPaid()
    {
        return $this->paid;
    }

    /**
     * Sets the application paid flag.
     * 
     * @param int $paid
     */
    function setPaid($paid)
    {
        $this->paid = $paid;
    }

    /**
     * Returns the application publisher.
     * 
     * @return Publisher
     */
    function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * Sets the application publisher.
     * 
     * @param Publisher $publisher
     */
    function setPublisher(Publisher $publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * Returns the application content.
     * 
     * @return Content
     */
    function getContent()
    {
        return $this->content;
    }

    /**
     * Sets the application content.
     * 
     * @param Content $content
     */
    function setContent(Content $content)
    {
        $this->content = $content;
    }

    /**
     * Returns the list of keywords describing this application (either comma seperated string or array of strings).
     * 
     * @return string|array
     */
    function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Sets the list of keywords describing this application (either comma seperated srting or array of strings).
     * 
     * @param string|array $keywords
     */
    function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * Returns the store URL of the application.
     * 
     * @return string
     */
    function getStoreUrl()
    {
        return $this->storeUrl;
    }

    /**
     * Sets the store URL of the application.
     * 
     * @param string $storeUrl
     */
    function setStoreUrl($storeUrl)
    {
        $this->storeUrl = $storeUrl;
    }
    
}
