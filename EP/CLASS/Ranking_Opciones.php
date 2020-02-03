<?php
class Ranking_Opciones{

    private $CONN;
    private $id;
    private $campeonato;
    private $create_by;

    private $puntos;
    private $goles_contra;
    private $victorias;
    private $diferencia_goles;
    private $goles_a_favor;
    private $conflicto;
    private $aprovechamiento;
    private $tarjeta;
    private $wo;
    private $tarjeta_roja;
    private $tarjeta_amarilla;
    private $tarjeta_azul;
    private $sorteo;
    
    private $message=[];
    private $errors=array();
    private $error=array();

    public function __construct($P_CONN) {
        $this->CONN=$P_CONN;
    }

    public function list(){

        try {

            $SQL="SELECT * FROM ranking_opciones where campeonato = :campeonato";

            $gsent = $this->CONN->prepare($SQL);
            
            $gsent->bindParam(':campeonato', $this->campeonato, PDO::PARAM_INT);

            $gsent->setFetchMode(PDO::FETCH_ASSOC);

            $gsent->execute();

            //$gsent->debugDumpParams();

            $data=array();

            while ($row =  $gsent->fetch()){
               $data[]=$row;
            }

            $this->setData($data);
            $this->setMessage('0',"Listado con exito!");

        }catch (PDOException $e) {

            $this->setErrors('101',"DataBase Error ".$e->getMessage());


        }catch (Exception $e) {

            $this->setErrors('102',"General Error ".$e->getMessage());


        }

	}

