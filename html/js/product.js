

const addProduct = document.getElementById('addProduct');


addProduct.addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    
    fetch('../addProduct.php',
    {
        method: 'POST',
        body: formData
    }).then(function(response){
        
        return response.text();

        console.log(text);
    }).then(function(text){
        const div = document.getElementById("erreur");
        const res = text.split(':');

        if(res[0] === 'err'){

            div.innerHTML = "<div class='alert alert-danger' role='alert'>" + res[1] + '</div>';

        }else if(res[0] === 'validated'){

            div.innerHTML = "<div class='alert alert-success' role='alert'>" + res[1] + '</div>';
        }
        else{
            div.innerHTML = "<div class='alert alert-warning' role='alert'>Erreur: " + text + '</div>'
        }
    })
})



function recupId(idUser){
    
    const id = idUser;
    
    localStorage.setItem('idUser', `${id}`);

}

function deleteUser(){;

    
    let id = localStorage.getItem('idUser');

    const request = new XMLHttpRequest();

    request.open("GET","/ajax/suppression.php?id="+id);
    
    request.onreadystatechange = function(){

        if(request.readyState === 4){
            const res = request.responseText;
            console.log(res);
        }
    };
    
    request.send();

}
