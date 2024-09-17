const informationsOfDataBase = [
    { name: "Tecnico em informática", areaDoCurso: "Tecnologia" },
    { name: "Tecnico em comércio", areaDoCurso: "Negócios" },
    { name: "Tecnico em Enfermagem", areaDoCurso: "Tecnologia" },
    { name: "Tecnico em informática", areaDoCurso: "Tecnologia" },
    { name: "Tecnico em logística", areaDoCurso: "Negócios"},
    { name: "Tecnico em informática", areaDoCurso: "Tecnologia" },
    { name: "Tecnico em comércio", areaDoCurso: "Negócios" },
    { name: "Tecnico em Enfermagem", areaDoCurso: "Tecnologia" },
    { name: "Tecnico em informática", areaDoCurso: "Tecnologia" },
    { name: "Tecnico em logística", areaDoCurso: "Negócios"},
    { name: "Tecnico em informática", areaDoCurso: "Tecnologia" },
    { name: "Tecnico em comércio", areaDoCurso: "Negócios" },
    { name: "Tecnico em Enfermagem", areaDoCurso: "Tecnologia" },
    { name: "Tecnico em informática", areaDoCurso: "Tecnologia" },
    { name: "Tecnico em logística", areaDoCurso: "Negócios"}
];



function showCardsCourse(datas) {
    const cardsContainer = document.querySelector('.cards-main-container');
    
    // Limpa o container de cards
    cardsContainer.innerHTML = '';

    // Cria e anexa os cards
    datas.map((value) => {
        const card = document.createElement('div');
        card.className = 'card-course';

        const cardImg = document.createElement('div');
        cardImg.className = 'card-Img';
        
        const imageForCard = document.createElement('img');
        imageForCard.src = 'https://via.placeholder.com/150'; // placeholder image

        cardImg.appendChild(imageForCard);

        const cardBody = document.createElement('div');
        cardBody.className = 'card-Body';

        const title = document.createElement('p');
        title.className = 'title-course'
        title.textContent = value.curso_nome;

        cardBody.appendChild(title);

        const footerCard = document.createElement('div');
        footerCard.className = 'card-Footer';

        const footerLink = document.createElement('a');
        footerLink.className = 'card-Link';
        footerLink.href = '#'; // Defina o href ou outro conteúdo para o link
        footerLink.textContent = 'Ver curso'; // Texto do link

        footerCard.appendChild(footerLink);

        card.appendChild(cardImg);
        card.appendChild(cardBody);
        card.appendChild(footerCard);

        cardsContainer.appendChild(card);
    });
}

// Certifique-se de chamar a função para exibir os cards
//showCardsCourse(informationsOfDataBase);

async function getDatas(){
    try {
        // Faz a requisição para index.php
        const response = await fetch("pages/dataCourse.php");

        // Verifica se a resposta foi bem-sucedida
        if (!response.ok) {
            throw new Error('Erro na requisição: ' + response.statusText);
        }

        // Converte a resposta para JSON
        const data = await response.json();

        console.log(data)

         showCardsCourse(data);
    } catch (error) {
        // Exibe qualquer erro que ocorra durante a requisição ou o processamento
        console.error('Erro:', error);
    }
}

const cardsArray = getDatas()
