<?php

class Equipos
{
    private $CONN;
    private $id;
    private $name;
    private $tecnico;
    private $imagen;
    private $create_by;
    private $campeonato;
    private $message=[];
    private $errors=array();
    private $error=array();    

    public function __construct($P_CONN) {
        $this->CONN=$P_CONN;
    }

    public function getEquiposByCreator(){

        try {
            $SQL="SELECT * FROM equipos WHERE create_by=:create_by";
            $gsent = $this->CONN->prepare($SQL);
            $gsent->bindValue(':create_by', $this->create_by, PDO::PARAM_STR);
            $gsent->setFetchMode(PDO::FETCH_ASSOC);
            $gsent->execute();
            //$gsent->debugDumpParams();
            $data=array();
            while ($row =  $gsent->fetch()){
               $data[]=$row;
            }
            return $data;

        }catch (PDOException $e) {
            $this->setErrors('101',"DataBase Error ".$e->getMessage());
        }catch (Exception $e) {
            $this->setErrors('102',"General Error ".$e->getMessage());
        }
        
    }


    public function insertEquipo(){

        try {
            $SQL="INSERT INTO equipos (
                name,
                tecnico,
                imagen,
                create_by,
                campeonato
              ) 
              VALUES
                (
                :name,
                :tecnico,
                :imagen,
                :create_by,
                :campeonato
                ) ;";
            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindParam(':name', $this->name, PDO::PARAM_STR);
            $gsent->bindParam(':tecnico', $this->tecnico, PDO::PARAM_STR);
            $gsent->bindParam(':imagen', $this->imagen, PDO::PARAM_STR);
            $gsent->bindParam(':create_by', $this->create_by, PDO::PARAM_STR);
            $gsent->bindParam(':campeonato', $this->campeonato, PDO::PARAM_STR);
            
            if($gsent->execute()){
                //$gsent->debugDumpParams();
                $cuenta = $gsent->rowCount();
                if($cuenta>0){
                    $equipment = [
                        'id' => $this->CONN->lastInsertId(),
                        'name' => $this->name,
                        'tecnico' => $this->tecnico,
                        'imagen' => $this->imagen,
                        'create_by' => $this->create_by,
                        'campeonato' => $this->campeonato
                    ];
                    $message = array(
                        'code' => '0',
                        'description' => "Equipo agregado con exito!",
                        'equipment' => $equipment
                    );
                    $this->setData($message);
                }else{
                    $this->setErrors('105','Error al agregar equipo!');
                }
            }
            else{
                $this->setErrors('105','Error al crear equipo - probablemente el nombre ya este en uso');
                return null;
            }

        }catch (PDOException $e) {
            $this->setErrors('101',"DataBase Error ".$e->getMessage());
        }catch (Exception $e) {
            $this->setErrors('102',"General Error ".$e->getMessage());
        }
        
    }

    public function updateEquipo(){

        try {

            $SQL="UPDATE 
            equipos 
          SET
            name = :name,
            tecnico = :tecnico,
            imagen = :imagen,
            create_by = :create_by,
            campeonato = :campeonato
          WHERE id = :id ;";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindValue(':id', $this->id, PDO::PARAM_INT);
            $gsent->bindParam(':name', $this->name, PDO::PARAM_STR);
            $gsent->bindParam(':tecnico', $this->tecnico, PDO::PARAM_STR);
            $gsent->bindParam(':imagen', $this->imagen, PDO::PARAM_STR);
            $gsent->bindParam(':create_by', $this->create_by, PDO::PARAM_STR);
            $gsent->bindParam(':campeonato', $this->campeonato, PDO::PARAM_STR);

            //$gsent->debugDumpParams();
            
            if($gsent->execute()){

                

                $cuenta = $gsent->rowCount();

                if($cuenta>0){

                    $this->setMessage('0',"Equipo actualizado con exito!");

                    //return  $this->CONN->lastInsertId();    

                }else{
                    $this->setErrors('105','Error al actualizar equipo!');
                }

            }
            else{
                $this->setErrors('105','Error al actualizar equipo!');

                return null;
            }

        }catch (PDOException $e) {

            $this->setErrors('101',"DataBase Error ".$e->getMessage());
            

        }catch (Exception $e) {

            $this->setErrors('102',"General Error ".$e->getMessage());
            

        }
        
    }

    public function deleteEquipo(){

        try {

            $SQL="DELETE 
            FROM
              `equipos` 
            WHERE `id` = :id ;
            
            ";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindValue(':id', $this->id, PDO::PARAM_INT);

            //$gsent->debugDumpParams();
            
            if($gsent->execute()){
                $cuenta = $gsent->rowCount();
                if($cuenta>0){
                    $this->setMessage('0',"Equipo eliminado con exito!");
                    //return  $this->CONN->lastInsertId();    
                }else{
                    $this->setErrors('105','Error al eliminar equipo!');
                }
            }
            else{
                $this->setErrors('105','Error al eliminar equipo!');
                return null;
            }
        }catch (PDOException $e) {
            $this->setErrors('101',"DataBase Error ".$e->getMessage());
        }catch (Exception $e) {

            $this->setErrors('102',"General Error ".$e->getMessage());
        }
    }

    public function getEquipoByCampeonato(){

        try {

            $SQL="SELECT * FROM equipos WHERE campeonato=:campeonato";

            $gsent = $this->CONN->prepare($SQL);
            
            $gsent->bindValue(':campeonato', $this->campeonato, PDO::PARAM_INT);

            $gsent->setFetchMode(PDO::FETCH_ASSOC);

            if($gsent->execute()){

                $data=array();

                while ($row =  $gsent->fetch()){
                   $data[]=$row;
                }
    
                return $data;

            }else{
                $this->setErrors('104','Championship not found');
            }

            //$gsent->debugDumpParams();

        }catch (PDOException $e) {
            $this->setErrors('101',"DataBase Error ".$e->getMessage());
        }catch (Exception $e) {
            $this->setErrors('102',"General Error ".$e->getMessage());
        }
        
    }

    public function getEquipos_ForId(){

        try {

            $SQL="SELECT * FROM equipos WHERE id=:id";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindValue(':id', $this->id, PDO::PARAM_INT);

            $gsent->setFetchMode(PDO::FETCH_ASSOC);

            $gsent->execute();

            //$gsent->debugDumpParams();

            $data=array();

            while ($row =  $gsent->fetch()){
               $data[]=$row;
            }

            return $data;

        }catch (PDOException $e) {
            $this->setErrors('101',"DataBase Error ".$e->getMessage());
        }catch (Exception $e) {
            $this->setErrors('102',"General Error ".$e->getMessage());
        }
        
    }
    

    public function setErrors($code,$error){

        array_push($this->error, array('code'=>$code,'description'=>$error));

        $this->message=array('errors'=> $this->error);
    }

    public function setMessage($code,$message){
        $this->message['messages'] = array('code'=>$code,'description'=>$message);
    }

    public function setData($data){
        $this->message['data'] = $data;        
    } 

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getTecnico()
	{
		return $this->tecnico;
	}

	public function setTecnico($tecnico)
	{
		$this->tecnico = $tecnico;
	}

	public function getImagen()
	{
		return $this->imagen;
	}

	public function setImagen($imagen)
	{
		$this->imagen = $imagen;
	}

	public function getCreate_by()
	{
		return $this->create_by;
	}

	public function setCreate_by($create_by)
	{
		$this->create_by = $create_by;
	}

	public function getCampeonato()
	{
		return $this->campeonato;
	}

	public function setCampeonato($campeonato)
	{
		$this->campeonato = $campeonato;
	}

	public function getMessage()
	{
		return $this->message;
	}
    public function getData()
    {
        if (isset($this->message['data'])) {
            return $this->message['data'];
        } else {
            return null;
        }
    }
}
