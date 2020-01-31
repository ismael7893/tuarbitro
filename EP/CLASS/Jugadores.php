<?php
class Jugadores
{
    private $CONN;
    private $id;
    private $equipo;
    private $name;
    private $numero;
    private $posicion;
    private $documento;
    private $telefono;
    private $f_nacimiento;
    private $imagen;
    private $message=[];
    private $errors=array();
    private $error=array();    

    public function __construct($P_CONN) {
        $this->CONN=$P_CONN;
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

    public function getData(){
        if(isset($this->message['data'])){
            return $this->message['data']; 
        }else{
            return null;
        }
            
               
    }

    public function getJugadoresByTeam(){

        try {

            $SQL="SELECT * FROM jugadores WHERE equipo = :equipo;";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindValue(':equipo', $this->equipo, PDO::PARAM_INT);

            $gsent->setFetchMode(PDO::FETCH_ASSOC);

            $gsent->execute();

            //$gsent->debugDumpParams();

            $gsent->execute();

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

  


	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getEquipo()
	{
		return $this->equipo;
	}

	public function setEquipo($equipo)
	{
		$this->equipo = $equipo;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getNumero()
	{
		return $this->numero;
	}

	public function setNumero($numero)
	{
		$this->numero = $numero;
	}

	public function getPosicion()
	{
		return $this->posicion;
	}

	public function setPosicion($posicion)
	{
		$this->posicion = $posicion;
	}

	public function getDocumento()
	{
		return $this->documento;
	}

	public function setDocumento($documento)
	{
		$this->documento = $documento;
	}

	public function getTelefono()
	{
		return $this->telefono;
	}

	public function setTelefono($telefono)
	{
		$this->telefono = $telefono;
	}

	public function getF_nacimiento()
	{
		return $this->f_nacimiento;
	}

	public function setF_nacimiento($f_nacimiento)
	{
		$this->f_nacimiento = $f_nacimiento;
	}

	public function getImagen()
	{
		return $this->imagen;
	}

	public function setImagen($imagen)
	{
		$this->imagen = $imagen;
	}
}
    
