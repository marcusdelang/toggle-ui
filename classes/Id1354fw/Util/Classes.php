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

use Id1354fw\Util\Strings;

/**
 * Contains functions for class name manupulation.
 *
 * @author Leif Lindback, leifl@kth.se
 */
class Classes {

    const NAMESPACE_SEPARATOR = '\\';

    private static $classpathRoot;

    private function __construct() {
        
    }

    /**
     * Returns the context name, which is the part of the url indicating the root of the current 
     * web application. If the root of the web application is at the url 
     * <code>http://server.com/here/</code>, this method will return <code>/here/</code>. If there
     * is no context path, i.e the root of the web application is at the url 
     * <code>http://server.com/</code>, this method will return <code>/</code>.
     * 
     * @return string The context name.
     */
    public static function getContextPath() {
        $scriptFileName = "index.php";
        $serverRoot = $_SERVER['DOCUMENT_ROOT'];
        $scriptFilePath = $_SERVER['SCRIPT_FILENAME'];
        $webAppRoot = Strings::removeTrailingString($scriptFilePath, $scriptFileName);
        $ctxRoot = Strings::removeLeadingString($webAppRoot, $serverRoot);
        if (\strlen($ctxRoot === 0)) {
            return '/';
        } else {
            return Strings::removeLeadingString($webAppRoot, $serverRoot);
        }
    }

    private static function calculateClassPathRoot() {
        return Strings::removeTrailingString(__DIR__, self::namespaceOfClass(\get_called_class()));
    }

    /**
     * Returns the namespace part of the specified class.
     * 
     * @param string $fullyQualifiedClassName The namespace part of this fully qualified class name 
     *                                         is returned.
     * @return string                         The namespace of the specified class. The namespace is
     *                                         on file path format, if the specified class is 
     *                                         <code>a\b\c</code>, the returned value is 
     *                                         <code>/a/b</code>.
     * @throws \InvalidArgumentException      If an invalid class name is specified.
     */
    public static function namespaceOfClass($fullyQualifiedClassName) {
        self::validateClassName($fullyQualifiedClassName);
        $classnameElements = \explode(self::NAMESPACE_SEPARATOR, $fullyQualifiedClassName);
        $namespace = "";
        for ($i = 0; $i < \count($classnameElements) - 1; $i++) {
            $namespace = $namespace . DIRECTORY_SEPARATOR . $classnameElements[$i];
        }
        return $namespace;
    }

    /**
     * @return string The path to the directory in which the directory structure corresponding to
     *                 namespaces starts.
     */
    public static function getClassPathRoot() {
        if (empty(self::$classpathRoot)) {
            self::$classpathRoot = self::calculateClassPathRoot();
        }
        return self::$classpathRoot;
    }

    /**
     * Returns the name of a file whose path and name corresponds to the specified class name. If
     * the specified class name is a\b\c, the returned file name is a/b/c.php
     * 
     * @param string $fullyQualifiedClassName The fully qualified name of the class whose file is 
     *                                         searched.
     * @return string                         The name of the file containing the specified class.
     * @throws \InvalidArgumentException      If an invalid class name is specified.
     */
    public static function fileNameOfClass($fullyQualifiedClassName) {
        self::validateClassName($fullyQualifiedClassName);
        return self::getClassPathRoot() . DIRECTORY_SEPARATOR .
                \str_replace(self::NAMESPACE_SEPARATOR, DIRECTORY_SEPARATOR,
                             $fullyQualifiedClassName)
                . '.php';
    }

    /**
     * Returns the name of a class whose fully qualified name corresponds to the specified file name. 
     * If the specified file name is getClassPathRoot()/a/b/c.php, the returned class name is a\b\c
     * 
     * @param string $fileName           The name of the file whose contained class is searched.
     * @return string                    The name of the class in the specified file.
     * @throws \InvalidArgumentException If an invalid file name is specified.
     */
    public static function nameOfClassInFile($fileName) {
        self::validateFileName($fileName);
        $className = Strings::removeTrailingString(
                        Strings::removeLeadingString($fileName,
                                                     self::getClassPathRoot() . DIRECTORY_SEPARATOR),
                                                     '.php');
        return \str_replace(DIRECTORY_SEPARATOR, self::NAMESPACE_SEPARATOR, $className);
    }

    private static function validateFileName($fileName) {
        if (!\is_string($fileName)) {
            throw new \InvalidArgumentException('File name must be string, ' . $fileName);
        }

        if (\strlen($fileName) === 0) {
            throw new \InvalidArgumentException('No file name specified');
        }

        if (!Strings::endsWith($fileName, ".php")) {
            throw new \InvalidArgumentException("File name must end with .php, " . $fileName);
        }

        if (!Strings::startsWith($fileName, self::getClassPathRoot() . DIRECTORY_SEPARATOR)) {
            throw new \InvalidArgumentException("File name must be under classpath root, " . $fileName);
        }
    }

    /**
     * Validates the specified class name. A valid file name follows these rules:
     * 1. It is a string.
     * 2. It contains at least one character.
     * 3. It contains only alphanumeric characters, '_' and '\'.
     * 4. Multiple '\' characters are separetaed by at least one alphanumeric character.
     * 5. The first character is not '\'.
     * 
     * @param type $fullyQualifiedClassName The class name to validate.
     * @throws \InvalidArgumentException If the class name is invalid.
     */
    public static function validateClassName($fullyQualifiedClassName) {
        if (!\is_string($fullyQualifiedClassName)) {
            throw new \InvalidArgumentException('Class name must be string, ' . $fullyQualifiedClassName);
        }

        if (\strlen($fullyQualifiedClassName) === 0) {
            throw new \InvalidArgumentException('No class name specified');
        }

        $allowedNonAlnumChars = array(self::NAMESPACE_SEPARATOR, '_');
        if (!\ctype_alnum(\str_replace($allowedNonAlnumChars, '', $fullyQualifiedClassName))) {
            throw new \InvalidArgumentException('Illegal characters in class name: ' . $fullyQualifiedClassName);
        }

        if (\strpos($fullyQualifiedClassName, self::NAMESPACE_SEPARATOR . self::NAMESPACE_SEPARATOR)
                !== FALSE) {
            throw new \InvalidArgumentException('Consecutive ' . self::NAMESPACE_SEPARATOR .
            'in class name, ' . $fullyQualifiedClassName);
        }

        if (Strings::startsWith($fullyQualifiedClassName, self::NAMESPACE_SEPARATOR)) {
            throw new \InvalidArgumentException('Class name starts with ' . self::NAMESPACE_SEPARATOR .
            ', ' . $fullyQualifiedClassName);
        }
    }

}
