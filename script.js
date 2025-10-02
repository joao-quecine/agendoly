//---------------------- funçoes das funcionalidades do frontend --------------------
atualizarCalendario()
//---- funcao selecionar o dia
function openCard(event) {
    const dia = event.currentTarget;  

    const selecionado = document.querySelector(".dia.selected");
    if (selecionado) {
        selecionado.classList.remove("selected");
    }

    dia.classList.add("selected");
}

//---- funcao listagem das tarefas daquele dia na area de tarefas -----
function listarTarefas() {
    //ainda nada 
}

// --- funcao da loggica do input do ano ---
const yearInput = document.getElementById("yearInput");
yearInput.addEventListener("blur", function () { //funcao é ativada quando o input perde o foco (quando o usuario clica fora por exemplo)
    const min = parseInt(this.min);
    const max = parseInt(this.max);
    let value = parseInt(this.value);

    if (value < min) this.value = min;
    else if (value > max) this.value = max;
});


//---- funcao dos botoes laterais
function botoesLaterais(n) {
    const monthSelect = document.getElementById("monthSelect");
    const yearInput = document.getElementById("yearInput");

    let mesAtual = parseInt(monthSelect.value);
    let anoAtual = parseInt(yearInput.value);

    mesAtual += n;

    // Ajusta ano se passar de dezembro ou antes de janeiro
    if (mesAtual > 11) {
        mesAtual = 0;
        if (anoAtual < parseInt(yearInput.max)) anoAtual += 1;
    } else if (mesAtual < 0) {
        mesAtual = 11;
        if (anoAtual > parseInt(yearInput.min)) anoAtual -= 1;
    }

    monthSelect.value = mesAtual;
    yearInput.value = anoAtual;
}

//---- funçao para adicionar tarefa---
function adicionarTarefa() {
    const input = document.getElementById("novaTarefaInput");
    const valor = input.value.trim();
    if (!valor) return;

    const areaTarefas = document.querySelector(".area-tarefas");
    const addDiv = document.querySelector(".add-tarefa");

    // monta o bloco da tarefa em HTML
    const tarefaHTML = `
        <div class="tarefa">
            <button class="tarefa-check-button" onclick="alterarEstadoTarefa(event)">
                <img src="img/circulo.png">
            </button>
            <div class="descricao">${valor}</div>
            <button class="btn btn-sm btn-warning ms-2" onclick="editarTarefa(event)">Editar</button>
            <button class="btn btn-sm btn-danger ms-2" onclick="apagarTarefa(event)">Apagar</button>
        </div>
    `;

    // insere o bloco antes da div de adicionar tarefa
    addDiv.insertAdjacentHTML("beforebegin", tarefaHTML);

    input.value = "";
}

//------ função de apagar ---------
function apagarTarefa(event) {
    const button = event.currentTarget;
    const tarefa = button.closest(".tarefa");
    tarefa.remove();
}

// --------função de editar ---------
function editarTarefa(event) {
    const button = event.currentTarget;
    const tarefa = button.closest(".tarefa");
    const desc = tarefa.querySelector(".descricao");

    const novoValor = prompt("Editar tarefa:", desc.textContent);
    if (novoValor !== null) desc.textContent = novoValor.trim();
}

// -------função de alternar check-------
function alterarEstadoTarefa(event) {
    const button = event.currentTarget; // garante que pegamos o botão, não a img
    const tarefa = button.closest(".tarefa");
    const descricao = tarefa.querySelector(".descricao");

    // alterna o estilo da descrição
    descricao.classList.toggle("concluida");

    // alterna a imagem do botão
    const img = button.querySelector("img");
    if (!img) return;

    if (img.src.includes("circulo.png")) {
        img.src = "img/verificar.png";
    } else {
        img.src = "img/circulo.png";
    }
}


function gerarDiaHTML(dia, temTarefa = false) {
  const hoje= new Date()
  return `
<div class="dia ${temTarefa ? "com-tarefa" : ""} ${hoje.getDate()==dia? "selected" : ""}" onclick="openCard(event)">
      <span>${dia}</span>
    </div>

  `;
}

function atualizarCalendario() {
    let mes = document.querySelector("#monthSelect").value
    let ano = document.querySelector("#yearInput").value

    const id_usuario = 1; // parâmetro
    const xhr = new XMLHttpRequest();

    xhr.open("GET", `tools/atualizarCalendario.php?mes=${mes}&ano=${ano}`, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const dados = JSON.parse(xhr.responseText);

            if (dados.status === "success") {
                const diasContainer = document.getElementById("dias");
                diasContainer.innerHTML = ""; // limpa antes

                const diasNoMes = dados.dias_no_mes;
                const primeiroDiaSemana = dados.primeiro_dia_semana;

                // cria um set com os dias que têm tarefas
                const diasComTarefas = new Set(
                    dados.tarefas.map(t => new Date(t.data).getDate())
                );

                // espaços em branco até alinhar o primeiro dia
                for (let i = 0; i < primeiroDiaSemana; i++) {
                    diasContainer.innerHTML += `<div class="dia vazio"></div>`;
                }

                // monta os dias do mês
                for (let dia = 1; dia <= diasNoMes; dia++) {
                    const temTarefa = diasComTarefas.has(dia);
                    diasContainer.innerHTML += gerarDiaHTML(dia, temTarefa);
                }
            }


        }
    };
    xhr.send();
}

//---------------------------------- area das funcoes de comunicaçao com o beckend--------------------

//implementar a adiçao do id nas tarefas na hora da criaçao

//comuncar ao beckend quando a tarefa mudar de estado

//reatividade ao mudar o dia/mes/ano, alterando a lista de tarefas durante a navegaçao