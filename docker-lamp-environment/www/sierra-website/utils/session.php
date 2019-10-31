<?php
/*
 * class session
 * this file its important because handle the session betwen websites
 * how do you should use? 
 * if your website should show differents views if logged or not 
 * you can check in firts place if is logged, getting username from session
 * if is set you can handle differentes views.
 *
 * to figure out take the example in index.php with the nav bar. 
 * the aproach is:
 *  if is logged I will show a nav with logout button.
 *  if not logged I will show a nav by default
 *
 *
 *  note 30/10/2019
 *  please remember always put session().
 *  If you dont do that other pages show erros.
 *  why? because we are doing again in the navbar and the session() must be placed
 *  in the first line of the php file.
 */

class session
{
    function __construct()
    {
        session_start();
    }
  
    public function set($username, $value)
    {
        $_SESSION[$username] = $value;
    }
  
    public function get($username)
    {
        if (isset($_SESSION[$username])) {
            return $_SESSION[$username];
        } else {
            return false;
        }
    }

    public function destroy_variable($username)
    {
        unset($_SESSION[$username]);
    }
  
    public function end_session()
    {
        $_SESSION = array();
        session_destroy();
    }
}
