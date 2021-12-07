<?php
include 'model.php'; //подключаем файл, содержащий класс подключения к базе данных
$model = new Model(); //подключаем класс
$id = $_REQUEST['id']; //из запроса вытаскием переданный номер записи
$delete = $model->delete($id); //метод для удаления записи, по переданному номеру записи

if ($delete) { //если запись удалена, вывод сообщения об этом
  echo "<script>alert('account added successfully');</script>";
  echo "<script>window.location.href = 'index.php';</script>";
} else { //если запись не удалена, вывод сообщения об этом
  echo "<script>alert('account added unsuccessfull');</script>";
  echo "<script>window.location.href = 'index.php';</script>";
}
