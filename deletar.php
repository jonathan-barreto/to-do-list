<?php

$id = $_POST["id"];

$conexao = new PDO("mysql:host=localhost;dbname=todolist", "root", "");
$stmt = $conexao->prepare("DELETE FROM tarefas WHERE id = $id");
$stmt->execute();