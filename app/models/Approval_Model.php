<?php

class Approval_Model
{
  private
    $table = "approvals",
    $table_reservations = "reservaitons",
    $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getAll()
  {
    $query = "SELECT
    approvals.*,
    reservations.id as reservation_id,
    reservations.vehicle_id,
    reservations.driver
    FROM approvals
    INNER JOIN reservations ON approvals.reservation_id = reservations.id
    ";

    $this->db->query($query);
    $approved = $this->db->fetchAll();

    return $this->db->rowCount() > 0 ? $approved : false;
  }

  public function getById($id)
  {
    $query = "SELECT * FROM approvals WHERE id = :id";

    $this->db->query($query);
    $this->db->bind('id', $id);

    $approved = $this->db->fetch();

    return $this->db->rowCount() > 0 ? $approved : false;
  }

  public function acceptRequestBy($data)
  {
    $query = "UPDATE $this->table
    SET
    approver_id = :approver_id,
    level = :level
    WHERE id = :id";

    $this->db->query($query);
    $this->db->bind('approver_id', $data['user']);
    $this->db->bind('id', $data['id']);
    $this->db->bind('level', $data['level']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function rejectRequestBy($data)
  {
    $query = "UPDATE $this->table
    SET
    approver_id = :approver_id,
    is_rejected = :is_rejected
    WHERE id = :id";

    $this->db->query($query);
    $this->db->bind('approver_id', $data['user']);
    $this->db->bind('id', $data['id']);
    $this->db->bind('is_rejected', $data['is_rejected']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  
}
