<?php

/*
 * Copyright (c) 2015, Leif Lindbäck
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without 
 * modification, are permitted provided that the following conditions are 
 * met:
 * 
 * 1. Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 * 
 * 2. Redistributions in binary form must reproduce the above copyright 
 *    notice, this list of conditions and the following disclaimer in the 
 *    documentation and/or other materials provided with the distribution.
 * 
 * 3. Neither the name of the copyright holder nor the names of its 
 *    contributors may be used to endorse or promote products derived from 
 *    this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS 
 * IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO,
 * THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR 
 * PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR 
 * CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, 
 * EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, 
 * PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR 
 * PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF 
 * LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING 
 * NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS 
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

namespace Id1354fw\Util;

/**
 * Contains functions for string manipulation.
 *
 * @author Leif Lindback, leifl@kth.se
 */
class Strings {

    const URL_SEPARATOR = "/";

    private function __construct() {
        
    }

    /**
     * Strips <code>$strToRemove</code> from the end of <code>$mainStr</code>. If 
     * <code>$mainStr</code> does not end with <code>$strToRemove</code>, it is returned unaltered.
     * 
     * @param string $mainStr     String from which to remove end.
     * @param string $strToRemove End to remove.
     * @return string             <code>$mainStr</code> with eventual trailing 
     *                            <code>$strToRemove</code> removed.
     */
    public static function removeTrailingString($mainStr, $strToRemove) {
        $mainStrLength = \strlen($mainStr);
        $strToRemoveLength = \strlen($strToRemove);
        if ((\substr_compare($mainStr, $strToRemove, $mainStrLength - $strToRemoveLength,
                             $strToRemoveLength) === 0)) {
            return \substr($mainStr, 0, $mainStrLength - $strToRemoveLength);
        } else {
            return $mainStr;
        }
    }

    /**
     * Strips <code>$strToRemove</code> from the beginning of <code>$mainStr</code>. If 
     * <code>$mainStr</code> does not begin with <code>$strToRemove</code>, it is returned unaltered.
     * 
     * @param string $mainStr     String from which to remove beginning.
     * @param string $strToRemove Beginning to remove.
     * @return string             <code>$mainStr</code> with eventual leading 
     *                            <code>$strToRemove</code> removed.
     */
    public static function removeLeadingString($mainStr, $strToRemove) {
        $mainStrLength = \strlen($mainStr);
        $strToRemoveLength = \strlen($strToRemove);
        if ((\substr_compare($mainStr, $strToRemove, 0, $strToRemoveLength) === 0)) {
            return \substr($mainStr, $strToRemoveLength, $mainStrLength - $strToRemoveLength);
        } else {
            return $mainStr;
        }
    }

    /**
     * Counts how many times <code>$strToCount</code> appears in <code>$mainStr</code>,
     * 
     * @param string $mainStr    String in which to count occurrences.
     * @param string $strToCount The substring that is counted.
     * @return int            How many times <code>$strToCount</code> appears in 
     *                           <code>$mainStr</code>.
     */
    public static function countOccurrences($mainStr, $strToCount) {
        if (\strlen($strToCount) === 0) {
            return 0;
        }
        return count(\explode($strToCount, $mainStr)) - 1;
    }

    /**
     * Returns <code>true</code> if the specified string ends with the specified value, 
     * <code>false</code> is it does not.
     * 
     * @param string $str The string to check for the specified end.
     * @param string $end The end to look for in the specified string.
     * @return boolean    <code>true</code> if the specified string ends with the specified value, 
     *                     <code>false</code> if it does not.
     */
    public static function endsWith($str, $end) {
        if (\strlen($end) === 0) {
            return FALSE;
        }
        return \strpos($str, $end) === (\strlen($str) - \strlen($end));
    }

    /**
     * Returns <code>true</code> if the specified string begins with the specified value, 
     * <code>false</code> if it does not.
     * 
     * @param string $str       The string to check for the specified beginning.
     * @param string $beginning The beginning to look for in the specified string.
     * @return boolean          <code>true</code> if the specified string begins with the 
     *                           specified value, <code>false</code> is it does not.
     */
    public static function startsWith($str, $beginning) {
        if (\strlen($beginning) === 0) {
            return FALSE;
        }
        return \strpos($str, $beginning) === 0;
    }

    /**
     * Returns <code>true</code> if the specified parameter is a string with length > 0, 
     * <code>false</code> if it is not.
     * 
     * @param mixed $string The string to validate.
     * @return boolean      <code>true</code> if the specified parameter is a string with 
     *                      length > 0, <code>false</code> if it is not.
     */
    public static function isNonEmptyString($string) {
        if (empty($string)) {
            return FALSE;
        }
        if (!\is_string($string)) {
            return FALSE;
        }
        if (\strlen($string) === 0) {
            return FALSE;
        }
        return TRUE;
    }

}