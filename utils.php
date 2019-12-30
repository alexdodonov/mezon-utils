<?php
namespace Mezon;

/**
 * Class Utils
 *
 * @package Mezon
 * @subpackage Utils
 * @author Dodonov A.A.
 * @version v.1.0 (2019/09/20)
 * @copyright Copyright (c) 2019, aeon.org
 */

/**
 * Utilities
 */
class Utils
{

    /**
     * Method returns true if any bot was detected
     *
     * @param string $UserAgent
     *            Visitor's user agent
     * @return boolean True|false
     */
    public static function isBot(string $UserAgent): bool
    {
        $KnownBots = [
            'Googlebot',
            'Bingbot',
            'Slurp',
            'DuckDuckBot',
            'Baiduspider',
            'YandexBot',
            'Sogou',
            'Exabot',
            'facebot',
            'facebookexternalhit',
            'ia_archiver',
            'YandexAccessibilityBot',
            'YandexMobileBot',
            'YandexDirectDyn',
            'YandexScreenshotBot',
            'YandexImages',
            'YandexVideo',
            'YandexVideoParser',
            'YandexMedia',
            'YandexWebmaster',
            'YandexPagechecker',
            'YandexImageResizer',
            'YaDirectFetcher',
            'YandexCalendar',
            'YandexSitelinks',
            'YandexMetrika',
            'YandexNews',
            'YandexVertis',
            'YandexSearchShop',
            'YandexVerticals'
        ];

        foreach ($KnownBots as $BotSignature) {
            if (stripos($UserAgent, $BotSignature) !== false) {
                return (true);
            }
        }

        return (false);
    }
}

?>