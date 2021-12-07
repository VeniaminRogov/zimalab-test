<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zimalab Test</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:,regular,500,700" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/style.css">
</head>

<body>
  <?php
  $cur_page = 1; //номер текущей страницы
  //Устанавливаем номер текущей страниы
  if (isset($_GET['page']) && $_GET['page'] > 0) {
    $cur_page = $_GET['page'];
  }
  ?>
  <div class="container _lock-padding">
    <main class="main">
      <h1 class="main__title">Zimalab Test</h1>
      <div class="content">
        <a href="#create" class="btn btn--add popup-link">
          Add account
          <i class="fas fa-plus icon"></i>
        </a>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Compony Name</th>
              <th>Position</th>
              <th>Phone</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include 'model.php'; //подключаем файл, содержащий класс подключения к базе данных
            $model = new Model(); //подключаем класс
            $data = $model->getAccountsPage($cur_page); //метод класса, запрос возврощающий данные из базы данных, для определенной страницы
            $index = 1; //номер ID
            if (!empty($data)) { //если не пусто проходим циклом по массиву данных
              foreach ($data as $row) {
            ?>
                <tr>
                  <!-- Вывод данных -->
                  <td><?php echo $index++ ?></td>
                  <td><?php echo $row['FirstName'] ?></td>
                  <td><?php echo $row['LastName'] ?></td>
                  <td><?php echo $row['Email'] ?></td>
                  <td><?php echo $row['CompanyName'] ?></td>
                  <td><?php echo $row['Position'] ?></td>
                  <td><?php echo $row['Phone'] ?></td>
                  <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>" class=" btn btn--edit popup-link">Edit<i class="far fa-edit icon"></i></a> <!-- по запросу передаем данные на страницу edit -->
                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn--delete">Delete<i class="far fa-trash-alt icon"></i></a> <!-- по запросу удаляем данные из базы данных -->
                  </td>
                </tr>

            <?php
              }
            } else { //если данных нет - вывод об этом
              echo
              "<div class='no-data'>
          No data, please add some information
          </div>
          ";
            }
            ?>
          </tbody>
        </table>
      </div>
      <?php //пагинация
      $count = $model->count(); //метод, возвращающий количество всех данных из абзы
      $sizePage = 10; //колиество отображаемых данных
      $totalPages = ceil($count / $sizePage); //считаем сколько страниц нужно отображать
      ?>
      <ul class="pagination">
        <?php
        for ($index = 1; $index <= $totalPages; $index++) { //циклом проходим по количеству страниц
        ?>
          <?php
          if ($index == $cur_page) { // если номер текущей страницы равен индексу
          ?>
            <li class="pagination__item">
              <p class="disabled"><?php echo $index ?></p> <!-- Убираем возможность нажимать по текущему номеру страницы -->
            </li>
          <?php
          } else { //иначе вывод всех страниц
          ?>
            <li class="pagination__item">
              <a class="pagination__link" href="?page=<?php echo $index ?>"><?php echo $index ?></a>
            </li>
        <?php
          }
        }
        ?>
      </ul>
    </main>
  </div>

  <?php
  $insert = $model->insert(); //метод для создания записи в базу данных
  ?>
  <!-- Modal create попап для создания записи -->
  <div class="popup" id="create">
    <div class="popup__body">
      <div class="popup__content">
        <form class="form" action="" method="post">
          <div class="form-header">
            <h4 class="form-header__title">Add account</h4>
            <!-- <a type="button" class="btn popup__close close-popup"><i class="fas fa-times"></i></a> -->
          </div>
          <div class="form-group__items">
            <div class="form-group__item">
              <label class="form-group__label" for="">First name</label>
              <input class="form-group__input" required name="firstName" autocomplete="off" placeholder="Enter account name" type="text">
            </div>
            <div class="form-group__item">
              <label class="form-group__label" for="">Last name</label>
              <input class="form-group__input" required name=lastName autocomplete="off" placeholder="Enter account last name" type="text">
            </div>
            <div class="form-group__item">
              <label class="form-group__label" for="">Email</label>
              <input class="form-group__input" required name="email" autocomplete="off" placeholder="Enter account email" type="email">
            </div>
            <div class="form-group__item">
              <label class="form-group__label" for="">Company</label>
              <input class="form-group__input" name="company" autocomplete="off" placeholder="Enter account company name" type="text">
            </div>
            <div class="form-group__item">
              <label class="form-group__label" for="">Position</label>
              <input class="form-group__input" name="position" autocomplete="off" placeholder="Enter account Position" type="text">
            </div>
            <div class="form-group__item">
              <label class="form-group__label" for="">Phone</label>
              <input class="form-group__input" name="phone" autocomplete="off" placeholder="Enter account Phone" type="text">
            </div>
          </div>
          <div class="form__footer">
            <button type="submit" name="submit" class="btn btn--save">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- / Modal create -->

  <script src="https://kit.fontawesome.com/134751a1b0.js" crossorigin="anonymous"></script>
  <script src="/assets/main.js"></script>
</body>

</html>