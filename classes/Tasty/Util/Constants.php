<?php
namespace Tasty\Util;

use Id1354fw\Util\Classes;

/**
 * Defines constants used by the recipe website, should be implemented by any class that needs
 * to use one or more of these constants.
 */
class Constants {

    const CONTR_KEY = 'CONTR_KEY';
    const DB_KEY = 'DB_KEY';
    const FIRST_PAGE_HANDLER = 'Tasty/View/HomePage';
    const INDEX_VIEW = 'index';
    const CALENDAR_VIEW = 'calendar';
    const RECIPE_MEATBALL_VIEW = 'recipeMeatballs';
    const RECIPE_PANCAKE_VIEW = 'recipePancakes';
    const SIGNUP_VIEW = 'signup';
    const LOGIN_VIEW = 'login';
    const LOGOUT_VIEW = 'logout';

    const COMMENTS_VAR = 'comment';
    const LOGIN_STATUS = 'isLoggedIn';
    const USERNAME_VAR = 'username';
    const USERID_VAR = 'userid';
    const PASSWORD_VAR = 'password';
    const COMMENTID_VAR = 'commentid';


    /**
     * @return string The path to the directory where view fragments (header, footer, etc) 
     *                 are located.
     */
    public static function getViewFragmentsDir() {
        return $_SERVER['DOCUMENT_ROOT'] . Classes::getContextPath() . '/resources/fragments/';
    }


}