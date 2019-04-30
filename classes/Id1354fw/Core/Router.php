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

use Id1354fw\Util\Strings;
use Id1354fw\Util\Classes;
use Id1354fw\Error\ErrorHandler;

/**
 * Matches URI to request handling class and invokes the appropriate request handler. 
 *
 * @author Leif Lindback, leifl@kth.se
 */
class Router {

    const INDEX_FILE_NAME = 'index.php';

    /**
     * Calls the <code>execute</code> method in the request handler that corresponds to the 
     * specified url. The algorithm to find the request handler is as follows.
     * 1. Remove protocol, server and port from the specified url.
     * 2. Remove http query strings from the string returned by step one.
     * 3. Remove the trailing slash, if there is one, from the string returned by step two.
     * 4. Remove the context path from the string returned by step three. The context path is the part 
     *    between the file system path to the server's root directory and the file system path to a 
     *    file in the web application's root directory.
     * 5. The string returned by step four is the fully qualified name of the request handler to use.
     * 6. If there is no matching class, or if the string in step 5 is 'index.php', use any class 
     *    called <code>DefaultView</code>, in any directory in any level under the 
     *    <code>classes</code> directory.
     * 7. If there still is no matching class, return a HTTP 404 response.
     * 
     * Example:
     * The uri <code>http://server/contextPath/Myapp/View/SomeView</code> will be resolved to the 
     * class <code>\MyApp\View\SomeView</code> located in the file 
     * <code>classes/Myapp/View/SomeView.php</code>
     */
    public function routeRequest() {
        try {
            $className = $this->extractClassNameFromUri();

            if ($className === self::INDEX_FILE_NAME) {
                $handler = $this->getDefaultHandler();
                return;
            }

            Classes::validateClassName($className);

            $handler = new $className();
        } catch (ClassNotFoundException $cnfe) {
            $handler = $this->getDefaultHandler();
        } catch (\InvalidArgumentException $iae) {
            $handler = $this->getDefaultHandler();
        } finally {
            if ($handler !== NULL) {
                $handler->execute();
            }
        }
    }

    private function extractClassNameFromUri() {
        $path = $this->removeContextPath(
                $this->removeTrailingSlash(
                        $this->removeQueryString($_SERVER['REQUEST_URI'])));
        return \str_replace(Strings::URL_SEPARATOR, Classes::NAMESPACE_SEPARATOR, $path);
    }

    private function getDefaultHandler() {
        $loader = ClassLoader::getInstance();
        try {
            $defaultHandlerClassName = '\\' . $loader->loadDefaultHandler();
            return new $defaultHandlerClassName();
        } catch (ClassNotFoundException $cnfe) {
            $errorHandler = new ErrorHandler();
            $errorHandler->noRequestHandlerFound();
            return NULL;
        }
    }

    private function removeQueryString($uri) {
        $queryStart = \strpos($uri, '?');
        if ($queryStart) {
            return \substr($uri, 0, $queryStart);
        } else {
            return $uri;
        }
    }

    private function removeTrailingSlash($uri) {
        return Strings::removeTrailingString($uri, "/");
    }

    private function removeContextPath($uri) {
        return Strings::removeLeadingString($uri, Classes::getContextPath());
    }

}
