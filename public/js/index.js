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


document.addEventListener('DOMContentLoaded', (event) => {
   const addOptionButton = document.getElementById('add-option-button');
   const optionsContainer = document.getElementById('options-container');
   const optionInput = document.getElementById('option-input');

   addOptionButton.addEventListener('click', () => {
       const optionValue = optionInput.value.trim();
       if (optionValue !== '') {
           // Create a new div for the option
           const optionDiv = document.createElement('div');
           optionDiv.classList.add('option-item');

           // Create an input element for the option
           const optionInputField = document.createElement('input');
           optionInputField.type = 'text';
           optionInputField.name = 'options[]';
           optionInputField.value = optionValue;
           optionInputField.readOnly = true;

           // Create a remove button
           const removeButton = document.createElement('button');
           removeButton.type = 'button';
           removeButton.innerText = 'remove';
           removeButton.addEventListener('click', () => {
               optionsContainer.removeChild(optionDiv);
           });

           // Append the input field and remove button to the option div
           optionDiv.appendChild(optionInputField);
           optionDiv.appendChild(removeButton);

           // Append the option div to the container
           optionsContainer.appendChild(optionDiv);

           // Clear the option input
           optionInput.value = '';
       }
   });
});
