<?php

class PemasukanModel extends CI_Model {

    function insertPemasukan($pemasukan){
        return $this->db->insert("tb_pemasukan",$pemasukan);
    }

    function getPemasukan(){
        return $this->db->get("tb_pemasukan");
    }

    function getPemasukanById($id){
        $this->db->where("id_pemasukan",$id);
        return $this->db->get("tb_pemasukan");
    }

    function updatePemasukan($id, $dataPM){
        $this->db->where("id_pemasukan",$id);
        return $this->db->update('tb_pemasukan',$dataPM);
    }
    function get_idmax(){
        $date=date('ymd'); 
        $this->db->like("id_pemasukan",$date);
        $this->db->select_max("id_pemasukan");
        $this->db->from("tb_pemasukan");
        $query = $this->db->get();
        return $query;
    }

    function get_newid($auto_id, $prefix){
        $date=date('ymd-');      
        $newId = substr($auto_id, -3);
        $tambah = (int)$newId + 1;
        if (strlen($tambah) == 1 ){
            $id_pemasukan = $prefix.$date."00" .$tambah;
        }
        else if (strlen($tambah) == 2 ){
            $id_pemasukan = $prefix."0" .$tambah;
        }
        else if (strlen($tambah) == 3 ){
            $id_pemasukan = $prefix .$tambah;
        }
        return $id_pemasukan;
    }
    
    function get_delete($id){
        $this->db->where('id_pemasukan',$id);
        return $this->db->delete('tb_pemasukan');
    }
    
}