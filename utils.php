<?php
namespace Mezon\Utils;

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

    /**
     * Method splits multybyte string into chars
     *
     * @param string $Str
     *            string tobe splitted
     * @return array chars
     */
    public static function mbStrSplit(string $Str): array
    {
        return (preg_split('~~u', $Str, null, PREG_SPLIT_NO_EMPTY));
    }

    /**
     * Simple transliterator
     *
     * @param string $Str
     *            string to translit
     * @param string $From
     *            origin sybmols
     * @param string $To
     *            target symbols
     * @return string translitted string
     */
    public static function mbStrTr(string $Str, string $From, string $To): string
    {
        return (str_replace(self::mbStrSplit($From), self::mbStrSplit($To), $Str));
    }

    /**
     * Simple transliterator
     *
     * @param string $Str
     *            string to translit
     * @param array $Sybstitution
     *            substitutions in key+value pairs
     * @return string translitted string
     */
    public static function mbStrTrArray(string $Str, array $Sybstitution): string
    {
        return (str_replace(array_keys($Sybstitution), array_values($Sybstitution), $Str));
    }

    /**
     * Method translits string
     *
     * @param string $Text
     *            string to be translitted
     * @return string translitted string
     */
    public static function translit(string $Text): string
    {
        $Text = self::mbStrTr($Text, "абвгдежзийклмнопрстуфыэАБВГДЕЖЗИЙКЛМНОПРСТУФЫЭ", "abvgdegziyklmnoprstufieABVGDEGZIYKLMNOPRSTUFIE");
        $Text = self::mbStrTrArray($Text, [
            'ё' => "yo",
            'х' => "h",
            'ц' => "ts",
            'ч' => "ch",
            'ш' => "sh",
            'щ' => "shch",
            'ъ' => '',
            'ь' => '',
            'ю' => "yu",
            'я' => "ya",
            'Ё' => "Yo",
            'Х' => "H",
            'Ц' => "Ts",
            'Ч' => "Ch",
            'Ш' => "Sh",
            'Щ' => "Shch",
            'Ъ' => '',
            'Ь' => '',
            'Ю' => "Yu",
            'Я' => "Ya"
        ]);
        return ($Text);
    }

    /**
     * Method translits string into URL.
     * I.e. all spaces will be replaced in '-'
     *
     * @param string $Text
     *            string to be translitted
     * @return string translitted string
     */
    public static function translitUrl(string $Text): string
    {
        $Text = self::translit($Text);
        $Text = str_replace([
            ' ',
            '!',
            '#',
            '$',
            '%',
            ':',
            '/'
        ], [
            '-',
            '',
            '',
            '',
            '',
            '',
            ''
        ], $Text);
        return ($Text);
    }
}
