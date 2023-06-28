<?php
    namespace Models;
    class Campers{
        protected static $conn;
        protected static $columnsTbl=['idCamper','nombreCamper','apellidoCamper','fechaNac','idReg'];
        
        private $idCamper;
        private $nombreCamper;
        private $apellidoCamper;
        private $fechaNac;
        private $idReg;
        
       
        public function __construct($args = []){
            $this->nombreCamper = $args['nombreCamper'] ?? '';
            $this->idCamper = $args['idCamper'] ?? '';
            $this->apellidoCamper = $args['apellidoCamper'] ?? '';
            $this->apellidoCamper = $args['fechaNac'] ?? '';
            $this->apellidoCamper = $args['idReg'] ?? '';
        }
        public function saveData($data){
            $delimiter = ":";
            $valCols = $delimiter . join(',:',array_keys($data));
            $cols = join(',',array_keys($data));
            $sql = "INSERT INTO campers ($cols) VALUES ($valCols)";
            $stmt= self::$conn->prepare($sql);
            $stmt->execute($data);
        }
        public function loadAllData(){
            $sql = "SELECT * FROM campers";
            $stmt= self::$conn->prepare($sql);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $campers= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $campers;
        }


        public function loadDataByIdSalon($id){
            
            $sql = "SELECT * FROM salones WHERE id_salon=:id ";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $salon= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $salon;
        }

        public function loadAllDataPaises(){
            $sql = "SELECT * FROM pais";
            $stmt= self::$conn->prepare($sql);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $nivel= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $nivel;
        }
        public function loadDataDepById($id){
            $sql = "SELECT * FROM departamento WHERE idDep=:id ";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $dep= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $dep;
        }

        public function loadDataPaisById($id){
            $sql = "SELECT * FROM pais WHERE idPais=:id ";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $pais= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $pais;
        }

        public function loadDataByIdRegiones($id){
            
            $sql = "SELECT * FROM departamento WHERE idPais=:id ";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $regiones= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $json_regiones=json_encode($regiones);
            echo $json_regiones;
        }

        public function loadDataByIdCiudades($id){
            
            $sql = "SELECT * FROM region WHERE idDep=:id ";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $ciudades= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $json_ciudades=json_encode($ciudades);
            echo $json_ciudades;
        }

        public function loadDataByIdCiudad($id){
            
            $sql = "SELECT * FROM region WHERE idReg=:id ";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $ciudad= $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $ciudad;
        }


        public function editData($data){
            $sql = "UPDATE `campers` SET `nombreCamper`=:nombreCamper , `apellidoCamper`=:apellidoCamper, `fechaNac`=:fechaNac, `idReg`=:idReg WHERE `idCamper`=:idCamper";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':nombreCamper', $data['nombreCamper'], \PDO::PARAM_STR); 
            $stmt->bindParam(':apellidoCamper', $data['apellidoCamper'], \PDO::PARAM_STR); 
            $stmt->bindParam(':idCamper', $data['idCamper'], \PDO::PARAM_STR); 
            $stmt->bindParam(':fechaNac', $data['fechaNac'], \PDO::PARAM_STR); 
            $stmt->bindParam(':idReg', $data['idReg'], \PDO::PARAM_INT); 
            $stmt->execute();
        }

        public function deleteData($id){
            $sql = "DELETE FROM campers where idCamper = :id";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

        public static function setConn($connBd){
            self::$conn = $connBd;
        }
    }
?>