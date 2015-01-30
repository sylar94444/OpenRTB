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
 * The content object itself and all of its parameters are optional, so default values are not provided. If an
 * optional parameter is not specified, it should be considered unknown. This object describes the content in which
 * the impression will appear (maybe syndicated or non-syndicated content).
 * 
 * This object may be useful in the situation where syndicated content contains impressions and does not necessarily
 * match the publisher’s general content. The exchange might or might not have knowledge of the page where the content
 * is running, as a result of the syndication method. (For example, video impressions embedded in an iframe on an
 * unknown web property or device.)
 *
 * @author  Vahe Markarian <contact@vahemark.com>
 * @package \OpenRTB\Object
 */
class Content extends Base\OpenRtbObject
{
    
    // Video quality
    const VIDEO_QUALITY_UNKNOWN                 = 0;
    const VIDEO_QUALITY_PROFESSIONALLY_PRODUCED = 1;
    const VIDEO_QUALITY_PROSUMER                = 2;
    const VIDEO_QUALITY_USER_GENERATED          = 3;
    
    // Content context
    const CONTENT_CONTEXT_VIDEO         = 1;
    const CONTENT_CONTEXT_GAME          = 2;
    const CONTENT_CONTEXT_MUSIC         = 3;
    const CONTENT_CONTEXT_APPLICATION   = 4;
    const CONTENT_CONTEXT_TEXT          = 5;
    const CONTENT_CONTEXT_OTHER         = 6;
    const CONTENT_CONTEXT_UNKNOWN       = 7;
    
    // QAG media ratings
    const QAG_MEDIA_RATING_ALL_AUDIENCES     = 1;
    const QAG_MEDIA_RATING_EVERYONE_OVER_12  = 2;
    const QAG_MEDIA_RATING_MATURE_AUDIENCES  = 3;
    
    /**
     * ID uniquely identifying the content.
     * 
     * @var     string
     * @field   id
     * @scope   optional
     */
    private $id;
    
    /**
     * Content episode number (typically applies to video content).
     * 
     * @var     integer
     * @field   episode
     * @scope   optional
     */
    private $episodeNumber;
    
    /**
     * Content title.
     * 
     * Video examples: “Search Committee” (television) or “A New Hope” (movie) or “Endgame” (made for web).
     * Non-video example: “Why an Antarctic Glacier Is Melting So Quickly” (Time magazine article).
     * 
     * @var     string
     * @field   title
     * @scope   optional
     */
    private $title;
    
    /**
     * Content series.
     * 
     * Video examples: “The Office” (television) or “Star Wars” (movie) or “Arby ‘N’ The Chief” (made for web).
     * Non-video example: “Ecocentric” (Time magazine blog).
     * 
     * @var     string
     * @field   series
     * @scope   optional
     */
    private $series;
    
    /**
     * Content season. E.g., “Season 3” (typically applies to video content).
     * 
     * @var     string
     * @field   season
     * @scope   optional
     */
    private $season;
    
    /**
     * Original URL of the content, for buy-side contextualization or review.
     * 
     * @var     string
     * @field   url
     * @scope   optional
     */
    private $url;
    
    /**
     * Array of IAB content categories for the content.
     * 
     * Please refer to http://www.iab.net/media/file/OpenRTBAPISpecificationVersion2_2.pdf in Table 6.1 for details.
     * 
     * @var     string[]
     * @field   cat
     * @scope   optional
     */
    private $categories;
    
    /**
     * Video quality per the IAB’s classification.
     * 
     * Please check the class constants specific to the video quality.
     * Please refer to http://www.iab.net/media/file/OpenRTBAPISpecificationVersion2_2.pdf in Table 6.14 for details.
     * 
     * @var     int
     * @field   videoquality
     * @scope   optional
     */
    private $videoQuality;
    
