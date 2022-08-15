<?php

header("Content-Type: text/html");

class Tarefas
{

  public function create(string $tarefa)
  {
    $conexao= new PDO("mysql:host=localhost;dbname=todolist", "root", "");
    $stmt = $conexao->prepare("INSERT INTO tarefas (tarefa) VALUES (:tarefa)");
    $stmt->bindValue(":tarefa", $tarefa);
    $stmt->execute();
  }

  public function read()
  {
    $conexao= new PDO("mysql:host=localhost;dbname=todolist", "root", "");
    $stmt = $conexao->prepare("SELECT * FROM tarefas ORDER BY id DESC");
    $stmt->execute();
    if($stmt->rowCount() > 0){
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){?>
        <div class="tarefa">
            <div class="checkbox">
              <input class="form-check-input" type="checkbox" value="" id="">
            </div>
            <div class="span">
              <span><?php echo $row["tarefa"]; ?></span>
            </div>
            <div class="acoes">
              <div class="lado-esquerdo">
                <button type="button" id="<?php echo $row["id"]; ?>" class="button-style button-edit" data-bs-toggle="modal" data-bs-target="#modalEditar">
                  <img src="images/edit2.png" class="img">
                </button>
              </div>
              <div class="lado-direito">
                <button type="button" id="<?php echo $row["id"]; ?>" class="button-style button-delete">
                  <img src="images/delete2.png" class="img">
                </button>
              </div>
            </div>
          </div>
        </div>
      <?php
      }
    }
  }

  public function readId($id)
  {
    $conexao= new PDO("mysql:host=localhost;dbname=todolist", "root", "");
    $stmt = $conexao->prepare("SELECT * FROM tarefas WHERE id = $id");
    $stmt->execute();
    if($stmt->rowCount() > 0){ 
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){?>
        <div class="mb-3">
          <input type="hidden" class="form-control" id="input-id" value="<?php echo $row["id"]; ?>">
          <label for="input-tarefa" class="form-label">Tarefa</label>
          <input type="text" class="form-control" id="input-tarefa" value="<?php echo $row["tarefa"]; ?>">
        </div>
    <?php
      }
    }
  }

  public function update($id, $tarefa)
  {
    $conexao= new PDO("mysql:host=localhost;dbname=todolist", "root", "");
    $stmt = $conexao->prepare("UPDATE tarefas SET tarefa = '$tarefa' WHERE id = $id");
    $stmt->execute();
  }



}

$tarefas = new Tarefas();
//$tarefas->create("Estudar PYTHONdasdasdasdasdasdasdasdasdasdasdasd");