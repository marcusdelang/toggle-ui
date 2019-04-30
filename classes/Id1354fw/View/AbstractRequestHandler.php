<?php

namespace Id1354fw\View;

use Id1354fw\Core\InternalServerErrorException;
use Id1354fw\Util\Classes;
use Id1354fw\Util\Strings;
use Id1354fw\Error\ErrorHandler;
use Id1354fw\Core\SessionManager;

/**
 * All classes handling a http request must inherit this class. Event handling follows these steps.
 * 
 * 1. Set methods are called. Inheriting concrete classes should provide set methods for all http 
 *    parameters in the handled http request.
 * 2. The doExecute method is called. It should perform all work related to the handled http request.
 * 3. doExecute calls the renderResponse method to render next view. 
 * 4. doExecute must return immediately after calling renderResponse.
 */
abstract class AbstractRequestHandler {

    const VIEW_DIR = 'views/';
    const VIEW_EXTENSION = '.php';

    private $vars;
    private $errorHandler;
    protected $session;

    public function __construct() {
        $this->vars = array();
        $this->errorHandler = new ErrorHandler();
        $this->session = new SessionManager();
    }

    private function setParams() {
        foreach ($this->readHttpParams() as $param => $value) {
            $funcName = 'set' . \ucfirst($param);
            $this->validateFuncName($funcName, $param);
            \call_user_func(array($this, $funcName), $value);
        }
    }

    private function validateFuncName($funcName, $paramName) {
        if (!\method_exists($this, $funcName)) {
            $erroMsg = 'Function ' . \get_class($this) . '->' . $funcName .
                    ' is missing, but request has parameter ' . $paramName;
            throw new InternalServerErrorException($erroMsg);
        }
    }

    private function readHttpParams() {
        $params = $_POST;
        return \array_merge($params, $_GET);
    }

    /**
     * Contains all infrastructure code for event handling. The event handling procedure is
     * explained in the class comment.
     */
    public function execute() {
        $this->setParams();
        $nextView = $this->doExecute();
        if (!Strings::isNonEmptyString($nextView)) {
            return;
        }
        $nextViewPath = $this->createNextViewPath($nextView);
        if (!\file_exists($nextViewPath)) {
            throw new ViewNotFoundException($nextViewPath);
        }
        $this->showNextView($nextViewPath);
    }

    private function createNextViewPath($file) {
        return Classes::getClassPathRoot() . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .
                self::VIEW_DIR . $file . self::VIEW_EXTENSION;
    }

    private function showNextView($viewPath) {
        foreach ($this->vars as $name => $value) {
            $$name = $value;
        }
        include $viewPath;
    }

    /**
     * Overriden by subclasses to perform the actual event handling, which typically means to call 
     * appropriate method(s) in the controller. The event handling procedure is explained in the 
     * class comment.
     * 
     * @return string The path to the file with the next view. 'views/' is prepended to the 
     *                 returned path and '.php' is appended to the path. No next view is rendered
     *                 if the return value is anything but a string with length one or more, nor if
     *                 no value at all is returned.
     */
    protected abstract function doExecute();

    /**
     * Makes the specified value available to the next view as a variable with the specified name.
     * 
     * @param string $name The name of the variable. No variable is created if this parameter
     *                      is anything but a string with length one or more.
     * @param mixed $value The value of the variable.
     */
    protected function addVariable($name, $value) {
        if (!Strings::isNonEmptyString($name)) {
            throw new InternalServerErrorException('Invalid variable name: ' . $name);
        }
        $this->vars[$name] = $value;
    }

}
