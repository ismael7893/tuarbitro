<?php
class Campeonato_Opciones{

    private $CONN;
    private $id;
    private $campeonato;
    private $create_by;
    private $points_victory;
    private $points_draw;
    private $suspension_auto;
    private $suspension_auto2;
    private $message=[];
    private $errors=array();
    private $error=array();

    public function __construct($P_CONN) {
        $this->CONN=$P_CONN;
    }

    public function list(){

        try {

            $SQL="SELECT * FROM campeonato_opciones where campeonato = :campeonato";

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

            $SQL="INSERT INTO `campeonato_opciones` (
                `campeonato`,
                `create_by`,
                `points_victory`,
                `points_draw`,
                `suspension_auto`,
                `suspension_auto2`
              ) 
              VALUES
                (
                  :campeonato,
                  :create_by,
                  :points_victory,
                  :points_draw,
                  :suspension_auto,
                  :suspension_auto2
                ) ;";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindParam(':campeonato', $this->campeonato, PDO::PARAM_INT);
            $gsent->bindParam(':create_by', $this->create_by, PDO::PARAM_STR);
            $gsent->bindParam(':points_victory', $this->points_victory, PDO::PARAM_INT);
            $gsent->bindParam(':points_draw', $this->points_draw, PDO::PARAM_INT);
            $gsent->bindParam(':suspension_auto', $this->suspension_auto, PDO::PARAM_INT);
            $gsent->bindParam(':suspension_auto2', $this->suspension_auto2, PDO::PARAM_INT);
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
          `campeonato_opciones` 
        SET          
          `points_victory` = :points_victory,
          `points_draw` = :points_draw,
          `suspension_auto` = :suspension_auto,
          `suspension_auto2` = :suspension_auto2
        WHERE `id` = :id ;";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindParam(':id', $this->id, PDO::PARAM_INT);
            $gsent->bindParam(':points_victory', $this->points_victory, PDO::PARAM_INT);
            $gsent->bindParam(':points_draw', $this->points_draw, PDO::PARAM_INT);
            $gsent->bindParam(':suspension_auto', $this->suspension_auto, PDO::PARAM_INT);
            $gsent->bindParam(':suspension_auto2', $this->suspension_auto2, PDO::PARAM_INT);

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
              `campeonato_opciones`
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

	public function getPoints_draw()
	{
		return $this->points_draw;
	}

	public function setPoints_draw($points_draw)
	{
		$this->points_draw = $points_draw;
	}

	public function getPoints_victory()
	{
		return $this->points_victory;
	}

	public function setPoints_victory($points_victory)
	{
		$this->points_victory = $points_victory;
	}

	public function getSuspension_auto()
	{
		return $this->suspension_auto;
	}

	public function setSuspension_auto($suspension_auto)
	{
		$this->suspension_auto = $suspension_auto;
	}

	public function getSuspension_auto2()
	{
		return $this->suspension_auto2;
	}

	public function setSuspension_auto2($suspension_auto2)
	{
		$this->suspension_auto2 = $suspension_auto2;
	}
}