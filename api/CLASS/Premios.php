<?php


class Premios
{
    private $CONN;
    private $id;
    private $campenato;
    private $title;
    private $description;
    private $errors=array();
    private $error=array();    

    public function __construct($p_CONN) {
        $this->CONN=$p_CONN;
    }

    

    public function getPremiossForId(){

        try {

            $SQL="SELECT * from premios WHERE campeonato=:campeonato";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindValue(':campeonato', $this->campenato, PDO::PARAM_INT);

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


    public function deletePremiossForId(){

        
        try {

            $SQL="DELETE FROM campeonatos WHERE id=:id";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindValue(':id', $this->id, PDO::PARAM_INT);

            $gsent->execute();

            //$gsent->debugDumpParams();

            
        }catch (PDOException $e) {

            $this->setErrors('101',"DataBase Error ".$e->getMessage());
            

        }catch (Exception $e) {

            $this->setErrors('102',"General Error ".$e->getMessage());
            

        }
        
    }

    public function insertPremios(){

        try {

            $SQL="INSERT INTO campeonatos (
                nombre,
                estadio,
                organization,
                seguidores,
                description,
                f_inicio,
                f_fin,
                logo,
                foto_perfil
              ) 
              VALUES
                (
                  :nombre,
                  :estadio,
                  :organization,
                  :seguidores,
                  :description,
                  :f_inicio,
                  :f_fin,
                  :logo,
                  :foto_perfil
                ) ;";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
            $gsent->bindParam(':estadio', $this->estadio, PDO::PARAM_STR);
            $gsent->bindParam(':organization', $this->organization, PDO::PARAM_STR);
            $gsent->bindParam(':seguidores', $this->seguidores, PDO::PARAM_INT);
            $gsent->bindParam(':description', $this->description, PDO::PARAM_STR);
            $gsent->bindParam(':f_inicio', $this->f_inicio, PDO::PARAM_STR);
            $gsent->bindParam(':f_fin', $this->f_fin, PDO::PARAM_STR);
            $gsent->bindParam(':logo', $this->logo, PDO::PARAM_STR);
            $gsent->bindParam(':foto_perfil', $this->foto_perfil, PDO::PARAM_STR);

            $gsent->execute();

            //$gsent->debugDumpParams();


        }catch (PDOException $e) {

            $this->setErrors('101',"DataBase Error ".$e->getMessage());
            

        }catch (Exception $e) {

            $this->setErrors('102',"General Error ".$e->getMessage());
            

        }
        
    }

    public function getContact(){

        try {

            $SQL="SELECT * from contacto WHERE campeonato=:campeonato";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindValue(':campeonato', $this->id, PDO::PARAM_INT);

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

    public function getCategorias(){

        try {

            $SQL="SELECT * from categorias WHERE campeonato=:campeonato ";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindValue(':campeonato', $this->id, PDO::PARAM_INT);

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

	public function getSeguidores(){
		return $this->seguidores;
	}

	public function setSeguidores($seguidores){
		$this->seguidores = $seguidores;
	}

	public function getCampenato()
	{
		return $this->campenato;
	}

	public function setCampenato($campenato)
	{
		$this->campenato = $campenato;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}
}
    
