<?php
// Conexão com o banco
$host = "localhost";
$user = "root";
$pass = "";
$db   = "agendoly";

$conn = new mysqli($host, $user, $pass, $db);

// Verifica conexão
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Erro de conexão: " . $conn->connect_error]));
}

// Recebendo parâmetros
$mes = $_GET['mes'] ?? $_POST['mes'] ?? null;
$ano = $_GET['ano'] ?? $_POST['ano'] ?? null;

header("Content-Type: application/json; charset=UTF-8");

if ($mes && $ano) {
    // Primeiro dia do mês
    $primeiroDia = "$ano-$mes-01";
    
    // Descobre o dia da semana (0=Domingo, 6=Sábado)
    $diaSemanaInicio = date("w", strtotime($primeiroDia));
    
    // Quantidade de dias no mês
    $diasNoMes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

    $sql = "SELECT id, descricao, data, status, id_usuario 
            FROM tarefas 
            WHERE MONTH(data) = ? AND YEAR(data) = ?";//falta colocar a vaerificacao do usuario

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $mes, $ano);
    $stmt->execute();
    $result = $stmt->get_result();

    $tarefas = [];
    while ($row = $result->fetch_assoc()) {
        $tarefas[] = $row;
    }

    echo json_encode([
        "status" => "success",
        "mes" => (int)$mes,
        "ano" => (int)$ano,
        "dias_no_mes" => $diasNoMes,
        "primeiro_dia_semana" => (int)$diaSemanaInicio,
        "tarefas" => $tarefas
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Parâmetros 'mes' e 'ano' são obrigatórios."
    ]);
}

$conn->close();
?>
