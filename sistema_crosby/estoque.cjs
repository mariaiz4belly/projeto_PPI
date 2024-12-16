// Captura o formulário e a tabela
const formEstoque = document.getElementById('formEstoque');
const tabelaEstoque = document.getElementById('tabelaEstoque').getElementsByTagName('tbody')[0];

// Captura o input de imagens e o carrossel
const inputImagens = document.getElementById('imagens');
const carrosselContainer = document.getElementById('carrossel-imagens');

// Variáveis para armazenar as imagens e o item que está sendo editado
let produtoEditando = null;
let imagensProduto = [];

// Função para adicionar as imagens ao carrossel
inputImagens.addEventListener('change', function(event) {
    const files = event.target.files;
    imagensProduto = [];

    // Limpa o carrossel antes de adicionar novas imagens
    carrosselContainer.innerHTML = '';

    // Adiciona as imagens ao carrossel
    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();

        reader.onload = function(e) {
            const imgElement = document.createElement('img');
            imgElement.src = e.target.result;
            carrosselContainer.appendChild(imgElement);
            imagensProduto.push(file);  // Armazena o arquivo de imagem
        };

        reader.readAsDataURL(file);
    }
});

// Adiciona um evento de submit ao formulário
formEstoque.addEventListener('submit', function(event) {
    event.preventDefault();

    // Captura os valores dos campos do formulário
    const nomeProduto = document.getElementById('produto').value;
    const quantidadeProduto = document.getElementById('quantidade').value;
    const precoProduto = document.getElementById('preco').value;

    // Se estamos editando um produto, atualiza a linha, caso contrário, cria uma nova linha
    if (produtoEditando) {
        produtoEditando.cells[0].textContent = nomeProduto;
        produtoEditando.cells[1].textContent = quantidadeProduto;
        produtoEditando.cells[2].textContent = `R$ ${parseFloat(precoProduto).toFixed(2)}`;
        produtoEditando.cells[3].innerHTML = gerarCarrosselImagens(imagensProduto);
        produtoEditando = null;
    } else {
        // Cria uma nova linha na tabela
        const novaLinha = tabelaEstoque.insertRow();

        // Cria células e insere os dados
        const celulaNome = novaLinha.insertCell(0);
        const celulaQuantidade = novaLinha.insertCell(1);
        const celulaPreco = novaLinha.insertCell(2);
        const celulaImagens = novaLinha.insertCell(3);
        const celulaAcoes = novaLinha.insertCell(4);

        celulaNome.textContent = nomeProduto;
        celulaQuantidade.textContent = quantidadeProduto;
        celulaPreco.textContent = `R$ ${parseFloat(precoProduto).toFixed(2)}`;
        celulaImagens.innerHTML = gerarCarrosselImagens(imagensProduto);

        // Cria os botões de ação
        const btnEditar = document.createElement('button');
        btnEditar.textContent = 'Editar';
        btnEditar.classList.add('edit-btn');
        btnEditar.onclick = function() {
            editarProduto(novaLinha);
        };

        const btnExcluir = document.createElement('button');
        btnExcluir.textContent = 'Excluir';
        btnExcluir.classList.add('delete-btn');
        btnExcluir.onclick = function() {
            excluirProduto(novaLinha);
        };

        celulaAcoes.appendChild(btnEditar);
        celulaAcoes.appendChild(btnExcluir);
    }

    // Limpa os campos do formulário
    formEstoque.reset();
    carrosselContainer.innerHTML = '';  // Limpa o carrossel
    imagensProduto = [];  // Reseta as imagens
});

// Função para gerar o carrossel de imagens em formato HTML
function gerarCarrosselImagens(imagens) {
    let html = '<div class="carrossel-container">';
    imagens.forEach(img => {
        const imgSrc = URL.createObjectURL(img);
        html += `<img src="${imgSrc}" alt="Imagem do produto">`;
    });
    html += '</div>';
    return html;
}

// Função para editar o produto
function editarProduto(linha) {
    produtoEditando = linha;

    // Preenche o formulário com os valores atuais da linha
    document.getElementById('produto').value = linha.cells[0].textContent;
    document.getElementById('quantidade').value = linha.cells[1].textContent;
    document.getElementById('preco').value = linha.cells[2].textContent.replace('R$ ', '').replace(',', '.');

    // Pega as imagens do produto e as exibe no carrossel
    const imagens = linha.cells[3].querySelectorAll('img');
    imagensProduto = [];
    imagens.forEach(img => {
        const imgSrc = img.src;
        const blob = dataURLtoBlob(imgSrc);
        imagensProduto.push(blob);
    });

    // Adiciona as imagens ao carrossel para edição
    carrosselContainer.innerHTML = '';
    imagensProduto.forEach(img => {
        const imgElement = document.createElement('img');
        imgElement.src = URL.createObjectURL(img);
        carrosselContainer.appendChild(imgElement);
    });
}

// Função para excluir o produto
function excluirProduto(linha) {
    linha.remove();
}

// Função para converter Data URL para Blob (para edição das imagens)
function dataURLtoBlob(dataURL) {
    const byteString = atob(dataURL.split(',')[1]);
    const arrayBuffer = new ArrayBuffer(byteString.length);
    const uint8Array = new Uint8Array(arrayBuffer);

    for (let i = 0; i < byteString.length; i++) {
        uint8Array[i] = byteString.charCodeAt(i);
    }

    const blob = new Blob([uint8Array], { type: 'image/jpeg' });
    return blob;
}
