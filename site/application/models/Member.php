<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Model {

    public function user_login($email,$loginPassword)
    {
        $this->load->database();
        $this->load->library('session');

        try{
            $db = new PDO($this->db->dsn, $this->db->username, $this->db->password, $this->db->options); // trying to connect using PDO

            $sql = $db->prepare("select memberID, memberPassword, memberKey from memberLogin where memberEmail = :Email and RoleID=2");
            $sql->bindValue(":Email",$email ); // we enforce unique email policy in our memberLogin table
            $sql->execute(); //database gets records and retrieve it into our sql
            $row = $sql->fetch(); // grabs the first row

            if($row != null)
            {
                $hashedPassword=md5($loginPassword . $row["memberKey"]);
                if($hashedPassword == $row["memberPassword"])
                {
                    $this->session->set_userdata(array("UID"=>$row["memberID"]));
                    return true;
                }
                else
                {
                    return false;
                    //$errmsg = "Wrong Password";
                }
            }
            else
            {
                return false;
                //$errmsg = "Wrong Username";
            }

        }catch(PDOException $e){
            return false;
        }
    }

    public function create_User($name,$email,$newUserPassword)
    {
        $this->load->database();
        $this->load->library('session');

        $key= sprintf('%04X%04X%04X%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
        try {
            $db = new PDO($this->db->dsn, $this->db->username, $this->db->password, $this->db->options); // trying to connect using PDO
            $sql = $db->prepare("insert into memberLogin (memberName,memberEmail,memberPassword,RoleID,memberKey) Value (:Name,:Email,:Password,2,:Key)");

            $sql->bindValue(":Name", $name);
            $sql->bindValue(":Email",$email);
            $sql->bindValue(":Password",md5($newUserPassword . $key)); //md5 mixes our password up in a hash, can be reverse engineered though
            $sql->bindValue(":Key",$key);
            $sql->execute();
            return true;
        }
        catch(PDOException $e){
                return false;
            }
    }
}
