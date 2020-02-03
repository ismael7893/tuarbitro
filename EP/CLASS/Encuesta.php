<?php
class Encuesta{

    private $CONN;
    private $id;
    private $campeonato;
    private $create_by;
    private $pregunta;
    private $publico;
    private $v_abierta;
    private $showresult;
    private $one_or_many;
    private $message=[];
    private $errors=array();
    private $error=array();

    public function __construct($P_CONN) {
        $this->CONN=$P_CONN;
    }

    public function list(){

        try {

            $SQL="SELECT * FROM encuestas where campeonato = :campeonato";

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
    
    public function esModerador(){

        try {

            $SQL="SELECT * FROM moderadores where campeonato = :campeonato ";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindParam(':campeonato', $this->campeonato, PDO::PARAM_INT);
            
            $gsent->setFetchMode(PDO::FETCH_ASSOC);
            
            $gsent->execute();

            //$gsent->debugDumpParams();

            $gsent->execute();

            $response = $gsent->fetch();

            if($response){
                
               $this->setMessage('0',"Tiene acceso a editar este campeonato!");
               return true;
            }else{
                $this->setMessage('2',"Usted no tiene acceso a este campeonato!");
                return false;
            }
            


        }catch (PDOException $e) {

            $this->setErrors('101',"DataBase Error ".$e->getMessage());


        }catch (Exception $e) {

            $this->setErrors('102',"General Error ".$e->getMessage());


        }

	}

	public function insert(){

        try {

            $SQL="INSERT INTO `encuestas` (
                `campeonato`,
                `create_by`,
                `pregunta`,
                `publico`,
                `v_abierta`,
                `showresult`,
                `one_or_many`
              ) 
              VALUES
                (
                  :campeonato,
                  :create_by,
                  :pregunta,
                  :publico,
                  :v_abierta,
                  :showresult,
                  :one_or_many
                ) ;";

            $gsent = $this->CONN->prepare($SQL);
             
            $gsent->bindParam(':campeonato', $this->campeonato, PDO::PARAM_INT);
            $gsent->bindParam(':create_by', $this->create_by, PDO::PARAM_STR);
            $gsent->bindParam(':pregunta', $this->pregunta, PDO::PARAM_STR);
            $gsent->bindParam(':publico', $this->publico, PDO::PARAM_BOOL );
            $gsent->bindParam(':v_abierta', $this->v_abierta, PDO::PARAM_BOOL );
            $gsent->bindParam(':showresult', $this->showresult, PDO::PARAM_BOOL );
            $gsent->bindParam(':one_or_many', $this->one_or_many, PDO::PARAM_BOOL );
            //$gsent->bindParam(':cantidad', $this->cantidad, PDO::PARAM_INT);

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
`encuestas`
SET
`pregunta` = :pregunta,
`publico` = :publico,
`v_abierta` = :v_abierta,
`showresult` = :showresult,
`one_or_many` = :one_or_many
WHERE `id` = :id ;";

      $gsent = $this->CONN->prepare($SQL);

      //$gsent->bindParam(':id', $this->id, PDO::PARAM_INT);
      $gsent->bindParam(':id', $this->id, PDO::PARAM_INT);
      $gsent->bindParam(':pregunta', $this->pregunta, PDO::PARAM_STR);
      $gsent->bindParam(':publico', $this->publico, PDO::PARAM_BOOL );
      $gsent->bindParam(':v_abierta', $this->v_abierta, PDO::PARAM_BOOL );
      $gsent->bindParam(':showresult', $this->showresult, PDO::PARAM_BOOL );
      $gsent->bindParam(':one_or_many', $this->one_or_many, PDO::PARAM_BOOL );

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
              `encuestas`
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



	public function getPregunta()
	{
		return $this->pregunta;
	}

	public function setPregunta($pregunta)
	{
		$this->pregunta = $pregunta;
	}

	public function getPublico()
	{
		return $this->publico;
	}

	public function setPublico($publico)
	{
		$this->publico = $publico;
	}

	public function getV_abierta()
	{
		return $this->v_abierta;
	}

	public function setV_abierta($v_abierta)
	{
		$this->v_abierta = $v_abierta;
	}

	public function getShowresult()
	{
		return $this->showresult;
	}

	public function setShowresult($showresult)
	{
		$this->showresult = $showresult;
	}

	public function getOne_or_many()
	{
		return $this->one_or_many;
	}

	public function setOne_or_many($one_or_many)
	{
		$this->one_or_many = $one_or_many;
	}
}