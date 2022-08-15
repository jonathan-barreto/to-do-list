<?php

require_once "Tarefas.php";
$tarefas = new Tarefas();
$acao = $_POST["acao"];

switch ($acao) {
  case "read":
    echo $tarefas->read();
    break;
  case "readId":
    $id = $_POST["id"];
    echo $tarefas->readId($id);
    break;
  case "create":
    $tarefa = $_POST["tarefa"];
    echo $tarefas->create($tarefa);
    break;
  case "update":
    $id = $_POST["id"];
    $tarefa = $_POST["tarefa"];
    echo $tarefas->update($id, $tarefa);
}