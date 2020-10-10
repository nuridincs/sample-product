<?php

  class M_barang extends CI_Model
  {
    public function getData($table)
    {
      $query = $this->db->get($table);

      return $query->result();
    }

    public function getJoinData($uniqid, $table1, $table2)
    {
      $query = $this->db->select('*')
              ->from($table1)
              ->join($table2, $table2.'.'.$uniqid.'='.$table1.'.'.$uniqid)
              ->get();

      return $query->result();
    }

    public function getLaporan($id_type = null, $startDate = null, $endDate = null)
    {
      $this->db->select('app_barang_masuk.part_number, app_barang_masuk.id_type, app_barang_masuk.jumlah_barang, app_barang_masuk.tanggal_masuk, app_barang_keluar.tanggal_keluar, app_barang_keluar.jumlah_barang_keluar, app_barang_keluar.sisa_barang, app_barang.part_name, app_barang.harga');
      $this->db->from('app_barang_masuk');
      $this->db->join('app_barang_keluar', 'app_barang_masuk.part_number=app_barang_keluar.part_number', 'left');
      $this->db->join('app_barang', 'app_barang.part_number=app_barang_masuk.part_number');
      if ($id_type != null) {
        $this->db->where('app_barang_masuk.id_type', $id_type);
      }

      if ($startDate != null) {
        $this->db->where("app_barang_keluar.tanggal_keluar BETWEEN CAST('".$startDate."' AS DATE) AND CAST('".$endDate."' AS DATE)");
      }
      $this->db->group_by('app_barang_keluar.id');
      $this->db->order_by('app_barang_masuk.tanggal_masuk asc');
      $query = $this->db->get();

      // echo $this->db->last_query();die;

      return $query->result();
    }

    public function getInvoiceData($id)
    {
      $query = $this->db->select('*')
              ->from('app_barang_masuk')
              ->join('app_barang_keluar', 'app_barang_keluar.part_number=app_barang_masuk.part_number')
              ->join('app_barang', 'app_barang.part_number=app_barang_masuk.part_number')
              ->where('app_barang_masuk.part_number', $id)
              ->get();

      return $query->result();
    }

    public function addData($table, $data)
    {
      $this->db->insert($table, $data);
    }

    public function updateData($table, $data, $idName, $id)
    {
      $this->db->where($idName, $id);
      $this->db->update($table, $data);
    }

    public function getDataByID($table, $idName, $id)
    {
      $query = $this->db->select('*')
              ->from($table)
              ->where($idName, $id)
              ->get();

      return $query->row();
    }

    public function getDataMasterBarang()
    {
      $sql = "SELECT * FROM app_master_barang WHERE status = 1";

      $query = $this->db->query($sql);
      return $query->result();
    }


    public function getExpiredBarang()
    {
      $sql = "SELECT * FROM app_master_barang WHERE status = 0";

      $query = $this->db->query($sql);
      return $query->result();
    }
  }
