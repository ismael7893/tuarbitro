<?php
class Role
{
    private $CONN;
    private $id;
    private $title;
    private $description;
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

    public function getRole(){

        try {

            $SQL="SELECT * from roles WHERE id=:id ";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindValue(':id', $this->id, PDO::PARAM_STR);

            $gsent->setFetchMode(PDO::FETCH_ASSOC);

            $gsent->execute();

            //$gsent->debugDumpParams();

            $result = $gsent->fetch();

            if($result){
                
                return $result;

            }else{

                $this->setErrors('104','Role not found');
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

	public function getTitle()
	{
		return $this->title;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}
}