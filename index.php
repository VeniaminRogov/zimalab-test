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
  <div class="container">
    <main class="main">
      <h1 class="main__title">Zimalab Test</h1>
      <div class="content">
        <?php
        include 'model.php';
        $model = new Model();
        $rows = $model->fetch();
        // var_dump($rows);
        $index = 1;
        if (!empty($rows)) {
          foreach ($rows as $row) {
        ?>
            <div class="table">
              <!-- <div class="button-wrapper"> -->
              <button class="btn btn--add">
                Add account
                <i class="fas fa-plus icon"></i>
              </button>
              <!-- </div> -->
              <table>
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
                  <tr>
                    <td><?php echo $index++ ?></td>
                    <td><?php echo $row['FirstName'] ?></td>
                    <td><?php echo $row['LastName'] ?></td>
                    <td><?php echo $row['Email'] ?></td>
                    <td><?php echo $row['CompanyName'] ?></td>
                    <td><?php echo $row['Position'] ?></td>
                    <td><?php echo $row['Phone'] ?></td>
                    <td style="display: flex; justify-content: center; align-items: center;">
                      <a href="read.php?id=<?php echo $row['id']; ?>" class="btn btn--read">Read</a>
                      <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn--edit">Edit<i class="far fa-edit icon"></i></a>
                      <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn--delete">Delete<i class="far fa-trash-alt icon"></i></a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
        <?php
          }
        } else {
          echo
          "<div class='no-data'>
            No data, please add some information
            <button class='btn btn--add'>
              <i class='fas fa-plus'></i>
            </button>
          </div>
          ";
        }
        ?>
      </div>
    </main>
  </div>

  <?php
  $insert = $model->insert();
  ?>


  <div class="popup">
    <div class="popup__body">
      <div class="popup__content">
        <form class="form" action="" method="post">
          <div class="form-header">
            <h4 class="form-header__title">Add account</h4>
            <button type="button" class="btn popup__close"><i class="fas fa-times"></i></button>
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

  <script src="https://kit.fontawesome.com/134751a1b0.js" crossorigin="anonymous"></script>
  <script src="/assets/main.js"></script>
</body>

</html>