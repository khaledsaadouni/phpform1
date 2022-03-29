<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
<div class="container">
  <div style="font-size: x-large;text-align: center;color: #1a84b0"> Commande</div>
  <?php

  if (isset($_POST["prenom"]) && isset($_POST["nom"]) && isset($_POST["nombre"]) && isset($_POST["adresse"]) && isset($_POST["supp"]) && isset($_POST["type"])) {
    ?>
    <table class="table table-sm">
      <tr>
        <td>nom
        <td> <?= htmlspecialchars($_POST["nom"]) ?>
      <tr>
        <td>prenom
        <td> <?= htmlspecialchars($_POST["prenom"]) ?>
      <tr>
        <td>nombre
        <td> <?= htmlspecialchars($_POST["nombre"]) ?>
      <tr>
        <td>adresse
        <td> <?= htmlspecialchars($_POST["adresse"]) ?>
      <tr>
        <td>Type du sandwitch
        <td> <?= $_POST["type"] ?>
      <tr>
        <td>supplement
        <td><?php foreach ($_POST['supp'] as $v) {
            echo $v . "<Br>";
          } ?>
      <tr>
        <td>prix total
        <td><?php if ($_POST['nombre'] >= 10) {
            echo((4 * $_POST['nombre']) - ($_POST['nombre'] / 100));
          } else {
            echo(4 * $_POST['nombre']);
          } ?>
    </table>
  <?php } else {
    header('location:index.php');
  } ?>
</div>
<?php
$_FILES["fichier"]["name"] = $_POST["nom"] . "_" . $_POST["nombre"] . "_" . time() . "_" . $_FILES["fichier"]['name'];
$uploadFileDir = './uploads/';
$dest_path = $uploadFileDir . $_FILES["fichier"]["name"];
$fileTmpPath = $_FILES['fichier']['tmp_name'];
move_uploaded_file($fileTmpPath, $dest_path);
?>
</body>
</html>
