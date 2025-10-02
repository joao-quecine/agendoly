<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Calendário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="styles/index.css" rel="stylesheet">
</head>

<body>

  <!-- Cabeçalho -->
  <header class="d-flex justify-content-between align-items-center">
    <div class="fw-bold">Agendo.<span style="color: #a3a3c2;">ly</span></div>
    <div>@Usuario</div>
  </header>

  <!-- Calendário -->
  <div class="calendar">
    <!-- Navegação -->
    <div class="calendar-header">
      <button class="btn-nav" onclick="botoesLaterais(-1)">&lt;</button>

      <select id="monthSelect" onchange="atualizarCalendario()">
        <option <?php echo (date("n")==0)? "selected": "" ?> value="0">Janeiro</option>
        <option <?php echo (date("n")==1)? "selected": "" ?> value="1">Fevereiro</option>
        <option <?php echo (date("n")==2)? "selected": "" ?> value="2">Março</option>
        <option <?php echo (date("n")==3)? "selected": "" ?> value="3">Abril</option>
        <option <?php echo (date("n")==4)? "selected": "" ?> value="4">Maio</option>
        <option <?php echo (date("n")==5)? "selected": "" ?> value="5">Junho</option>
        <option <?php echo (date("n")==6)? "selected": "" ?> value="6">Julho</option>
        <option <?php echo (date("n")==7)? "selected": "" ?> value="7">Agosto</option>
        <option <?php echo (date("n")==8)? "selected": "" ?> value="8">Setembro</option>
        <option <?php echo (date("n")==9)? "selected": "" ?> value="9">Outubro</option>
        <option <?php echo (date("n")==10)? "selected": "" ?> value="10">Novembro</option>
        <option <?php echo (date("n")==11)? "selected": "" ?> value="11">Dezembro</option>
      </select>

      <input onchange="atualizarCalendario()" id="yearInput" type="number" max="2050" min="1900" value="2025" class="form-control" style="width:100px;">

      <button class="btn-nav" onclick="botoesLaterais(1)">&gt;</button>
    </div>

    <!-- Dias da semana -->
    <div class="weekdays">
      <div>Dom</div>
      <div>Seg</div>
      <div>Ter</div>
      <div>Qua</div>
      <div>Qui</div>
      <div>Sex</div>
      <div>Sáb</div>
    </div>

    <!-- Dias do mês (exemplo estático) -->
    <div class="dias" id="dias">

    
    </div>
  </div>

  

  <!-- btn adicionar -->
   <div class="adicionar_tarefasBTN">
  <!-- Adicionar novas tarefas -->
  <div class="add-tarefa mt-3 d-flex gap-2">
    <input id="novaTarefaInput" type="text" class="form-control" placeholder="Nova tarefa...">
    <button class="btn btn-primary" onclick="adicionarTarefa()">Adicionar</button>
  </div>
  </div>

  <!--area de tarefas-->
  <div class="area-tarefas">

  </div>


  <!--script-->
  <script src="script.js"></script>

</body>

</html>