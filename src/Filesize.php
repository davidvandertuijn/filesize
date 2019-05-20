<?php

namespace Davidvandertuijn;

class Filesize
{
    /**
     * To Human Friendly.
     *
     * @param int $iBytes
     * @param string $sForceUnit
     * @param string $sFormat
     * @param string $sStandard
     *
     * @return string
     */
    public static function toHumanFriendly(int $iBytes, ?string $sForceUnit = '', ?string $sFormat = '', ?string $sStandard = 'SI'): string
    {
        // Format
        $sFormat = empty($sFormat) ? '%01.2f %s' : (string) $sFormat;

        // Standard

        if ($sStandard == 'IEC'
        || strpos($sForceUnit, 'i') !== false) {
            $aUnits = ['B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB', 'EiB', 'ZiB', 'YiB'];
            $iMod = 1024;
        } else {
            $aUnits = ['B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
            $iMod = 1000;
        }

        // Determine Unit

        if (($iPower = array_search((string) $sForceUnit, $aUnits)) === false) {
            $iPower = ($iBytes > 0) ? floor(log($iBytes, $iMod)) : 0;
        }

        return sprintf($sFormat, $iBytes / pow($iMod, $iPower), $aUnits[$iPower]);
    }
}
