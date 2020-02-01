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

	public function insertJugador(){

        try {

            $SQL="INSERT INTO jugadores (
				`equipo`,
				`NAME`,
				`numero`,
				`posicion`,
				`documento`,
				`telefono`,
				`f_nacimiento`,
				`imagen`
			  ) 
			  VALUES
				(
				  :equipo,
				  :name,
				  :numero,
				  :posicion,
				  :documento,
				  :telefono,
				  :f_nacimiento,
				  :image
				) ;";

            $gsent = $this->CONN->prepare($SQL);
            
            $gsent->bindValue(':equipo', $this->equipo, PDO::PARAM_INT);
            $gsent->bindParam(':name', $this->name, PDO::PARAM_STR);
            $gsent->bindValue(':numero', $this->numero, PDO::PARAM_INT);
            $gsent->bindParam(':posicion', $this->posicion, PDO::PARAM_STR);
            $gsent->bindParam(':documento', $this->documento, PDO::PARAM_STR);
            $gsent->bindParam(':telefono', $this->telefono, PDO::PARAM_STR);
            $gsent->bindParam(':f_nacimiento', $this->f_nacimiento, PDO::PARAM_STR);
			$gsent->bindParam(':image', $this->image, PDO::PARAM_STR);
			
			//$gsent->debugDumpParams();

            if($gsent->execute()){

                $cuenta = $gsent->rowCount();

                if($cuenta>0){

                    $this->setMessage('0',"Jugador agregado con exito!");

                    return  $this->CONN->lastInsertId();    

                }else{
                    $this->setErrors('105','Error al agregar jugador!');
                }

            }
            else{
                $this->setErrors('105','Error al agregar jugador');

                return null;
            }

        }catch (PDOException $e) {

            $this->setErrors('101',"DataBase Error ".$e->getMessage());
            

        }catch (Exception $e) {

            $this->setErrors('102',"General Error ".$e->getMessage());
            

        }
        
    }

    public function updateJugador(){

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

                    $this->setMessage('0',"Jugador actualizado con exito!");

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

    public function deleteJugador(){

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

                    $this->setMessage('0',"Jugador eliminado con exito!");

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

	public function getMessage()
	{
		return $this->message;
	}

}
    
