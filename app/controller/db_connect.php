
        <?php


        class siteDB{

          const DB_USER ="root";
          const DB_PASS = "";
          private  $pdo_object;
          private $dsn;


          public function __construct(){
              $this->dsn ="mysql:host=localhost;dbname=programming_services;charset=utf8";
              $this->pdo_object= new PDO($this->dsn,siteDB::DB_USER,siteDB::DB_PASS);
              $this->pdo_object->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
              $this->pdo_object->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              $this->pdo_object->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
              $this->pdo_object->exec("SET NAMES utf8");

          }


          public function insertToTabel($sql,$args=array()){
              $this->pdo_object->prepare($sql)->execute($args);


          }

            public function getData($sql,$args=array())
            {
             $statement = $this->pdo_object->prepare($sql);

             
             $statement ->execute($args);
                return $statement;

//             return $statement->fetchAll();
            }
            
     
            public function get_one_art($sql,$args=array())
            {
                $statement = $this->pdo_object->prepare($sql);
                $statement ->execute($args);
                return $statement;

//             return $statement->fetchAll();
            }


        }

        ?>