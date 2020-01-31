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

            $gsent->bindValue(':create_by', $this->create_by, PDO::PARAM_INT);

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
}
