<?php
/**
 * Created by PhpStorm.
 * User: Sabuj
 * Date: 8/11/15
 * Time: 12:34 AM
 */

class DbConfig {
     public static function dbConnection(){
         return array(
             'connectionString' => 'mysql:host=localhost;dbname=deals',
             'emulatePrepare' => true,
             'username' => 'root',
             'password' => 'root',
             'charset' => 'utf8',
             //'tablePrefix' => 'tbl_',
         );
     }
}
