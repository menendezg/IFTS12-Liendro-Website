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

    public function is_admin($username)
    {
        /*
         * get from database is the user
         * is admin
         * return bool*/
        $db = new SQLite3('db/taller-sierra.db');
        $sql = "SELECT is_administrator from users WHERE username = '$username';";
        $result = $db->query($sql);
        if (count($result)>0) {
            $row = $result->fetchArray();
            if (($row['is_administrator'])==1) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function get_person_id($username)
    {
        $db = new SQLite3('db/taller-sierra.db');
        $sql = "SELECT person_id from users WHERE username = '$username';";
        $result = $db->query($sql);
        if (count($result)>0) {
            $row = $result->fetchArray();
            return $row['person_id'];
        }
    }


    public function get_turns($username)
    {
        /*
         * get turns of the user
         *
         *
         */
        $person_id = $this->get_person_id($username);
        $db = new SQLite3('db/taller-sierra.db');
        $sql = "SELECT turns.date, turns.status, cars.brand, cars.model, cars.patent from turns, cars WHERE turns.person_id = '$person_id' AND turns.car_id = cars.car_id;";
        $result = $db->query($sql);
        if (count($result)>0) {
            return $result;
        } else {
            return false;
        }
    }


    public function get_all_users()
    {
        /*
         * return all users from table users
         */
        $db = new SQLite3('db/taller-sierra.db');
        $sql = "SELECT * from persons;";
        $result = $db->query($sql);
        return $result;
    }

    public function get_all_turns()
    {
        /*
         * return all motkher fuckings turns
         */
        $db = new SQLite3('db/taller-sierra.db');
        $sql =<<<EOF
            SELECT
                turns.turn_id,
                turns.date, 
                turns.status, 
                cars.brand, 
                cars.model, 
                cars.patent,
                persons.name, 
                persons.surname
            FROM turns, cars, persons
            WHERE 
                turns.car_id = cars.car_id
            AND turns.person_id = persons.person_id;
EOF;
        $result = $db->query($sql);
        if (count($result)>0) {
            return $result;
        } else {
            return false;
        }
    }

    public function get_all_cars()
    {
        /*
         * return all cars from table cars
         */
        $db = new SQLite3('db/taller-sierra.db');
        $sql = "SELECT * from cars;";
        $result = $db->query($sql);
        return $result;
    }

    public function save_turn($user, $date_time, $car)
    {
        $person_id=(int)$user;
        $car_id=(int)$car;
        $db = new SQLite3('db/taller-sierra.db');
        $sql =<<<EOF
            INSERT INTO turns(person_id, car_id, date, status)
            VALUES('$person_id', $car_id,  '$date_time', 'PENDIENTE');
EOF;
        $result = $db->exec($sql);
        if (!$result) {
            echo $db->lastErrorMsg();
        } else {
            return true;
        }
    }

    public function get_turn_by_id($turn_id)
    {
        $db = new SQLite3('db/taller-sierra.db');
        $sql = "SELECT turns.turn_id,  turns.date, turns.status, cars.brand, cars.model, cars.patent from turns, cars WHERE turns.turn_id = '$turn_id' AND turns.car_id = cars.car_id;";
        $result = $db->query($sql);
        if (count($result)>0) {
            return $result;
        } else {
            return false;
        }
    }
    public function delete_turn_by_id($turn_id)
    {
        $db = new SQLite3('db/taller-sierra.db');
        $sql = "DELETE from turns WHERE turns.turn_id = '$turn_id';";
        $result = $db->exec($sql);
        if (count($result)>0) {
            return $result;
        } else {
            return false;
        }
    }
}
