<?php

namespace Davidvandertuijn;

/**
 * Filesize.
 */
class Filesize
{
    /**
     * To Human Friendly.
     *
     * @param int $bytes
     * @param string $forceUnit
     * @param string $format
     * @param string $standard
     *
     * @return string
     */
    public static function toHumanFriendly(int $bytes, ?string $forceUnit = '', ?string $format = '', ?string $standard = 'SI'): string
    {
        // Format
        $format = empty($format) ? '%01.2f %s' : (string) $format;

        // Standard

        if ($standard == 'IEC'
        || strpos($forceUnit, 'i') !== false) {
            $units = ['B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB', 'EiB', 'ZiB', 'YiB'];
            $mod = 1024;
        } else {
            $units = ['B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
            $mod = 1000;
        }

        // Determine Unit

        if (($power = array_search((string) $forceUnit, $units)) === false) {
            $power = ($bytes > 0) ? floor(log($bytes, $mod)) : 0;
        }

        return sprintf($format, $bytes / pow($mod, $power), $units[$power]);
    }
}
