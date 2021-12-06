<?php
include 'model.php';
$model = new Model();
$id = $_REQUEST['id'];
$delete = $model->delete($id);

if ($delete) {
  echo "<script>alert('account added successfully');</script>";
  echo "<script>window.location.href = 'index.php';</script>";
} else {
  echo "<script>alert('account added unsuccessfull');</script>";
  echo "<script>window.location.href = 'index.php';</script>";
}
