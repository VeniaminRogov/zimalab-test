<?php

class Model
{
  private $server = "localhost";
  private $username = "root";
  private $password = "root";
  private $db = "zimalab_test";
  private $conn;

  public function __construct()
  {
    try {
      $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
    } catch (Exception $ex) {
      echo "Connection failed with " . $ex->getMessage() . " exception";
    }
  }

  public function insert()
  {
    if (isset($_POST["submit"])) {
      if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email'])) {
        if (!empty($_POST['firstName']) && $_POST['lastName'] && $_POST['email']) {
          $firstName = $_POST['firstName'];
          $lastName = $_POST['lastName'];
          $email = $_POST['email'];
          $company = $_POST['company'];
          $position = $_POST['position'];
          $phone = $_POST['phone'];

          $query = "INSERT INTO account (FirstName,LastName,Email,CompanyName,Position,Phone) 
                                    VALUES ('$firstName', '$lastName', '$email', '$company', '$position', '$phone')";
          if ($sql = $this->conn->query($query)) {
            echo "<script>alert('account added successfully');</script>";
            echo "<script>window.location.href = 'index.php';</script>";
          } else {
            echo "<script>alert('account added unsuccessful');</script>";
            echo "<script>window.location.href = 'index.php';</script>";
          }
        } else {
          echo "<script>alert('please fill out fields');</script>";
          echo "<script>window.location.href = 'index.php';</script>";
        }
      }
    }
  }

  public function fetch()
  {
    $data = null;
    $query = "SELECT count(*) FROM account";
    $sql = $this->conn->query($query);

    return $sql;
  }

  public function delete($id)
  {
    $query = "DELETE FROM account where id = '$id'";
    if ($sql = $this->conn->query($query)) {
      return true;
    } else {
      return false;
    }
  }

  public function edit($id)
  {
    $data = null;
    $query = "SELECT * FROM account WHERE id = '$id'";
    if ($sql = $this->conn->query($query)) {
      while ($row = $sql->fetch_assoc()) {
        $data = $row;
      }
    }
    return $data;
  }

  public function update($data)
  {
    $query = "UPDATE account SET FirstName='$data[FirstName]', LastName='$data[LastName]',Email='$data[Email]', CompanyName='$data[CompanyName]', Position='$data[Position]', Phone='$data[Phone]' WHERE id='$data[id]'";
    if ($sql = $this->conn->query($query)) {
      return true;
    } else {
      return false;
    }
  }
}
