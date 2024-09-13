const informationsOfDataBase = [{
    name: "Tecnico em informática",
    areaDoCurso: "Tecnologia"
},
{
    name: "Técnico em comércio",
    areaDoCurso: "Negócios"
},
{
    name: "Tecnico em Enfermagem",
    areaDoCurso: "Tecnologia"
},
{
    name: "Tecnico em informática",
    areaDoCurso: "Tecnologia"
}]//array of data systems

const informationsOfDataBase = [{
    name: "Tecnico em informática",
    areaDoCurso: "Tecnologia"
},
{
    name: "Técnico em comércio",
    areaDoCurso: "Negócios"
},
{
    name: "Tecnico em Enfermagem",
    areaDoCurso: "Tecnologia"
},
{
    name: "Tecnico em informática",
    areaDoCurso: "Tecnologia"
}]

//function to filter by area

function showCardsCourse(){

    const cardArray = informationsOfDataBase.map((value) => {
        const cardsContainer = document.querySelector('.cards-main-container')[0];

        const card = document.createElement('div');
        card.className = 'card-course';

        const cardImg = document.createElement('div');
        cardImg.className = 'card-Img';
        
        const imageForCard = document.createElement('img');
        imageForCard.src = 'https://via.placeholder.com/150'; // placeholder image

        cardImg.appendChild(imageForCard);

        const cardBody = document.createElement('div');
        cardBody.className = 'card-body';

        const title = document.createElement('p');
        title.textContent = imageForCard.title;

        cardBody.appendChild(title);

        const footerCard = document.createElement('div');
        footerCard.className = 'card-Footer';
    })

    informationsOfDataBase.forEach(item => {
        if(item.areaDoCurso === area){
            const card = document.createElement('div');
            card.className = 'card';

            const title = document.createElement('h2');
            title.textContent = item.name;

            const areaText = document.createElement('p');
            areaText.textContent = `Área: ${item.areaDoCurso}`;

            card.appendChild(title);
            card.appendChild(areaText);

            cardsContainer.appendChild(card);
        }
    });
}