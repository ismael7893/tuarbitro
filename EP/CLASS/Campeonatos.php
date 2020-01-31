<?php

class Campeonato
{
    private $CONN;
    private $id;
    private $create_by;
    private $nombre;
    private $estadio;
    private $organization;
    private $seguidores;
    private $description;
    private $f_inicio;
    private $f_fin;
    private $logo;
    private $foto_perfil;
    private $ubicacion;
    private $estado;
    private $tipe;
    private $sport;

    private $message=[];
    private $errors=array();
    private $error=array();    

    public function __construct($p_CONN) {
        $this->CONN=$p_CONN;
    }

    

    public function getCampeonatosForId(){

        try {

            $SQL="SELECT * from campeonatos WHERE id=:id";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindValue(':id', $this->id, PDO::PARAM_INT);

            $gsent->setFetchMode(PDO::FETCH_ASSOC);

            $gsent->execute();

            //$gsent->debugDumpParams();

            $result = $gsent->fetch();

            if($result){
                
                return $result;

            }else{

                $this->setErrors('104','Championship not found');
            }

        }catch (PDOException $e) {

            $this->setErrors('101',"DataBase Error ".$e->getMessage());
            

        }catch (Exception $e) {

            $this->setErrors('102',"General Error ".$e->getMessage());
            

        }
        
    }

