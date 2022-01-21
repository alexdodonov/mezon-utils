<?php
namespace Mezon\Utils;

/**
 * Class Utils
 *
 * @package Utils
 * @subpackage Common
 * @author Dodonov A.A.
 * @version v.1.0 (2019/09/20)
 * @copyright Copyright (c) 2019, aeon.su
 */

/**
 * Common utilities
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

        return false;
    }

    // TODO make class Translit here and move there all translit methods
    /**
     * Method splits multybyte string into chars
     *
     * @param string $str
     *            string tobe splitted
     * @return array chars
     */
    private static function mbStrSplit(string $str): array
    {
        return preg_split('~~u', $str, 0, PREG_SPLIT_NO_EMPTY);
    }

    /**
     * Simple transliterator
     *
     * @param string $str
     *            string to translit
     * @param string $from
     *            origin sybmols
     * @param string $to
     *            target symbols
     * @return string translitted string
     */
    public static function mbStrTr(string $str, string $from, string $to): string
    {
        return str_replace(self::mbStrSplit($from), self::mbStrSplit($to), $str);
    }

    /**
     * Simple transliterator
     *
     * @param string $str
     *            string to translit
     * @param array $substitution
     *            substitutions in key+value pairs
     * @return string translitted string
     */
    private static function mbStrTrArray(string $str, array $substitution): string
    {
        return str_replace(array_keys($substitution), $substitution, $str);
    }

    /**
     * Method returns translit dictionary
     *
     * @return array translit dictionary
     */
    private static function getTranslitDictionary(): array
    {
        // TODO store dictionary in the separate *.json file
        // TODO setup locale from setting
        return [
            'Э' => 'E',
            'Ы' => 'I',
            'Ф' => 'F',
            'У' => 'U',
            'Т' => 'T',
            'С' => 'S',
            'Р' => 'R',
            'П' => 'P',
            'О' => 'O',
            'Н' => 'N',
            'М' => 'M',
            'Л' => 'L',
            'К' => 'K',
            'Й' => 'Y',
            'И' => 'I',
            'З' => 'Z',
            'Ж' => 'G',
            'Е' => 'E',
            'Д' => 'D',
            'Г' => 'G',
            'В' => 'V',
            'Б' => 'B',
            'А' => 'A',
            'э' => 'e',
            'ы' => 'i',
            'ф' => 'f',
            'у' => 'u',
            'т' => 't',
            'с' => 's',
            'р' => 'r',
            'п' => 'p',
            'о' => 'o',
            'н' => 'n',
            'м' => 'm',
            'л' => 'l',
            'к' => 'k',
            'й' => 'y',
            'и' => 'i',
            'з' => 'z',
            'ж' => 'g',
            'е' => 'e',
            'д' => 'd',
            'г' => 'g',
            'в' => 'v',
            'б' => 'b',
            'а' => 'a',
            ' ' => ' ',
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
            'Я' => "Ya",
            '0' => '0',
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9'
        ];
    }

    /**
     * Method translits string
     *
     * @param string $text
     *            string to be translitted
     * @return string translitted string
     */
    public static function translit(string $text): string
    {
        return self::mbStrTrArray($text, self::getTranslitDictionary());
    }

    /**
     * Method translits string into URL
     * I.e.
     * all spaces will be replaced in '-'
     *
     * @param string $text
     *            string to be translitted
     * @return string translitted string
     */
    public static function translitUrl(string $text): string
    {
        $result = '';
        $text = self::mbStrSplit($text);
        $dictionary = self::getTranslitDictionary();

        foreach ($text as $letter) {
            if (isset($dictionary[$letter])) {
                $result .= $dictionary[$letter];
            }
        }

        return str_replace(' ', '-', $result);
    }
}
