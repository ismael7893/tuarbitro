<?php
class Grupos{

    private $CONN;
    private $id;
    private $campeonato;
    private $create_by;
    private $cantidad;
    private $message=[];
    private $errors=array();
    private $error=array();

    public function __construct($P_CONN) {
        $this->CONN=$P_CONN;
    }

    public function listar(){

        try {

            $SQL="SELECT * FROM grupos where campeonato = :campeonato";

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

            $SQL="INSERT INTO `grupos` (
  `campeonato`,
  `create_by`,
  `cantidad`
)
VALUES
  (
    :campeonato,
    :create_by,
    0
  ) ;";

            $gsent = $this->CONN->prepare($SQL);
             
            $gsent->bindParam(':campeonato', $this->campeonato, PDO::PARAM_INT);
            $gsent->bindParam(':create_by', $this->create_by, PDO::PARAM_STR);
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
`grupos`
SET
`cantidad` = :cantidad
WHERE `id` = :id ;";

      $gsent = $this->CONN->prepare($SQL);

      //$gsent->bindParam(':id', $this->id, PDO::PARAM_INT);
      $gsent->bindParam(':id', $this->id, PDO::PARAM_INT);
      $gsent->bindParam(':cantidad', $this->cantidad, PDO::PARAM_INT);

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
              `grupos`
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

	public function getCantidad()
	{
		return $this->cantidad;
	}

	public function setCantidad($cantidad)
	{
		$this->cantidad = $cantidad;
	}
}