    public function getCampeonatosCreadosPorUsuario(){

        try {

            $SQL="SELECT * from campeonatos WHERE create_by=:create_by";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindValue(':create_by', $this->create_by, PDO::PARAM_STR);

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

    public function getCampeonatos(){

        try {

            $SQL="SELECT * from campeonatos ";

            $gsent = $this->CONN->prepare($SQL);

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

    

    public function updateCampeonatosForId(){

        try {

            $SQL="UPDATE 
            campeonatos 
        SET
            nombre = :nombre,
            estadio = :estadio,
            organization = :organization,
            seguidores = :seguidores,
            description = :description,
            f_inicio = :f_inicio,
            f_fin = :f_fin,
            logo = :logo,
            foto_perfil = :foto_perfil 
        WHERE id = :id;";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindParam(':id', $this->id, PDO::PARAM_INT);
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

    public function deleteCampeonatosForId(){

        
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

    public function insertCampeonato(){

        try {

            $SQL="INSERT INTO campeonatos (
                create_by,
                nombre,
                estadio,
                organization,
                seguidores,
                description,
                tipe,
                sport,
                f_inicio,
                f_fin,
                logo,
                foto_perfil,
                ubicacion,
                estado
              ) 
              VALUES
                (
                :create_by,
                :nombre,
                :estadio,
                :organization,
                :seguidores,
                :description,
                :tipe,
                :sport,
                :f_inicio,
                :f_fin,
                :logo,
                :foto_perfil,
                :ubicacion,
                :estado
                ) ;";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
            $gsent->bindParam(':create_by', $this->create_by, PDO::PARAM_STR);
            $gsent->bindParam(':estadio', $this->estadio, PDO::PARAM_STR);
            $gsent->bindParam(':organization', $this->organization, PDO::PARAM_STR);
            $gsent->bindParam(':seguidores', $this->seguidores, PDO::PARAM_INT);
            $gsent->bindParam(':description', $this->description, PDO::PARAM_STR);
            $gsent->bindParam(':tipe', $this->tipe, PDO::PARAM_STR);
            $gsent->bindParam(':sport', $this->sport, PDO::PARAM_STR);
            $gsent->bindParam(':f_inicio', $this->f_inicio, PDO::PARAM_STR);
            $gsent->bindParam(':f_fin', $this->f_fin, PDO::PARAM_STR);
            $gsent->bindParam(':logo', $this->logo, PDO::PARAM_STR);
            $gsent->bindParam(':foto_perfil', $this->foto_perfil, PDO::PARAM_STR);
            $gsent->bindParam(':ubicacion', $this->ubicacion, PDO::PARAM_STR);
            $gsent->bindParam(':estado', $this->estado, PDO::PARAM_STR);

            if($gsent->execute()){
                //$gsent->debugDumpParams();
                $this->setMessage('0',"Campeonato creado con exito!");

                return  $this->CONN->lastInsertId();    



            }
            else{
                $this->setErrors('105','No se pudo crear el campeonato');

                return null;
            }

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

    public function autoGenerateCampeonato(){

        
        require 'Equipos.php';
        try {

            $lastIdCampeonato = $this->insertCampeonato();



            if(isset($lastIdCampeonato)){

                

                $CLASS_PEOPLE=new Equipos($this->CONN);
            
                $CLASS_PEOPLE->setCreate_by($this->create_by);
    
                $this->setId($lastIdCampeonato);
                
                $data = $CLASS_PEOPLE->getEquiposByCreator();
    
                
                
    
                $max = count($data);
                $done = false;
                $numbers;
                while(!$done){
                    $numbers = range(0, $max-1);
                    shuffle($numbers);
                    $done = true;
                    foreach($numbers as $key => $val){
                        if($key == $val){
                            $done = false;
                            break;
                        }
                    }
                }
                $team1 = "";
                $team2 = "";
                $partidos_creados = 0;
    
                while ($max > 0) {
    
                    $team1 = $data[$numbers[$max-1]]['name'];
                    
                    if(isset($numbers[$max-2])){
                    
                        $team2 = $data[$numbers[$max-2]]['name'];
                    }
                    else{
                        $team2 = "";
                        
                    }
                    $this->auto_CrearPartidos($team1,$team2);
                    $partidos_creados++;
                    $max=$max-2;
                
                }
    
                $ultimo_registro = $this->getCampeonatosForId();
                $ultimo_registro['partidos'] = $partidos_creados;
    
                $this->setData($ultimo_registro);
    
            }



            
            

        }catch (PDOException $e) {
            $this->setErrors('101',"DataBase Error ".$e->getMessage());
        }catch (Exception $e) {
            $this->setErrors('102',"General Error ".$e->getMessage());
        }
        
    }

    public function auto_CrearPartidos($team1, $team2){

        try {
            date_default_timezone_set('America/Lima');

            $fecha=date('Y-m-d');

            $hora=date('h:i:s');

            //echo "<p>INSERT  INTO `partidos` VALUES (NULL,$this->id,$team1,$team2,0,0,$fecha,$hora)</p>";

            $SQL="INSERT INTO partidos VALUES (NULL,:idCampeonato,:team1,:team2,0,0,:fecha,:hora);";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindValue(':idCampeonato', $this->id, PDO::PARAM_INT);
            $gsent->bindParam(':team1', $team1, PDO::PARAM_STR);
            $gsent->bindParam(':team2', $team2, PDO::PARAM_STR);
            $gsent->bindParam(':fecha', $fecha, PDO::PARAM_STR);
            $gsent->bindParam(':hora', $hora, PDO::PARAM_STR);

            $gsent->setFetchMode(PDO::FETCH_ASSOC);

            //$gsent->debugDumpParams();

            return $gsent->execute();


        }catch (PDOException $e) {
            $this->setErrors('101',"DataBase Error ".$e->getMessage());
        }catch (Exception $e) {
            $this->setErrors('102',"General Error ".$e->getMessage());
        }
        
    }

    public function seguirCampeonato($idUser){

        try {

            $SQL="INSERT INTO campeonato_seguimiento VALUES (:idUser,:campeonato);";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindValue(':campeonato', $this->id, PDO::PARAM_INT);

            $gsent->bindValue(':idUser', $idUser, PDO::PARAM_INT);

            $gsent->setFetchMode(PDO::FETCH_ASSOC);

            $gsent->execute();

            $cuenta = $gsent->rowCount();

            if($cuenta>0)return true;
            else return false;

            //$gsent->debugDumpParams();

        }catch (PDOException $e) {
            $this->setErrors('101',"DataBase Error ".$e->getMessage());
        }catch (Exception $e) {
            $this->setErrors('102',"General Error ".$e->getMessage());
        }
        
    }

    public function dejarDeSeguirCampeonato($idUser){

        try {

            
            $SQL="DELETE FROM campeonato_seguimiento WHERE campeonato=:campeonato AND id_user=:id_user ;";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindValue(':campeonato', $this->id, PDO::PARAM_INT);

            $gsent->bindValue(':id_user', $idUser, PDO::PARAM_INT);

            $gsent->setFetchMode(PDO::FETCH_ASSOC);

            $gsent->execute();

            $cuenta = $gsent->rowCount();

            if($cuenta>0)return true;
            else return false;

            //$gsent->debugDumpParams();

        }catch (PDOException $e) {
            $this->setErrors('101',"DataBase Error ".$e->getMessage());
        }catch (Exception $e) {
            $this->setErrors('102',"General Error ".$e->getMessage());
        }
        
    }

    

    public function updateCampeonato_Seguimiento(){

        try {

            $SQL="UPDATE 
            campeonatos 
          SET
            seguidores = seguidores+1
        WHERE id = :id;";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindParam(':id', $this->id, PDO::PARAM_INT);

            $gsent->execute();

            //$gsent->debugDumpParams();

            
        }catch (PDOException $e) {

            $this->setErrors('101',"DataBase Error ".$e->getMessage());
            

        }catch (Exception $e) {

            $this->setErrors('102',"General Error ".$e->getMessage());
            

        }
        
    }

    public function updateCampeonato_SeguimientoDejarDeSeguir(){

        try {

            $SQL="UPDATE 
            campeonatos 
          SET
            seguidores = seguidores-1
        WHERE id = :id;";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindParam(':id', $this->id, PDO::PARAM_INT);

            $gsent->execute();

            //$gsent->debugDumpParams();

            
        }catch (PDOException $e) {

            $this->setErrors('101',"DataBase Error ".$e->getMessage());
            

        }catch (Exception $e) {

            $this->setErrors('102',"General Error ".$e->getMessage());
            

        }
        
    }


    public function getComments_Campeonatos(){

        try {

            $SQL="SELECT * from comments_campeonatos WHERE campeonato=:campeonato ";

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

    public function getComments_Partidos($id){

        try {

            $SQL="SELECT * from comments_partidos WHERE partido=:partido ";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindValue(':partido', $id, PDO::PARAM_INT);

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

    public function getPartidos(){

        try {
            include 'Estado.php';

            $CLASS_ESTADO = new Estado($this->CONN);


            $SQL="SELECT * from partidos WHERE campeonato=:campeonato ";

            $gsent = $this->CONN->prepare($SQL);

            $gsent->bindValue(':campeonato', $this->id, PDO::PARAM_INT);

            $gsent->setFetchMode(PDO::FETCH_ASSOC);

            $gsent->execute();

            //$gsent->debugDumpParams();

            $data=array();

            while ($row =  $gsent->fetch()){
                $row['comentarios']=$this->getComments_Partidos($row['id']);
                $CLASS_ESTADO->setId($row['estado']);
                $row['estado'] = $CLASS_ESTADO->getEstadoById();
                $data[]=$row;
            }
            

            return $data;

        }catch (PDOException $e) {
            $this->setErrors('101',"DataBase Error ".$e->getMessage());
        }catch (Exception $e) {
            $this->setErrors('102',"General Error ".$e->getMessage());
        }
        
    }


	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getFoto_perfil(){
		return $this->foto_perfil;
	}

	public function setFoto_perfil($foto_perfil){
		$this->foto_perfil = $foto_perfil;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getEstadio(){
		return $this->estadio;
	}

	public function setEstadio($estadio){
		$this->estadio = $estadio;
	}

	public function getOrganization(){
		return $this->organization;
	}

	public function setOrganization($organization){
		$this->organization = $organization;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setDescription($description){
		$this->description = $description;
	}

	public function getF_inicio(){
		return $this->f_inicio;
	}

	public function setF_inicio($f_inicio){
		$this->f_inicio = $f_inicio;
	}

	public function getF_fin(){
		return $this->f_fin;
	}

	public function setF_fin($f_fin){
		$this->f_fin = $f_fin;
	}

	public function getLogo(){
		return $this->logo;
    }

    public function getMessage(){
		return $this->message;
	}
    

	public function setLogo($logo){
		$this->logo = $logo;
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

	public function getCreate_by()
	{
		return $this->create_by;
	}

	public function setCreate_by($create_by)
	{
		$this->create_by = $create_by;
	}

	public function getUbicacion()
	{
		return $this->ubicacion;
	}

	public function setUbicacion($ubicacion)
	{
		$this->ubicacion = $ubicacion;
	}

	public function getEstado()
	{
		return $this->estado;
	}

	public function setEstado($estado)
	{
		$this->estado = $estado;
	}

	public function getTipe()
	{
		return $this->tipe;
	}

	public function setTipe($tipe)
	{
		$this->tipe = $tipe;
	}

	public function getSport()
	{
		return $this->sport;
	}

	public function setSport($sport)
	{
		$this->sport = $sport;
	}
}
    
