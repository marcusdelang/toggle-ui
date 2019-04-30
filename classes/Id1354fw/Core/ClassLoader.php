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

namespace Id1354fw\Core;

use Id1354fw\Util\Classes;

/**
 * Loads classes, there is no need to <code>include</code> classes.
 *
 * @author Leif Lindback, leifl@kth.se
 */
class ClassLoader {

    const DEF_HANDLER_FILE_NAME = "DefaultRequestHandler.php";

    private static $instance;

    private function __construct() {
        
    }

    /**
     * @return ClassLoader The only instance of this singleton.
     */
    public static function getInstance() {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Load the specified class. A class should be in a file matching its class name, in a directory 
     * structure matching its namespace, under the classes directory. For example, the class 
     * <code>MyClass</code> in the namespace <code>\MyApp\Model</code> shall be in the file 
     * <code>classes/MyApp/Model/MyClass.php<code/>.
     * 
     * @param string $class Fully qualified name of class to load.
     * @throws InvalidArgumentException If the class name is invalid.
     * @throws ClassNotFoundException   If specified class was not found.
     */
    public function loadClass($class) {
        Classes::validateClassName($class);
        $fileName = Classes::fileNameOfClass($class);
        if (!\file_exists($fileName)) {
            throw new ClassNotFoundException("Could not load class " . $class);
        }
        require_once $fileName;
    }

    /**
     * Attempts to load a default request handler, that is any class called <code>DefaultRequestHandler</code>, 
     * in any directory in any level under the <code>classes</code> directory.
     * 
     * @throws ClassNotFoundException If no default request handler was found.
     */
    public function loadDefaultHandler() {
        $defaultHandlerFile = $this->searchInDir(Classes::getClassPathRoot(),
                                                 self::DEF_HANDLER_FILE_NAME);
        if ($defaultHandlerFile) {
            require_once $defaultHandlerFile;
            return Classes::nameOfClassInFile($defaultHandlerFile);
        } else {
            throw new ClassNotFoundException("Could not find default request handler.");
        }
    }

    private function searchInDir($path, $searchedFileName) {
        try {
            $origDir = \getcwd();
            return $this->doSearchInDir($path, $searchedFileName);
        } finally {
            \chdir($origDir);
        }
    }

    private function doSearchInDir($path, $searchedFileName) {
        \chdir($path);
        foreach (\scandir('.') as $file) {
            if (\is_dir($file) && $file != "." && $file != "..") {
                $searchResult = $this->doSearchInDir($file, $searchedFileName);
                if ($searchResult) {
                    \chdir('..');
                    return $searchResult;
                }
            } elseif (\is_file($file) && $file === $searchedFileName) {
                $pathToSearchedFile = \getcwd() . DIRECTORY_SEPARATOR . $file;
                \chdir('..');
                return $pathToSearchedFile;
            }
        }
        \chdir('..');
        return false;
    }

}
