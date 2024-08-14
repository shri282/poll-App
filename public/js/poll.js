document.addEventListener('DOMContentLoaded', function() {
    var editButton = document.getElementById('edit-button');
    var saveButton = document.getElementById('save-button');

    if (editButton && saveButton) {
        editButton.addEventListener('click', function() {
            document.querySelectorAll('.view-mode').forEach(el => el.style.display = 'none');
            document.querySelectorAll('.edit-mode').forEach(el => el.style.display = 'block');
            editButton.style.display = 'none';
            saveButton.style.display = 'block';
        });

        saveButton.addEventListener('click', function() {
            const options = document.querySelectorAll('.edit-mode');
            const optionsData = [];
            options.forEach((optionObj) => {
            const option = optionObj.querySelector('input[name="options[]"]');
            const votes = optionObj.querySelector('input[name="votes[]"]');
            optionsData.push({
                option : option.value,
                votes : votes.value
            });
            });
            const pollId = document.getElementById('pollid').value;
            const data = {
                pollId : Number(pollId),
                optionsData : optionsData
            }
            
            fetch('/api/polls/edit', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify(data)
            })
            .then((response) => {
                if(!response.ok) throw new Error('Network response was not ok');
                return response.json();
            })
            .then((data) => {
                alert(data.message);
            })
            .catch((error) => {
                console.error('There has been a problem with your update operation:', error);
            });

            window.location.href = '/';
        });
    }
});
