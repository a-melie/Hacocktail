let recipe = document.getElementById('recipe');
let selectors = document.getElementsByClassName('choice');
let question = document.getElementById('question');
for (let i = 0; i < selectors.length; i++) {
    selectors[i].addEventListener('click', (e) => {
        recipe.classList.toggle('hidden');
        selectors[0].classList.add('hidden');
        selectors[1].classList.add('hidden');
        selectors[2].classList.add('hidden');
        question.classList.add('hidden');
    });
}

let reponse = document.getElementsByClassName('reponse')
for (let i=0; i < 3; i++) {
    reponse[i].addEventListener('click', (event) => {
        fetch('/quizz/verifyreponse', {
            method: 'POST',
            headers: {
                'Accept' : 'application/json',
                'Content-Type' : 'application/json'
            },
            body: JSON.stringify({
                'reponse'  : event.target.dataset.reponse,
                'question' : event.target.dataset.question
            })
        })
            .then(response => response.json())
            .then(data => console.log(data))
    });
}

