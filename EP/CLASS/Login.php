<?php
class Login
{
    private $CONN;
    private $document;
    private $username;
    private $password;
    private $message=[];
    private $errors=array();
    private $error=array();    

    public function __construct($P_CONN) {
        $this->CONN=$P_CONN;
    }

    public function setUsername($username){
        $this->username=$username;
    }

    public function setDocument($document){
        $this->document=$document;
    }

    public function setPassword($password){
        $this->password=$password;
    }

    public function getMessage(){
        return $this->message;
    }

    public function getDocument(){
        return $this->document;
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

    public function login(){

        try {

            $SQL="SELECT * from cuenta WHERE username=:username and password=:password";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindValue(':username', $this->username, PDO::PARAM_STR);

            $gsent->bindValue(':password', $this->password, PDO::PARAM_STR);

            $gsent->setFetchMode(PDO::FETCH_ASSOC);

            $gsent->execute();

            //$gsent->debugDumpParams();

            
            $user = $gsent->fetch();


            if($user){

                $this->setMessage('0',"Welcome {$user['username']}");

                unset($user['PASSWORD']);

                $this->setData($user);
                

            }else{

                $this->setErrors('105','Usuario/Contraseña inválido');
            }

        }catch (PDOException $e) {

            $this->setErrors('101',"DataBase Error ".$e->getMessage());
            

        }catch (Exception $e) {

            $this->setErrors('102',"General Error ".$e->getMessage());
            

        }
        
    }

    public function getStudent($document){

        try {

            $SQL="SELECT * from students WHERE document=:document ";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindValue(':document', $document, PDO::PARAM_STR);

            $gsent->setFetchMode(PDO::FETCH_ASSOC);

            $gsent->execute();

            //$gsent->debugDumpParams();

            $student = $gsent->fetch();

            if($student){

                return $student;

            }else{

                $this->setErrors('104','Student not found!');
            }    

        }catch (PDOException $e) {

            $this->setErrors('101',"DataBase Error ".$e->getMessage());
            

        }catch (Exception $e) {

            $this->setErrors('102',"General Error ".$e->getMessage());
            

        }

        
    }

    public function listPeople(){
        $stmt = $this->CONN->prepare("SELECT * FROM registros");
        // Especificamos el fetch mode antes de llamar a fetch()
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        // Ejecutamos
        $stmt->execute();
        // Mostramos los resultados
        while ($row = $stmt->fetch()){
            echo "<br/>";
            echo "<div>";
            
            echo "DNI: {$row["document"]} ";
            echo "</div>";
            echo "<div>";
            echo "Nombre: {$row["nom"]} ";
            echo "</div>";
            echo "<div>";
            echo "Correo: {$row["correo"]} ";
            echo "</div>";
        }
    }

}
    
