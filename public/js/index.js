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
            addPollUi(data.data);
        })
        .catch((error) => {
            console.error('There has been a problem with your fetch operation:', error);
        });

    })
    
})

function addPollUi(poll) {
  const [div, question, optionLists, actions, editEle, deleteEle, idEle] = [
    document.createElement('div'), 
    document.createElement('p'), 
    document.createElement('ul'), 
    document.createElement('div'),
    document.createElement('a'),
    document.createElement('button'),
    document.createElement('h1')
  ];

  Object.assign(editEle, {
    innerHTML: 'Edit',
    className: 'edit-link',
    href: `polls/${poll.id}`
  });

  idEle.innerText = poll.id;
  idEle.style.display = 'none';
  deleteEle.innerHTML = 'Delete';
  deleteEle.onclick = () => deletePoll(poll.id);

  actions.classList.add('poll-actions');
  actions.append(editEle, deleteEle);

  div.classList.add('poll-card');
  question.textContent = poll.question + '?';

  poll.options.forEach((optionObj) => {
    const [list, option, percentage] = [document.createElement('li'), document.createElement('p'), document.createElement('h5')]; 
    
    option.textContent = optionObj.option;
    percentage.textContent = '0%';
    percentage.style.margin = '0';
    percentage.style.color = 'blueviolet';
    
    list.append(option, percentage);
    optionLists.append(list);
  });

  div.append(idEle, question, optionLists, actions);
  document.getElementById('polls').append(div);
}


function deletePoll(id) {
    const url = 'api/polls/' +id
    const options = {
        method: 'delete',
        headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
    }

    fetch(url, options).then((response) => {
       return response.json();
    }).then((data) => {
       if(!data.status) return alert('Error: '+data.message);
       removePollUi(id);
       alert('poll deleted successfully');
    }).catch((error) => {
       alert(error);
    }); 
}

function removePollUi(id) {
    const pollCards = document.getElementsByClassName('poll-card');
    const poll = Array.from(pollCards).find((poll) => Number(poll.getElementsByTagName('h1')[0].innerText) === id);
    poll.remove();
}


