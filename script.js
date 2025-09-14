//---------------------- funçoes das funcionalidades do frontend --------------------


//---- funcao selecionar o dia
function openCard(event) {
    var element = event.target; //pega o dia que foi clicado
    document.querySelector(".selected").classList.remove("selected");
    element.classList.add("selected");

    //falta implementar a abertura da lista de tarefas de cada dia ao clicar
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

//---------------------------------- area das funcoes de comunicaçao com o beckend--------------------

//implementar a adiçao do id nas tarefas na hora da criaçao

//comuncar ao beckend quando a tarefa mudar de estado

//reatividade ao mudar o dia/mes/ano, alterando a lista de tarefas durante a navegaçao