<?php
class Noticia_Like
{
    private $CONN;
    private $id;
    private $user;
    private $noticia;
    private $message=[];
    private $errors=array();
    private $error=array();    

    public function __construct($P_CONN) {
        $this->CONN=$P_CONN;
    }

    public function getNoticiaLike(){

        try {

            $SQL="SELECT * FROM noticias_likes WHERE user = :user and noticia = :noticia;";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindValue(':user', $this->user, PDO::PARAM_STR);
            $gsent->bindValue(':noticia', $this->noticia, PDO::PARAM_INT);
            
            $gsent->setFetchMode(PDO::FETCH_ASSOC);

            $gsent->execute();

            //$gsent->debugDumpParams();

          
            $student = $gsent->fetch();

            if($student){
                return false;
            }else{

                return true;

            }    

        }catch (PDOException $e) {

            $this->setErrors('101',"DataBase Error ".$e->getMessage());
            

        }catch (Exception $e) {

            $this->setErrors('102',"General Error ".$e->getMessage());
            

        }

    }

	public function insertNoticiaLike(){

        try {

            $SQL="INSERT  INTO `noticias_likes` VALUES 
            (NULL,:noticia,:user);";

            $gsent = $this->CONN->prepare($SQL);
		
            $gsent->bindParam(':noticia', $this->noticia, PDO::PARAM_INT);
            $gsent->bindParam(':user', $this->user, PDO::PARAM_STR);
			
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

    public function updateNoticia(){

        try {

            $SQL="UPDATE 
            `noticias` 
          SET
            `campeonato` = :campeonato,
            `fecha` = :fecha,
            `title` = :title,
            `directorio` = :directorio
          WHERE `id` = :id ;";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindParam(':id', $this->id, PDO::PARAM_INT);
            $gsent->bindParam(':campeonato', $this->campeonato, PDO::PARAM_INT);
            $gsent->bindParam(':fecha', $this->fecha, PDO::PARAM_STR);
            $gsent->bindParam(':title', $this->title, PDO::PARAM_STR);
            $gsent->bindParam(':directorio', $this->directorio, PDO::PARAM_STR);
			
            //$gsent->debugDumpParams();
            if($gsent->execute()){

                $cuenta = $gsent->rowCount();

                if($cuenta>0){

                    $this->setMessage('0',"Actualizado con exito!");

                    //return  $this->CONN->lastInsertId();    

                }else{
                    $this->setErrors('105','Error al actualizar informacion !');
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

    public function changeLikeNoticia(){

        try {

            $SQL="UPDATE 
			noticias 
		  SET 
            likes = likes+1
		  WHERE id = :id ;";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindParam(':id', $this->id, PDO::PARAM_INT);
			
            //$gsent->debugDumpParams();
            if($gsent->execute()){

                $cuenta = $gsent->rowCount();

                if($cuenta>0){

                    $this->setMessage('0',"Actualizado con exito!");

                    //return  $this->CONN->lastInsertId();    

                }else{
                    $this->setErrors('105','Error al actualizar informacion!');
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

    public function deleteNoticia(){

        try {

            $SQL="DELETE 
            FROM
              `noticias` 
            WHERE `id` = :id ;";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindValue(':id', $this->id, PDO::PARAM_INT);

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

	public function getUser()
	{
		return $this->user;
	}

	public function setUser($user)
	{
		$this->user = $user;
	}

	public function getNoticia()
	{
		return $this->noticia;
	}

	public function setNoticia($noticia)
	{
		$this->noticia = $noticia;
	}
}
    
