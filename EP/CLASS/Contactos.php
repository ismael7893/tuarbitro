<?php
class Contacto
{
    private $CONN;
    private $id;
    private $campeonato;
    private $numero;
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

    public function insertContacto(){

        try {

            $SQL="INSERT INTO contacto 
            VALUES
              (null,:campeonato, :pnumber) ;
            ";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindParam(':campeonato', $this->campeonato, PDO::PARAM_INT);
            $gsent->bindParam(':pnumber', $this->numero, PDO::PARAM_STR);
            
            //$gsent->debugDumpParams();

            if($gsent->execute()){

                $this->setMessage('0',"Contacto creado con exito!");

            }else{
                $this->setErrors('105','Error al agregar un contacto!');

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

	public function getCampeonato()
	{
		return $this->campeonato;
	}

	public function setCampeonato($campeonato)
	{
		$this->campeonato = $campeonato;
	}

	public function getNumero()
	{
		return $this->numero;
	}

	public function setNumero($numero)
	{
		$this->numero = $numero;
	}

	public function getMessage()
	{
		return $this->message;
	}
}
    
