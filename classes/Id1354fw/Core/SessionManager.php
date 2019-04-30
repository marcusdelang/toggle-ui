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

/**
 * Responsible for all session handlig.
 *
 * @author Leif Lindback, leifl@kth.se
 */
class SessionManager {

    const SESSION_ID_KEY = 'PHPSESSID';

    /**
     * Resumes the current session if there is one.
     */
    public function __construct() {
        if ($this->sessionExists()) {
            \session_start();
        }
    }

    /**
     * Starts a new session if there is none. Regenerates session id if there is already a session.
     * 
     * @return string The id of the current session, after regeneration if the session id is 
     *                 regenerated.
     */
    public function restart() {
        if (!$this->sessionExists()) {
            \session_start();
        } else {
            \session_regenerate_id();
        }
        return \session_id();
    }

    /**
     * Stops the session, discards all session data, unsets the session id and destroys the 
     * session cookie.
     * 
     * @throws \LogicException if there is no current session.
     */
    public function invalidate() {
        $this->validateSession('SessionManager->stop() called whithout current session.');
        \session_unset();
        \session_destroy();
        \session_id('');
        $_SESSION = array();
        \setcookie(self::SESSION_ID_KEY, "", \time() - 3600, '/');
        unset($_COOKIE[self::SESSION_ID_KEY]);
    }

    /**
     * Serializes the specified value and stores it under the specified key in the session. If 
     * there is already a value with the specified key, it is replaced with the value specified in 
     * this method call.
     * 
     * @param string $key The key for the value that shall be stored in the session.
     * @param mixed $value The value to store in the session.
     * @throws \InvalidArgumentException if $key is not a string with at least one character.
     * @throws \LogicException if there is no current session.
     */
    public function set($key, $value) {
        $this->validateKey($key);
        $this->validateSession("SessionManager->set($key, $value) called whithout current session.");
        $_SESSION[$key] = \serialize($value);
    }

    /**
     * Reads the value with the specified key from the session and unserializes it.
     * 
     * @param string $key The key for the value that shall be read from the session.
     * @return mixed The value corresponding to the specified key, or NULL if there is no 
     *                key-value pair with the specified key.
     * @throws \InvalidArgumentException if $key is not a string with at least one character.
     * @throws \LogicException if there is no current session.
     */
    public function get($key) {
        $this->validateKey($key);
        $this->validateSession("SessionManager->get($key) called whithout current session.");
        return \unserialize($_SESSION[$key]);
    }

    private function validateSession($errorMsg) {
        if (!$this->sessionExists()) {
            throw new \LogicException($errorMsg);
        }
    }

    private function validateKey($key) {
        if (!Strings::isNonEmptyString($key)) {
            throw new \LogicException("invalid key: $key");
        }
    }

    private function sessionExists() {
        if (\strlen(\session_id()) !== 0 || \strlen($_COOKIE[self::SESSION_ID_KEY]) !== 0 || \strlen($_GET[self::SESSION_ID_KEY])
                !== 0 || \strlen($_POST[self::SESSION_ID_KEY]) !== 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
