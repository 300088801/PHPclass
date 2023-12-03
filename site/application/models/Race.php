<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Race extends CI_Model {

    public function get_races()
    {
        $this->load->database();

        try{
            $query = $this->db->get('race');
            return $query->result_array();
        }catch(PDOException $e){

        }
    }

    public function add_race($name,$location,$description,$date)
    {
        $this->load->database();

        try{
            $data=array('raceName'=>$name,'raceLocation'=>$location,'raceDescription'=>$description,'raceDateTime'=>$date);
            $this->db->insert('race',$data);
        }catch(PDOException $e){

        }
    }
}
