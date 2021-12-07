<?php

class Model //Класс подключения к базе данных и методы для запросов в базу данных
{
  //переменный для подключения к базе данных
  private $server = "localhost";
  private $username = "root";
  private $password = "root";
  private $db = "zimalab_test";
  private $conn;

  public function __construct() //конструктор подключения к базе данных
  {
    try {
      $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db); //переменная подключения к базе данных
    } catch (Exception $ex) { //вывод ошибки, если к базе данных подключиться не удалось
      echo "Connection failed with " . $ex->getMessage() . " exception";
    }
  }

  public function insert() //запрос для добавления записи в базу данных
  {
    if (isset($_POST["submit"])) { //если тип запроса submit
      if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email'])) { //если поля данных заполнены
        if (!empty($_POST['firstName']) && $_POST['lastName'] && $_POST['email']) { //если поля не пусты
          //заполняем данные
          $firstName = $_POST['firstName'];
          $lastName = $_POST['lastName'];
          $email = $_POST['email'];
          $company = $_POST['company'];
          $position = $_POST['position'];
          $phone = $_POST['phone'];

          $query = "INSERT INTO account (FirstName,LastName,Email,CompanyName,Position,Phone) 
                                    VALUES ('$firstName', '$lastName', '$email', '$company', '$position', '$phone')"; //запрос для заполнения записи в базу данных
          if ($sql = $this->conn->query($query)) { //если запрос сработал, вывод попа о добавлениии записи
            echo "<script>alert('account added successfully');</script>";
            echo "<script>window.location.href = 'index.php';</script>";
          } else { //иначе вывод попа - запрос не сработал
            echo "<script>alert('account added unsuccessful');</script>";
            echo "<script>window.location.href = 'index.php';</script>";
          }
        }
      }
    }
  }

  public function getAllAccounts() //метод, возвращающий все записи из базы данных
  {
    $data = null; //обявление переменной
    $query = "SELECT * FROM account"; //запрос для получения всех записей из базы данных
    if ($sql = $this->conn->query($query)) { //если запрос сработал
      $data = $sql;
    }

    return $data; //возвращение объекта с записями из базы данных
  }

  public function getAccountsPage($page) //метод возвращающий объекты из базы данных для текущей страницы
  {
    $offset = 10 * ($page - 1); //количество записей
    $query = "SELECT * FROM account LIMIT $offset, 10"; //запрос, возвращающий определенной количество записей
    $sql = $this->conn->query($query); //отправляем запрос
    return $sql; //возвращаем объект с данными
  }

  public function count() //метод, возвращающий количество записей в базе данных
  {
    $query = "SELECT count(*) FROM account"; //запрос - количество записей
    $sql = $this->conn->query($query)->fetch_row()[0]; //количество записей
    return $sql;
  }

  public function delete($id) //метод для удаления записей из базы данных
  {
    $query = "DELETE FROM account where id = '$id'"; //Запрос - по номеру записи, удаляем из базы данных
    if ($sql = $this->conn->query($query)) { //если запрос сработал 
      return true;
    } else {
      return false;
    }
  }

  public function edit($id) //метод для получения текущих данных записи из базы данных
  {
    $data = null;
    $query = "SELECT * FROM account WHERE id = '$id'"; //запрос для получения данных по номеру записи
    if ($sql = $this->conn->query($query)) { //если запрос сработал
      while ($row = $sql->fetch_assoc()) { //переменная $data получает данные из записи
        $data = $row;
      }
    }
    return $data; //возвращаем данные
  }

  public function update($data) //метод для обновления записи в базе данных
  {
    $query = "UPDATE account SET FirstName='$data[FirstName]', LastName='$data[LastName]',Email='$data[Email]', CompanyName='$data[CompanyName]', Position='$data[Position]', Phone='$data[Phone]' WHERE id='$data[id]'"; //Запрос изменияющий текущие данные записи
    if ($sql = $this->conn->query($query)) { //если запрос сработал
      return true;
    } else {
      return false;
    }
  }
}