	public function insert(){

        try {

            $SQL="INSERT INTO `ranking_opciones` (
                `campeonato`,
                `create_by`,
                `puntos`,
                `goles_contra`,
                `victorias`,
                `diferencia_goles`,
                `goles_a_favor`,
                `conflicto`,
                `aprovechamiento`,
                `tarjeta`,
                `wo`,
                `tarjeta_roja`,
                `tarjeta_amarilla`,
                `tarjeta_azul`,
                `sorteo`
              ) 
              VALUES
                (
                  :campeonato,
                  :create_by,
                  :puntos,
                  :goles_contra,
                  :victorias,
                  :diferencia_goles,
                  :goles_a_favor,
                  :conflicto,
                  :aprovechamiento,
                  :tarjeta,
                  :wo,
                  :tarjeta_roja,
                  :tarjeta_amarilla,
                  :tarjeta_azul,
                  :sorteo
                ) ;";

            $gsent = $this->CONN->prepare($SQL);
            
            $gsent->bindParam(':campeonato', $this->campeonato, PDO::PARAM_INT);
            $gsent->bindParam(':create_by', $this->create_by, PDO::PARAM_STR);
            $gsent->bindParam(':puntos', $this->puntos, PDO::PARAM_INT);
            $gsent->bindParam(':goles_contra', $this->goles_contra, PDO::PARAM_INT);
            $gsent->bindParam(':victorias', $this->victorias, PDO::PARAM_INT);
            $gsent->bindParam(':diferencia_goles', $this->diferencia_goles, PDO::PARAM_INT);
            $gsent->bindParam(':goles_a_favor', $this->goles_a_favor, PDO::PARAM_INT);
            $gsent->bindParam(':conflicto', $this->conflicto, PDO::PARAM_INT);
            $gsent->bindParam(':aprovechamiento', $this->aprovechamiento, PDO::PARAM_INT);
            $gsent->bindParam(':tarjeta', $this->tarjeta, PDO::PARAM_INT);
            $gsent->bindParam(':wo', $this->wo, PDO::PARAM_INT);
            $gsent->bindParam(':tarjeta_roja', $this->tarjeta_roja, PDO::PARAM_INT);
            $gsent->bindParam(':tarjeta_amarilla', $this->tarjeta_amarilla, PDO::PARAM_INT);
            $gsent->bindParam(':tarjeta_azul', $this->tarjeta_azul, PDO::PARAM_INT);
            $gsent->bindParam(':sorteo', $this->sorteo, PDO::PARAM_INT);
            

			//$gsent->debugDumpParams();

            if($gsent->execute()){
                $cuenta = $gsent->rowCount();
                if($cuenta>0){

                    $this->setMessage('0',"Agregado con exito!");
                    return  $this->CONN->lastInsertId();

                }else{
                    $this->setErrors('105','Error al agregar!');
                }
            }
            else{
                $this->setErrors('105','Error al agregar');
                return null;
            }
        }catch (PDOException $e) {
            $this->setErrors('101',"DataBase Error ".$e->getMessage());
        }catch (Exception $e) {
            $this->setErrors('102',"General Error ".$e->getMessage());
        }

    }

    public function update(){

        try {

          $SQL="UPDATE 
          `ranking_opciones` 
        SET
          `puntos` = :puntos,
          `goles_contra` = :goles_contra,
          `victorias` = :victorias,
          `diferencia_goles` = :diferencia_goles,
          `goles_a_favor` = :goles_a_favor,
          `conflicto` = :conflicto,
          `aprovechamiento` = :aprovechamiento,
          `tarjeta` = :tarjeta,
          `wo` = :wo,
          `tarjeta_roja` = :tarjeta_roja,
          `tarjeta_amarilla` = :tarjeta_amarilla,
          `tarjeta_azul` = :tarjeta_azul,
          `sorteo` = :sorteo 
        WHERE `id` = :id ;";

      $gsent = $this->CONN->prepare($SQL);

      //$gsent->bindParam(':id', $this->id, PDO::PARAM_INT);
      $gsent->bindParam(':id', $this->id, PDO::PARAM_INT);
      $gsent->bindParam(':puntos', $this->puntos, PDO::PARAM_INT);
      $gsent->bindParam(':goles_contra', $this->goles_contra, PDO::PARAM_INT);
      $gsent->bindParam(':victorias', $this->victorias, PDO::PARAM_INT);
      $gsent->bindParam(':diferencia_goles', $this->diferencia_goles, PDO::PARAM_INT);
      $gsent->bindParam(':goles_a_favor', $this->goles_a_favor, PDO::PARAM_INT);
      $gsent->bindParam(':conflicto', $this->conflicto, PDO::PARAM_INT);
      $gsent->bindParam(':aprovechamiento', $this->aprovechamiento, PDO::PARAM_INT);
      $gsent->bindParam(':tarjeta', $this->tarjeta, PDO::PARAM_INT);
      $gsent->bindParam(':wo', $this->wo, PDO::PARAM_INT);
      $gsent->bindParam(':tarjeta_roja', $this->tarjeta_roja, PDO::PARAM_INT);
      $gsent->bindParam(':tarjeta_amarilla', $this->tarjeta_amarilla, PDO::PARAM_INT);
      $gsent->bindParam(':tarjeta_azul', $this->tarjeta_azul, PDO::PARAM_INT);
      $gsent->bindParam(':sorteo', $this->sorteo, PDO::PARAM_INT);
      

            //$gsent->debugDumpParams();
            
            


            if($gsent->execute()){

                


                $cuenta = $gsent->rowCount();

                if($cuenta>0){

                    $this->setMessage('0',"Actualizado con exito!");

                    //return  $this->CONN->lastInsertId();

                }else{
                    $this->setErrors('105','No hubo actualizacion!');
                }

            }
            else{
                $this->setErrors('105','Error al actualizar informacion!');

                return null;
            }

        }catch (PDOException $e) {

            $this->setErrors('101',"DataBase Error ".$e->getMessage());


        }catch (Exception $e) {

            $this->setErrors('102',"General Error ".$e->getMessage());


        }

    }

    public function delete(){

        try {

            $SQL="DELETE
            FROM
              `ranking_opciones`
            WHERE `id` = :id ;";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindValue(':id', $this->id, PDO::PARAM_INT);
            //$gsent->bindValue(':create_by', $this->create_by, PDO::PARAM_STR);
            

            //$gsent->debugDumpParams();

            if($gsent->execute()){



                $cuenta = $gsent->rowCount();

                if($cuenta>0){

                    $this->setMessage('0',"Eliminado con exito!");

                    //return  $this->CONN->lastInsertId();

                }else{
                    $this->setErrors('105','Error al eliminar!');
                }

            }
            else{
                $this->setErrors('105','Error al eliminar!');

                return null;
            }

        }catch (PDOException $e) {

            $this->setErrors('101',"DataBase Error ".$e->getMessage());


        }catch (Exception $e) {

            $this->setErrors('102',"General Error ".$e->getMessage());


        }

    }

	public function getMessage()
	{
		return $this->message;
	}


	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
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



    public function getCampeonato(){
        return $this->campeonato;
    }
    public function setCampeonato($campeonato){
        $this->campeonato = $campeonato;
    }

    public function getCreateBy(){
        return $this->create_by;
    }
    public function setCreateBy($create_by){
        $this->create_by = $create_by;
    }


	public function getPuntos()
	{
		return $this->puntos;
	}

	public function setPuntos($puntos)
	{
		$this->puntos = $puntos;
	}

	public function getGoles_contra()
	{
		return $this->goles_contra;
	}

	public function setGoles_contra($goles_contra)
	{
		$this->goles_contra = $goles_contra;
	}

	public function getVictorias()
	{
		return $this->victorias;
	}

	public function setVictorias($victorias)
	{
		$this->victorias = $victorias;
	}

	public function getDiferencia_goles()
	{
		return $this->diferencia_goles;
	}

	public function setDiferencia_goles($diferencia_goles)
	{
		$this->diferencia_goles = $diferencia_goles;
	}

	public function getGoles_a_favor()
	{
		return $this->goles_a_favor;
	}

	public function setGoles_a_favor($goles_a_favor)
	{
		$this->goles_a_favor = $goles_a_favor;
	}

	public function getConflicto()
	{
		return $this->conflicto;
	}

	public function setConflicto($conflicto)
	{
		$this->conflicto = $conflicto;
	}

	public function getAprovechamiento()
	{
		return $this->aprovechamiento;
	}

	public function setAprovechamiento($aprovechamiento)
	{
		$this->aprovechamiento = $aprovechamiento;
	}

	public function getTarjeta()
	{
		return $this->tarjeta;
	}

	public function setTarjeta($tarjeta)
	{
		$this->tarjeta = $tarjeta;
	}

	public function getWo()
	{
		return $this->wo;
	}

	public function setWo($wo)
	{
		$this->wo = $wo;
	}

	public function getTarjeta_roja()
	{
		return $this->tarjeta_roja;
	}

	public function setTarjeta_roja($tarjeta_roja)
	{
		$this->tarjeta_roja = $tarjeta_roja;
	}

	public function getTarjeta_amarilla()
	{
		return $this->tarjeta_amarilla;
	}

	public function setTarjeta_amarilla($tarjeta_amarilla)
	{
		$this->tarjeta_amarilla = $tarjeta_amarilla;
	}

	public function getTarjeta_azul()
	{
		return $this->tarjeta_azul;
	}

	public function setTarjeta_azul($tarjeta_azul)
	{
		$this->tarjeta_azul = $tarjeta_azul;
	}

	public function getSorteo()
	{
		return $this->sorteo;
	}

	public function setSorteo($sorteo)
	{
		$this->sorteo = $sorteo;
	}
}