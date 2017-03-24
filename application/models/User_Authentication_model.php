<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');
class User_Authentication_model extends CI_Model {

	public function __construct() {}

	public function insertUser($data)
	{
		$string = array(
                'first_name'=>ucfirst($data['first_name']),
                'last_name'=>ucfirst($data['last_name']),
                'email'=>$data['email'],
                'password' =>password_hash($data['password'], PASSWORD_DEFAULT),
                'username' =>$data['username'],
                'role'=> $this->config->item(0,'roles'), 
                'status'=> $this->config->item(0,'status')
            );
        $q = $this->db->insert_string('user',$string);             
        $this->db->query($q);
        return $this->db->insert_id();
	}

    public function insertUser_info($user_id)
    {
        $sql = "INSERT INTO user_info (user_id) VALUES ($user_id)";
        $this->db->query($sql);
    }

	public function insertToken($user_id)
    {   
        $token = substr(sha1(rand()), 0, 30); 
        $date = date(DATE_RFC822, time());
        
        $string = array(
                'token'=> $token,
                'user_id'=>$user_id,
                'created'=>$date
            );
        $query = $this->db->insert_string('token',$string);
        $this->db->query($query);
        return $token . $user_id;
        
    }

    public function getToken($user_id)
    {
        $sql = "SELECT * FROM token WHERE user_id = '$user_id'";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0)
        {
            return $query;
        }
        else
        {
            return 0;
        }
    }

    public function updateToken($user_id)
    {
        $token = substr(sha1(rand()), 0, 30); 
        
        $sql = "UPDATE token SET token = '$token' WHERE user_id = $user_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function confirmUser($data)
    {
        $username = $data['username'];
        $password = $data['password'];
        //$sql = "SELECT * FROM user WHERE '$username' IN(username, email) AND '$password' = password";
        $sql = "SELECT * FROM user WHERE '$username' IN(username, email)";
        $query = $this->db->query($sql);
        if ($query->num_rows() == 0)
        {
            return 0;
        }
        else
        {
            $result = $query->row();
            if (!password_verify($password, $result->password)) 
            {
                return 0;
            }
        }
        return $query;

    }

    public function confirmEmail($data)
    {
        //$sql = "SELECT * FROM user WHERE '$username' IN(username, email) AND '$password' = password";
        $sql = "SELECT * FROM user WHERE email = '$data'";
        $query = $this->db->query($sql);
        if ($query->num_rows() == 0)
        {
            return 0;
        }
        else
        {
            return $query->row();
        }

    }

    public function confirm_password($u_id, $password){
        $sql = "SELECT * FROM user WHERE user_id = $u_id";
        $query = $this->db->query($sql);
        if ($query->num_rows() == 0)
        {
            return 0;
        }
        else
        {
            $result = $query->row();
            if (!password_verify($password, $result->password)) 
            {
                return 0;
            }
        }
        return $query;
    }

    public function isTokenValid($token)
    {
        $tkn = substr($token,0,30);
        $uid = substr($token,30);      
       
        $q = $this->db->get_where('token', array(
            'token.token' => $tkn, 
            'token.user_id' => $uid), 1);      
        
        if($this->db->affected_rows() > 0){
            $row = $q->row();             
            
            /*$created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d'); 
            $todayTS = strtotime($today);
            
            if($createdTS != $todayTS){
                return false;
            }*/
            $status = $this->config->item(1,'status');
            $sql = "UPDATE user SET status = '$status' WHERE user_id = $row->user_id";
            $query = $this->db->query($sql);

            if ($query){
                return $uid;
            }      
            else{
                return 0;
            }
        }
        
    }

    public function reset_password($password, $id)
    {
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE user SET password = '$pass' WHERE user_id = $id";
        $query = $this->db->query($sql);
        return $query;
    }

}
?>