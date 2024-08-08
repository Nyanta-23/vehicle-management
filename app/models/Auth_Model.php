<?php

class Auth_Model
{
  private
    $table = "users",
    $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function signIn($data)
  {
    $query = "SELECT * FROM $this->table WHERE email = :email";

    $this->db->query($query);
    $this->db->bind('email', $data['email']);

    $account = $this->db->fetch();

    if ($account) {
      if (password_verify($data['password'], $account['password'])) {
        return $account;
      } else {
        return false;
      }
    }
  }

  public function signUp($data)
  {
    $query = "INSERT INTO
    $this->table(email, password, name, role, createdAt, updatedAt)
    VALUES(:email, :password, :name, :role, :createdAt, :updatedAt)";

    $dateNow = date('Y-m-d H:i:s');

    $this->db->query($query);
    $this->db->bind('email', $data['email']);
    $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
    $this->db->bind('name', $data['name']);
    $this->db->bind('createdAt', $dateNow);
    $this->db->bind('updatedAt', $dateNow);
    $this->db->bind('role', 'user');

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function getAccountByEmail($email)
  {
    $query = "SELECT * FROM $this->table WHERE email = :email";

    $this->db->query($query);
    $this->db->bind('email', $email);

    $account = $this->db->fetch();

    if ($this->db->rowCount() > 0) {
      return $account;
    } else {
      return false;
    }
  }

  public function getRoleById($id)
  {
    $query = "SELECT * FROM $this->table WHERE id = :id";

    $this->db->query($query);
    $this->db->bind('id', $id);

    $account = $this->db->fetch()['role'];

    if ($this->db->rowCount() > 0) {
      return $account;
    } else {
      return false;
    }
  }

  public function getAccountById($id){
    $query = "SELECT * FROM $this->table WHERE id = :id";

    $this->db->query($query);
    $this->db->bind('id', $id);

    $account = $this->db->fetch();

    if ($this->db->rowCount() > 0) {
      return $account;
    } else {
      return false;
    }
  }
}
