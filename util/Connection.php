<?php 

    namespace Util;

    class Connection {

        const SERVER    = 'mysql:dbname=produtos;host=localhost:3306';
        const USER      = 'root';
        const SENHA     = 'root';

        public static  $instance;   

        //Padrao Singleton
        public static function getInstance(){

            try{

                if(!isset(self::$instance)){
                    self::$instance = new \PDO(self::SERVER, self::USER ,self::SENHA);                 
                    self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                    self::$instance->setAttribute(\PDO::ATTR_ORACLE_NULLS, \PDO::NULL_EMPTY_STRING);
                    self::$instance->setAttribute(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
                }

                return self::$instance;

            }catch(PDOException $e){
                echo $e->getMessage();
            }

        }



    }