    /**
     * Comma separated list of keywords describing the content. ALTERNATE Representation: Array of strings.
     * 
     * @var     string|string[]
     * @field   keywords
     * @scope   optional
     */
    private $keywords;
    
    /**
     * Content rating (e.g., MPAA).
     * 
     * @var     string
     * @field   contentrating
     * @scope   optional
     */
    private $contentRating;
    
    /**
     * User rating of the content (e.g., number of stars, likes, etc.).
     * 
     * @var     string
     * @field   userrating
     * @scope   optional
     */
    private $userRating;
    
    /**
     * Specifies the type of content (game, video, text, etc.).
     * 
     * Please check the class constants specific to the content context.
     * Please refer to http://www.iab.net/media/file/OpenRTBAPISpecificationVersion2_2.pdf in Table 6.13 for details.
     * 
     * @var     string
     * @field   context
     * @scope   optional
     */
    private $context;
    
    /**
     * Is content live? E.g., live video stream, live blog. “1” means content is live. “0” means it is not live.
     * 
     * @var     int
     * @field   livestream
     * @scope   optional
     */
    private $liveStream;
    
    /**
     * Source relationship. 1 for “direct”; 0 for “indirect”.
     * 
     * @var     int
     * @field   sourcerelationship
     * @scope   optional
     */
    private $sourceRelationship;
    
    /**
     * Producer.
     * 
     * @var     Producer
     * @field   producer
     * @scope   optional
     */
    private $producer;
    
    /**
     * Length of content (appropriate for video or audio) in seconds.
     * 
     * @var     int
     * @field   len
     * @scope   optional
     */
    private $length;
    
    /**
     * Media rating of the content, per QAG guidelines.
     * 
     * Please check the class constants specific to the QAG media rating.
     * Please refer to http://www.iab.net/media/file/OpenRTBAPISpecificationVersion2_2.pdf in Table 6.18 for details.
     * 
     * @var     int
     * @field   qagmediarating
     * @scope   optional
     */
    private $qagMediaRating;
    
    /**
     * From QAG Video Addendum. If content can be embedded (such as an embeddable video player) this value should be
     * set to “1”. If content cannot be embedded, then this should be set to “0”.
     * 
     * @var     int
     * @field   embaddable
     * @scope   optional
     */
    private $embaddable;
    
    /**
     * Language of the content. Use alpha-2/ISO 639-1 codes.
     * 
     * @var     string
     * @field   language
     * @scope   optional
     */
    private $langauge;

    /**
     * Returns the content id.
     * 
     * @return string
     */
    function getId()
    {
        return $this->id;
    }

    /**
     * Sets the content id.
     * 
     * @param string $id
     */
    function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Returns the content episode number.
     * 
     * @return int
     */
    function getEpisodeNumber()
    {
        return $this->episodeNumber;
    }

    /**
     * Sets the content episode number.
     * 
     * @param int $episode
     */
    function setEpisodeNumber($episode)
    {
        $this->episodeNumber = $episode;
    }

    /**
     * Returns the content title.
     * 
     * @return string
     */
    function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the content title.
     * 
     * @param string $title
     */
    function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the content series.
     * 
     * @return string
     */
    function getSeries()
    {
        return $this->series;
    }

    /**
     * Sets the content series.
     * 
     * @param string $series
     */
    function setSeries($series)
    {
        $this->series = $series;
    }

    /**
     * Returns the content season.
     * 
     * @return string
     */
    function getSeason()
    {
        return $this->season;
    }

    /**
     * Sets the content season.
     * 
     * @param string $season
     */
    function setSeason($season)
    {
        $this->season = $season;
    }

    /**
     * Returns the content URL.
     * 
     * @return string
     */
    function getUrl()
    {
        return $this->url;
    }

    /**
     * Sets the content URL.
     * 
     * @param string $url
     */
    function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Returns the content categories.
     * 
     * @return string[]
     */
    function getCategories()
    {
        return $this->categories;
    }

