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

namespace Id1354fw\Error;

use Id1354fw\Util\Classes;
use Id1354fw\View\ViewNotFoundException;

/**
 * Manages framework errors.
 *
 * @author Leif Lindback, leifl@kth.se
 */
class ErrorHandler {

    const HANDLER_NOT_FOUND_FILE = 'handler-not-found.php';
    const VIEW_NOT_FOUND_FILE = 'view-not-found.php';
    const INTERNAL_SERVER_ERROR_FILE = 'internal-server-error.php';

    /**
     * Neither the specified request handler, nor a default request handler was found. Sends a 
     * http response with error code 404.
     */
    public function noRequestHandlerFound() {
        include $this->pathPrefix() . self::HANDLER_NOT_FOUND_FILE;
    }

    /**
     * The framework could not complete a task. Sends a http response with error code 500.
     * 
     * @param Exception The reason why this method is called.
     */
    public function internalServerError(\Exception $exception) {
        include $this->pathPrefix() . self::INTERNAL_SERVER_ERROR_FILE;
    }

    /**
     * The view that should be displayed was not found.
     * 
     * @param ViewNotFoundException The reason why this method is called.
     */
    public function noViewFound(ViewNotFoundException $exception) {
        include $this->pathPrefix() . self::VIEW_NOT_FOUND_FILE;
    }

    /**
     * This is the error handler for PHP Notice. It does nothing to avoid filling the server logs
     * with messages generated when the session manager checks for a session cookie and there is none.
     */
    public function phpNoticeHandler($errno, $errstr) {
        
    }

    private function pathPrefix() {
        return Classes::getClassPathRoot() . Classes::namespaceOfClass(\get_class($this)) .
                DIRECTORY_SEPARATOR;
    }

}
