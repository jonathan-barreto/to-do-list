$(document).ready(function() {

  function read(){
    var acao = "read";
    $.ajax({
      type: "POST",
      url: "model.php",
      data: "acao=" + acao
    }).done(function(html){
      $('#parte-conteudo').html(html);
    });
  }

  read();

  $(document).on("click", "#input-button", function(){
    var acao = "create";
    var tarefa = $("#input-text").val();
    $.ajax({
      type: "POST",
      url: "model.php",
      data: "acao=" + acao + "&tarefa=" + tarefa
    }).done(function(){
      $("#input-text").val("");
      read();
    });
  });

  $(document).on("click", ".button-edit", function(){
    var id = this.id;
    var acao = "readId";
    $.ajax({
      type: "POST",
      url: "model.php",
      data: "acao=" + acao + "&id=" + id
    }).done(function(html){
      $('#conteudo-modal').html(html);
    });
  });

  $(document).on("click", "#salvar-btn",function(){
    var acao = "update";
    var id = $("#input-id").val();
    var tarefa = $("#input-tarefa").val();
    $.ajax({
      type: "POST",
      url: "model.php",
      data: "acao=" + acao + "&id=" + id + "&tarefa=" + tarefa
    }).done(function(){
      read();
    });
  });

  $(document).on("click", ".button-delete", function(){
    var id = this.id;
    $.ajax({
      type: "POST",
      url: "deletar.php",
      data: "id=" + id
    }).done(function(){
      read();
    });
  });
  
});
  


  





