<?php
include( dirname( __DIR__) . DIRECTORY_SEPARATOR . 'config.php');



class dbconfig{

    public $host = DB_HOST;

    public $user = DB_USER;

    public $pass = DB_PASSWORD;

    public $dbname = DB_DATABSE;

    public $basepath=BASEPATH;

    public $abspath=ABSPATH;  

    public $conn;

    public $error;

    

    public function __construct(){

      $this->connect();

      

    }

 

    private function connect(){

      

      $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

      mysqli_set_charset($this->conn,"utf8");

      if(!$this->conn){

        $this->error = "Fatal Error: Can't connect to database".$this->conn->connect_error;

        return false;

      }

    }

    public function exeute_query($sql) {

      

      try {

        $result = $this->conn->query($sql);

        if(!$result) {

          throw new exception("Error in query!");

        }       

      } catch (Exception $e) {

        

      } finally {

        return $result;

      }

    }

    

    





   

     
    

};



  class user extends dbconfig {

  

    function __construct() {    

      parent::__construct();

      

    }

    

  // Check if username/password is incorrect

    public static function validatelogin($username, $password) {

        

      $err = "";

        if($username==""){

        

        $err = 1;

        

      }else if($password==""){

      

        $err = 2;

      }

      

      return $err ;

    }

    // Check if username/password is incorrect

    public function checkUser($username, $password) {

        
      try {

            

           $query = "SELECT * FROM tbl_user WHERE email = '".$username."' AND password = '".$password."'";

           $result = $this->conn->query($query);

           if(!$result) {

           throw new exception("Error in query!");

           }

           $count = $result->num_rows; 

           if($count == 0) {

            throw new exception("Username/Password is incorrect.");

           }        

           $data = array('status'=>'success', 'msg'=>"", 'result'=>'');

       } catch (Exception $e) {

            $data = array('status'=>'error', 'msg'=>$e->getMessage()); 

      } finally {

        return $data;

      }

    }




     // login function

    public function login($username, $password) {

    

    try { 

        $query = "SELECT * FROM tbl_user WHERE email = '".$username."' and password = '".$password."'";

        $result = $this->conn->query($query);

        if(!$result) {

          throw new exception("Error in query!");

        }

        $resultSet =$result->fetch_object();         

        $data = array('status'=>'success', 'msg'=>"User detail fetched successfully.", 'result'=>$resultSet);

          

      } catch (Exception $e) {

        $data = array('status'=>'error', 'msg'=>$e->getMessage());

      } finally {

        return $data;

      }

  }

  public function check_existing_email($email){

    $query = "SELECT * FROM tbl_user WHERE email LIKE '%$email%'";

        $result = $this->conn->query($query);
        if(!$result) {

          throw new exception("Error in query!");

        }
        $resultSet =$result->fetch_object();
        //print_r($resultSet);die;
        $count = $result->num_rows;
       // print_r($count);die;
        if($count != '0'){
        $data = array("count"=>$count,"id"=>$resultSet->id ,"email"=>$resultSet->email); 
        }else{
          $data = array("count"=>'0'); 
        }
     //   print_r($data);  
        return $data;
  }

  public function  register_user($inputar){

    $query = "INSERT INTO tbl_user (first_name, last_name, email, password) 
    VALUES ('" . $inputar['f_username'] . "', '" . $inputar['last_name'] . "', '" . $inputar['email'] . "', '" . $inputar['password'] . "')";
   // print_r($query);

  $result = $this->conn->query($query);

  return $result;

  }

  public function  register_task($inputar){

    $query = "INSERT INTO tbl_tasks (task_name, task_desc, task_category, user_id,start_date,end_date) 
    VALUES ('" . $inputar['taskname'] . "', '" . $inputar['description'] . "', '" . $inputar['category'] . "' , '" . $inputar['user'] . "', '" . $inputar['startdate'] . "', '" . $inputar['enddate'] . "')";

  $result = $this->conn->query($query);

  return $result;

  }



  public function get_task(){

    $query = "SELECT tbl_tasks.id AS task_id, tbl_tasks.task_name, tbl_tasks.start_date, tbl_tasks.end_date, tbl_tasks.task_category, tbl_tasks.task_desc, tbl_user.id AS user_id, tbl_user.first_name, tbl_user.last_name, tbl_user.email FROM tbl_tasks LEFT JOIN tbl_user ON tbl_tasks.user_id = tbl_user.id WHERE delete_status = '0'";
    $result = $this->conn->query($query);
    $count      = $result->num_rows;
    if($count>0){

        while ($row = $result->fetch_assoc() ){

            $resultSet[] = $row;

        }
           

      }else{
        $resultSet = '0';
      }
    return $resultSet;

  }

  public function  getuser(){

    $query = "SELECT * FROM tbl_user";
    $result = $this->conn->query($query);
    $count      = $result->num_rows; 
     
      if($count>0){

        while ($row = $result->fetch_assoc() ){

            $resultSet[] = $row;

        }
           

      }

    return $resultSet;



  }

  public function delete_task($id){

    $query = "UPDATE tbl_tasks SET delete_status = '1' WHERE id = '".$id."' ";
//print_r($query);die;
    $result = $this->conn->query($query);

    return $result;
  }

  public function getdetails($id){

    $query = "SELECT * FROM tbl_tasks WHERE id = '$id'";
    //print_r($query);die;
        $result = $this->conn->query($query);
        $row = $result->fetch_assoc();
        return $row;


  }
  public function  edit_task($inputar){

    $query = "UPDATE tbl_tasks SET task_name = '" . $inputar['taskname'] . "',task_desc = '" . $inputar['description'] . "',task_category = '" . $inputar['category'] . "',user_id = '" . $inputar['user'] . "',start_date = '" . $inputar['startdate'] . "', end_date = '" . $inputar['enddate'] . "' 
    WHERE id = '" . $inputar['task_id'] . "'";

  $result = $this->conn->query($query);

  return $result;

  }
}