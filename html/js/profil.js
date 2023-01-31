function sendmail(subject, message, mail){;

    const request = new XMLHttpRequest();

    request.open("GET","/ajax/functionMail.php?subject="+subject+"&msg="+message+"&mail="+mail);
    
    request.onreadystatechange = function(){

        if(request.readyState === 4){
            const res = request.responseText;
            console.log(res);
        }
    };
    
    request.send();
}


//Modification User par un moderateur

function recupMail(usersEmail){
    
    const mail = usersEmail;
    
    localStorage.setItem('oldEmail', `${mail}`);

    console.log(mail);

}

const modifyUser = document.getElementById('modifyUser');

modifyUser.addEventListener('submit', function (e) {
    e.preventDefault();

    let mail = localStorage.getItem('oldEmail');

    const formData = new FormData(this);
    
    formData.append('oldEmail', mail)

    fetch('../ajax/modifyUser.php',
    {
        method: 'POST',
        body: formData
    }).then(function(response){
        
        return response.text();

    }).then(function(text){
        console.log(text);
        /* const div = document.getElementById("erreur");
        const res = text.split(':');

        if(res[0] === 'err'){

            div.innerHTML = "<div class='alert alert-danger' role='alert'>" + res[1] + '</div>';

        }else if(res[0] === 'validated'){

            div.innerHTML = "<div class='alert alert-success' role='alert'>" + res[1] + '</div>';
        }
        else{
            div.innerHTML = "<div class='alert alert-warning' role='alert'>Erreur: " + text + '</div>'
        } */
    })
})