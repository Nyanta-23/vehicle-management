<?php

class Vehicle_Model
{
  private
    $table = "vehicles",
    $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getAll()
  {
    $query = "SELECT * FROM $this->table";

    $this->db->query($query);
    $vehicles = $this->db->fetchAll();

    return $this->db->rowCount() > 0 ? $vehicles : false;
  }

  public function getById($id)
  {
    $query = "SELECT * FROM $this->table WHERE id = :id";

    $this->db->query($query);
    $this->db->bind('id', $id);

    $vehicle = $this->db->fetch();

    return $this->db->rowCount() > 0 ? $vehicle : false;
  }

  public function add($data)
  {
    $query = "INSERT INTO $this->table(name, type, owned_by, amount, createdAt, updatedAt) VALUES(:name, :type, :owned_by, :amount, :createdAt, :updatedAt)";

    $dateNow = date('Y-m-d H:i:s');

    $this->db->query($query);
    $this->db->bind('name', $data['name']);
    $this->db->bind('type', $data['type']);
    $this->db->bind('owned_by', $data['owned_by']);
    $this->db->bind('amount', $data['amount']);
    $this->db->bind('createdAt', $dateNow);
    $this->db->bind('updatedAt', $dateNow);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function delete($id)
  {
    $query = "DELETE FROM $this->table WHERE id = :id";

    $this->db->query($query);
    $this->db->bind("id", $id);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function edit($data)
  {
    $query = "UPDATE $this->table
    SET
    name = :name,
    type = :type,
    owned_by = :owned_by,
    amount = :amount,
    updatedAt = :updatedAt
    WHERE id = :id";

    $dateNow = date('Y-m-d H:i:s');

    $this->db->query($query);

    $this->db->bind('id', $data['id']);
    $this->db->bind('name', $data['name']);
    $this->db->bind('type', $data['type']);
    $this->db->bind('owned_by', $data['owned_by']);
    $this->db->bind('updatedAt', $dateNow);

    $this->db->execute();

    return $this->db->rowCount();
  }
}
