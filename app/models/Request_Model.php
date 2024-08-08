<?php

class Request_Model
{
  private
    $table = "reservations",
    $table_vehicle = 'vehicles',
    $table_users = 'users',
    $table_approvals = 'approvals',
    $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function add($data)
  {
    $query = "INSERT INTO $this->table(user_id, vehicle_id, driver, createdAt, updatedAt) VALUES(:user_id, :vehicle_id, :driver, :createdAt, :updatedAt)";

    $dateNow = date('Y-m-d H:i:s');

    $this->db->query($query);
    $this->db->bind('user_id', $data['user_id']);
    $this->db->bind('vehicle_id', $data['vehicle_id']);
    $this->db->bind('driver', $data['driver']);
    $this->db->bind('createdAt', $dateNow);
    $this->db->bind('updatedAt', $dateNow);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function getAllByUser($id)
  {
    $query = "SELECT $this->table.*,
    $this->table_users.name AS user_name,
    $this->table_users.email,
    $this->table_vehicle.name AS vehicle_name,
    $this->table_vehicle.type AS vehicle_type,
    $this->table_vehicle.owned_by
    FROM $this->table
    INNER JOIN $this->table_users ON $this->table.user_id = $this->table_users.id
    INNER JOIN $this->table_vehicle ON $this->table.vehicle_id = $this->table_vehicle.id
    WHERE user_id = :user_id";

    $this->db->query($query);
    $this->db->bind('user_id', $id);

    $reservation = $this->db->fetchAll();

    return $this->db->rowCount() > 0 ? $reservation : false;
  }

  public function sendRequest($data){
    $query = "INSERT
    INTO $this->table_approvals(reservation_id, level, is_rejected, reserver_by, email, name_vehicle, type_vehicle, vehicle_owned_by, createdAt, updatedAt)
    VALUES(:reservation_id, :level, :is_rejected, :reserver_by, :email, :name_vehicle, :type_vehicle, :vehicle_owned_by, :createdAt, :updatedAt)";

    $dateNow = date('Y-m-d H:i:s');

    $this->db->query($query);
    $this->db->bind('reservation_id', $data['id']);
    $this->db->bind('level', '0');
    $this->db->bind('is_rejected', '0');
    $this->db->bind('reserver_by', $data['reserver_by']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('name_vehicle', $data['name_vehicle']);
    $this->db->bind('type_vehicle', $data['type_vehicle']);
    $this->db->bind('vehicle_owned_by', $data['vehicle_owned_by']);
    $this->db->bind('createdAt', $dateNow);
    $this->db->bind('updatedAt', $dateNow);

    $this->db->execute();

    return $this->db->rowCount();
  }
}
