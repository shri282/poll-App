function applyfilter(event) {
   console.log(event.target.innerText);
   const params = {
    category : event.target.innerText
   };
   const baseUrl = '/';
   let queryString = new URLSearchParams(params).toString();
   let urlWithParams = `${baseUrl}?${queryString}`; 
   window.location.href = urlWithParams;
}

function showPollForm() {
   const form = document.getElementById('poll-form');
   form.style.display = form.style.display === 'flex' ? 'none' : 'flex';
}

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('poll-form');

    form.addEventListener('submit', function(event) {
       event.preventDefault();
       const data = {
            question: document.querySelector('textarea[name="question"]').value,
            description: document.querySelector('textarea[name="description"]').value,
            options: document.querySelector('textarea[name="options"]').value,
            category: document.querySelector('input[name="category"]').value,
            status: document.querySelector('select[name="status"]').value,
        };

        fetch('api/polls/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify(data)
        })
        .then((response) => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then((data) => {
            alert(data.message);
            form.reset();
            form.style.display = 'none';
            appendCreatedPoll(data.data);
        })
        .catch((error) => {
            console.error('There has been a problem with your fetch operation:', error);
        });

    })
    
})

function appendCreatedPoll(poll) {
  const div = document.createElement('div');
  const question = document.createElement('p');
  const optionLists = document.createElement('ul');
  div.classList.add('poll-card');
  question.textContent = poll.question + '?';
  const options = poll.options;
  for(optionObj of options) {
    const list = document.createElement('li'); 
    const option = document.createElement('p'); 
    const percentage = document.createElement('h5'); 
    option.textContent = optionObj.option;
    percentage.textContent = '0%';
    percentage.style.margin = '0';
    percentage.style.color = 'blueviolet';
    list.appendChild(option);
    list.appendChild(percentage);
    optionLists.appendChild(list);
  }

  div.appendChild(question);
  div.appendChild(optionLists);
  const polls = document.getElementById('polls');
  polls.appendChild(div);
}


