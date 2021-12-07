<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/assets/style.css">
</head>

<body>
  <!-- Страница изменения данных записи -->
  <?php
  include 'model.php'; //подключаем файл, содержащий класс подключения к базе данных
  $model = new Model(); //подключаем класс
  $id = $_REQUEST['id']; //из запроса вытаскием переданный номер записи
  $data = $model->edit($id); //получаем данные записи

  if (isset($_POST["update"])) { //если тип запроса update
    if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email'])) { //если поля данных заполнены
      if (!empty($_POST['firstName']) && $_POST['lastName'] && $_POST['email']) { //если поля не пусты
        //заполняем данные
        echo $data['id'] = $id;
        $data['FirstName'] = $_POST['firstName'];
        $data['LastName'] = $_POST['lastName'];
        $data['Email'] = $_POST['email'];
        $data['CompanyName'] = $_POST['company'];
        $data['Position'] = $_POST['position'];
        $data['Phone'] = $_POST['phone'];

        $update = $model->update($data); //метод, обновляющий данные записи в базе данных

        if ($update) { //если метод сработал, выводим сообщение о добавлении
          echo "<script>alert('account update successfully');</script>";
          echo "<script>window.location.href = 'index.php';</script>";
        } else { //иначе сообщение о неудаче
          echo "<script>alert('account update unsuccessful');</script>";
        }
      }
    }
  }
  ?>
  <div class="container">
    <main class="main">
      <h1 class="main__title">Edit page</h1>
      <div class="content">
        <!-- Форма изменения записей -->
        <form class="form form-edit" action="" method="post">
          <div class="form-group__items">
            <div class="form-group__item">
              <label class="form-group__label" for="">First name</label>
              <input class="form-group__input" required value="<?php echo $data['FirstName'] ?>" name="firstName" autocomplete="off" placeholder="Enter account name" type="text">
            </div>
            <div class="form-group__item">
              <label class="form-group__label" for="">Last name</label>
              <input class="form-group__input" required value="<?php echo $data['LastName'] ?>" name=lastName autocomplete="off" placeholder="Enter account last name" type="text">
            </div>
            <div class="form-group__item">
              <label class="form-group__label" for="">Email</label>
              <input class="form-group__input" required value="<?php echo $data['Email'] ?>" name="email" autocomplete="off" placeholder="Enter account email" type="email">
            </div>
            <div class="form-group__item">
              <label class="form-group__label" for="">Company</label>
              <input class="form-group__input" value="<?php echo $data['CompanyName'] ?>" name="company" autocomplete="off" placeholder="Enter account company name" type="text">
            </div>
            <div class="form-group__item">
              <label class="form-group__label" for="">Position</label>
              <input class="form-group__input" value="<?php echo $data['Position'] ?>" name="position" autocomplete="off" placeholder="Enter account Position" type="text">
            </div>
            <div class="form-group__item">
              <label class="form-group__label" for="">Phone</label>
              <input class="form-group__input" value="<?php echo $data['Phone'] ?>" name="phone" autocomplete="off" placeholder="Enter account Phone" type="text">
            </div>
          </div>
          <div class="form__footer">
            <a href="index.php" class="btn btn--back">Back</a>
            <button type="submit" name="update" class="btn btn--save">Save</button>
          </div>
        </form>
      </div>
    </main>
  </div>

  <script src="https://kit.fontawesome.com/134751a1b0.js" crossorigin="anonymous"></script>
  <script src="/assets/main.js"></script>
</body>

</html>