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

      <select id="monthSelect">
        <option value="0">Janeiro</option>
        <option value="1">Fevereiro</option>
        <option value="2">Março</option>
        <option value="3">Abril</option>
        <option value="4">Maio</option>
        <option value="5">Junho</option>
        <option value="6">Julho</option>
        <option value="7">Agosto</option>
        <option value="8">Setembro</option>
        <option value="9">Outubro</option>
        <option value="10">Novembro</option>
        <option value="11">Dezembro</option>
      </select>

      <input id="yearInput" type="number" max="2050" min="1900" value="2025" class="form-control" style="width:100px;">

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
    <div class="dias">

      <div onclick="openCard(event)" class="dia selected">1</div>
      <div onclick="openCard(event)" class="dia">2</div>
      <div onclick="openCard(event)" class="dia">3</div>
      <div onclick="openCard(event)" class="dia">4</div>
      <div onclick="openCard(event)" class="dia">5</div>
      <div onclick="openCard(event)" class="dia">6</div>
      <div onclick="openCard(event)" class="dia">7</div>
      <div onclick="openCard(event)" class="dia">8</div>

    </div>
  </div>

  <!--area de tarefas-->
  <div class="area-tarefas">

  <!-- Adicionar novas tarefas -->
  <div class="add-tarefa mt-3 d-flex gap-2">
    <input id="novaTarefaInput" type="text" class="form-control" placeholder="Nova tarefa...">
    <button class="btn btn-primary" onclick="adicionarTarefa()">Adicionar</button>
  </div>

  <!--script-->
  <script src="script.js"></script>

</body>

</html>