    /**
     * Sets the content categories.
     * 
     * @param string[] $categories
     */
    function setCategories($categories)
    {
        $this->categories = $categories;
    }

    /**
     * Returns the video quality per the IAB’s classification.
     * 
     * @return int
     */
    function getVideoQuality()
    {
        return $this->videoQuality;
    }

    /**
     * Sets the video quality per the IAB’s classification.
     * 
     * @param int $videoQuality
     */
    function setVideoQuality($videoQuality)
    {
        $this->videoQuality = $videoQuality;
    }

    /**
     * Returns the content keywords.
     * 
     * @return string|string[]
     */
    function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Sets the content keywords.
     * 
     * @param string|string[] $keywords
     */
    function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * Returns the content rating.
     * 
     * @return string
     */
    function getContentRating()
    {
        return $this->contentRating;
    }

    /**
     * Sets the content rating.
     * 
     * @param string $contentRating
     */
    function setContentRating($contentRating)
    {
        $this->contentRating = $contentRating;
    }

    /**
     * Returns the user rating.
     * 
     * @return string
     */
    function getUserRating()
    {
        return $this->userRating;
    }

    /**
     * Sets the content user rating.
     * 
     * @param string $userRating
     */
    function setUserRating($userRating)
    {
        $this->userRating = $userRating;
    }

    /**
     * Returns the content context.
     * 
     * @return string
     */
    function getContext()
    {
        return $this->context;
    }

    /**
     * Sets the content context.
     * 
     * @param string $context
     */
    function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * Returns <b>1</b> if the content is live, <b>0</b> otherwise.
     * 
     * @return int
     */
    function getLiveStream()
    {
        return $this->liveStream;
    }

    /**
     * Sets whether the content is live or not.
     * 
     * @param int $liveStream
     */
    function setLiveStream($liveStream)
    {
        $this->liveStream = $liveStream;
    }

    /**
     * Returns <b>1</b> if the source relationship of the content is direct, <b>0</b> otherwise.
     * 
     * @return int
     */
    function getSourceRelationship()
    {
        return $this->sourceRelationship;
    }

    /**
     * Sets the source relationship of the content whether it is direct or indirect.
     * 
     * @param int $sourceRelationship
     */
    function setSourceRelationship($sourceRelationship)
    {
        $this->sourceRelationship = $sourceRelationship;
    }

    /**
     * Returns the content producer.
     * 
     * @return Producer
     */
    function getProducer()
    {
        return $this->producer;
    }

    /**
     * Sets the content producer.
     * 
     * @param Producer $producer
     */
    function setProducer(Producer $producer)
    {
        $this->producer = $producer;
    }

    /**
     * Returns the content length.
     * 
     * @return int
     */
    function getLength()
    {
        return $this->length;
    }

    /**
     * Sets the content length.
     * 
     * @param int $length
     */
    function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * Returns the content QAG media rating.
     * 
     * @return int
     */
    function getQagMediaRating()
    {
        return $this->qagMediaRating;
    }

    /**
     * Sets the content QAG media rating.
     * 
     * @param int $qagMediaRating
     */
    function setQagMediaRating($qagMediaRating)
    {
        $this->qagMediaRating = $qagMediaRating;
    }

    /**
     * Returns <b>1</b> of the content is embaddable, <b>0</b> otherwise.
     * 
     * @return int
     */
    function getEmbaddable()
    {
        return $this->embaddable;
    }

    /**
     * Sets whether the content is embaddable or not.
     * 
     * @param int $embaddable
     */
    function setEmbaddable($embaddable)
    {
        $this->embaddable = $embaddable;
    }

    /**
     * Returns the content langauge.
     * 
     * @return string
     */
    function getLangauge()
    {
        return $this->langauge;
    }

    /**
     * Sets the content language.
     * 
     * @param string $langauge
     */
    function setLangauge($langauge)
    {
        $this->langauge = $langauge;
    }
    
}
