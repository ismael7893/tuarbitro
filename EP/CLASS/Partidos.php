<?php

class Partidos
{
    private $CONN;
    private $id;
    private $campeonato;
    private $equipo1_id;
    private $equipo2_id;
    private $equipo1_goles;
    private $equipo2_goles;
    private $estado;
    private $fecha;
    private $hora;
    private $message=[];
    private $errors=array();
    private $error=array();    

    public function __construct($P_CONN) {
        $this->CONN=$P_CONN;
    }

    public function getPartidosByCreator(){

        try {

            $SQL="SELECT * FROM partidos WHERE create_by=:create_by";

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

    public function getPartidosPorCampeonatos(){

        try {

            $SQL="SELECT * FROM partidos WHERE create_by=:create_by";

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

    public function getPartidos_ForId(){

        try {

            $SQL="SELECT * FROM partidos WHERE id=:id";

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


	public function getCampeonato()
	{
		return $this->campeonato;
	}

	public function setCampeonato($campeonato)
	{
		$this->campeonato = $campeonato;
	}

	public function getEquipo1_id()
	{
		return $this->equipo1_id;
	}

	public function setEquipo1_id($equipo1_id)
	{
		$this->equipo1_id = $equipo1_id;
	}

	public function getEquipo2_id()
	{
		return $this->equipo2_id;
	}

	public function setEquipo2_id($equipo2_id)
	{
		$this->equipo2_id = $equipo2_id;
	}

	public function getEquipo1_goles()
	{
		return $this->equipo1_goles;
	}

	public function setEquipo1_goles($equipo1_goles)
	{
		$this->equipo1_goles = $equipo1_goles;
	}

	public function getEquipo2_goles()
	{
		return $this->equipo2_goles;
	}

	public function setEquipo2_goles($equipo2_goles)
	{
		$this->equipo2_goles = $equipo2_goles;
	}

	public function getEstado()
	{
		return $this->estado;
	}

	public function setEstado($estado)
	{
		$this->estado = $estado;
	}

	public function getFecha()
	{
		return $this->fecha;
	}

	public function setFecha($fecha)
	{
		$this->fecha = $fecha;
	}

	public function getHora()
	{
		return $this->hora;
	}

	public function setHora($hora)
	{
		$this->hora = $hora;
	}
}
