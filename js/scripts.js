const cardsContainer = document.querySelector('.cards-main-container');

async function getDatas(areaConhecimento) {
    try {
        // Faz a requisição para index.php
        const response = await fetch("pages/dataCourse.php");

        // Verifica se a resposta foi bem-sucedida
        if (!response.ok) {
            throw new Error('Erro na requisição: ' + response.statusText);
        }

        // Converte a resposta para JSON
        const data = await response.json();

        // Verifica se os dados são válidos
        if (!Array.isArray(data)) {
            throw new Error('Dados inválidos');
        }

        // Limpa o conteúdo atual
        cardsContainer.innerHTML = "";

        // Filtra os dados conforme a área de conhecimento
        const filteredCourses = areaConhecimento 
            ? data.filter((valor) => valor.area_conhecimento === areaConhecimento) 
            : data;

        showCardsCourse(filteredCourses);
        
    } catch (error) {
        // Exibe qualquer erro que ocorra durante a requisição ou o processamento
        console.error('Erro:', error);
    }
}

function showCardsCourse(valores) {
    // Verifica se os dados são válidos
    if (!Array.isArray(valores)) {
        throw new Error('Dados inválidos');
    }

    // Cria e anexa os cards
    valores.forEach((value) => {
        // Cria o card
        const card = document.createElement('div');
        card.className = 'card-course';

        const imgContainer = document.createElement('div');
        imgContainer.className = 'card-Img';
        const img = document.createElement('img');
        img.src = "assets/logo.png"; // Verifique se o caminho da imagem está correto

        imgContainer.appendChild(img);

        // Cria o título do card
        const title = document.createElement('p');
        title.className = 'title-course';
        title.textContent = value.curso_nome;

        // Cria o corpo do card
        const cardBody = document.createElement('div');
        cardBody.className = 'card-Body';
        cardBody.appendChild(title);

        // Cria o rodapé do card
        const footerCard = document.createElement('div');
        footerCard.className = 'card-Footer';
        footerCard.style.marginTop = '20px';

        // Cria o link do rodapé do card
        const idCourse = value.id_curso;
        const footerLink = document.createElement('a');
        footerLink.className = 'card-Link';
        footerLink.href = `pages/showCorseInd.php?id=${idCourse}`;
        footerLink.textContent = 'Ver curso'; // Texto do link

        // Anexa os elementos ao card
        card.appendChild(imgContainer);
        card.appendChild(cardBody);
        footerCard.appendChild(footerLink); // Anexa o footerLink ao footerCard
        card.appendChild(footerCard);

        // Anexa o card ao container
        cardsContainer.appendChild(card);
    });
}

// Coleta os botões de categoria
const buttons = document.querySelectorAll(".category-button");
const functions = [
    () => getDatas(''),
    () => getDatas('Tecnologia'),
    () => getDatas('Saude'),
    () => getDatas('Educacao'),
    () => getDatas('Negocios'),
    () => getDatas('Exatas')
];

buttons.forEach((element, index) => {
    element.addEventListener('click', functions[index]);
});

// Chama a função inicialmente para "Tecnologia"
getDatas("");
