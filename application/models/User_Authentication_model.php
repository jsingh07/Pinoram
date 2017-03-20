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

}
?>