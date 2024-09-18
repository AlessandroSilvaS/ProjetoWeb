const cursos = [
    {
        nome: "Programação em Python",
        descricao: "Curso introdutório de Python que cobre desde conceitos básicos até programação orientada a objetos e desenvolvimento web."
    },
    {
        nome: "Design Gráfico",
        descricao: "Aprenda os fundamentos do design gráfico, incluindo teoria das cores, tipografia, e uso de softwares como Adobe Photoshop e Illustrator."
    },
    {
        nome: "Marketing Digital",
        descricao: "Curso sobre estratégias e ferramentas de marketing digital, incluindo SEO, SEM, marketing de conteúdo e análise de dados."
    },
    {
        nome: "Inteligência Artificial",
        descricao: "Introdução à inteligência artificial e aprendizado de máquina, incluindo algoritmos de classificação, regressão e redes neurais."
    },
    {
        nome: "Gestão de Projetos",
        descricao: "Metodologias de gestão de projetos, incluindo Scrum, PMBOK e técnicas de planejamento e execução de projetos."
    },
    {
        nome: "Fotografia Digital",
        descricao: "Curso sobre técnicas de fotografia digital, incluindo composição, iluminação, e edição de imagens com softwares como Adobe Lightroom."
    },
    {
        nome: "Economia e Finanças",
        descricao: "Fundamentos da economia e finanças, incluindo análise de mercado, gestão financeira e investimentos."
    },
    {
        nome: "Aplicativos Móveis",
        descricao: "Criação de aplicativos para plataformas móveis, incluindo desenvolvimento para Android e iOS usando ferramentas como React Native e Swift."
    },
    {
        nome: "Biotecnologia",
        descricao: "Exploração dos conceitos de biotecnologia, incluindo engenharia genética, bioprocessos e aplicações em saúde e agricultura."
    },
    {
        nome: "História da Arte",
        descricao: "Análise da história da arte desde a Antiguidade até a arte contemporânea, abordando movimentos artísticos e influências culturais."
    },
    {
        nome: "Língua Espanhola",
        descricao: "Curso de aprendizado da língua espanhola, abrangendo gramática, vocabulário, e habilidades de conversação."
    }
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
        imageForCard.src = 'assets/logo.png'; // placeholder image

        cardImg.appendChild(imageForCard);

        const cardBody = document.createElement('div');
        cardBody.className = 'card-Body';

        const title = document.createElement('p');
        title.className = 'title-course'
        title.textContent = value.nome;

        cardBody.appendChild(title);

        const footerCard = document.createElement('div');
        footerCard.className = 'card-Footer';
        footerCard.style.marginTop='20px'

        const footerLink = document.createElement('a');
        footerLink.className = 'card-Link';
        footerLink.href = '#';
        footerLink.textContent = 'Ver curso'; // Texto do link

        footerCard.appendChild(footerLink);

        card.appendChild(cardImg);
        card.appendChild(cardBody);
        card.appendChild(footerCard);

        cardsContainer.appendChild(card);
    });
}

showCardsCourse(cursos);

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

        showCardsCourse(cursos);
    } catch (error) {
        // Exibe qualquer erro que ocorra durante a requisição ou o processamento
        console.error('Erro:', error);
    }
}

//getDatas()
