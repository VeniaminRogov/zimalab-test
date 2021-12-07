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
  include 'pagination.php';
  $pagination = new Pagination();
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
            include 'model.php';
            $model = new Model();
            $rows = $model->fetch();
            // echo $rows;
            // $data = $model->pagination();
            // var_dump($rows);
            $index = 1;
            // $countAccounts = count($rows);
            $pagination->setTotalPages($countAccounts);
            $account = 10;
            $pages = ceil($countAccounts / $account);

            if (!empty($data)) {
              foreach ($data as $row) {
            ?>
                <tr>
                  <td><?php echo $index++ ?></td>
                  <td><?php echo $row['FirstName'] ?></td>
                  <td><?php echo $row['LastName'] ?></td>
                  <td><?php echo $row['Email'] ?></td>
                  <td><?php echo $row['CompanyName'] ?></td>
                  <td><?php echo $row['Position'] ?></td>
                  <td><?php echo $row['Phone'] ?></td>
                  <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>" class=" btn btn--edit popup-link">Edit<i class="far fa-edit icon"></i></a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn--delete">Delete<i class="far fa-trash-alt icon"></i></a>
                  </td>
                </tr>

            <?php
              }
            } else {
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
    </main>
  </div>

  <?php
  $insert = $model->insert();
  ?>
  <!-- Modal edit -->
  <!-- <div id="edit" class="popup">
    <?php
    $id = $_REQUEST['id'];
    $edit = $model->edit($id);
    ?>
    <div class="popup__body">
      <div class="popup__content">
        <form class="form" action="" method="post">
          <div class="form-header">
            <h4 class="form-header__title">Edit account</h4>
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
            <button type="submit" name="edit" class="btn btn--save">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div> -->
  <!-- /Modal edit -->
  <!-- Modal create -->
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