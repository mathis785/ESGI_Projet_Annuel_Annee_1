/* function recupIdProduct(idProduct){
    
    const idP = idProduct;
    
    localStorage.setItem('idProduct', `${idP}`);
    console.log(idP);

}

const deleteProduct = document.getElementById('deleteProduct');


deleteProduct.addEventListener('send', function (e) {
    e.preventDefault();

    let id = localStorage.getItem('idProduct');

    const formData = new FormData(this);

    formData.append('idProduct', id)
    
    fetch('../removeProduct.php',
    {
        method: 'POST',
        body: formData
    }).then(function(response){
        
        return response.text();

        console.log(text);
    }).then(function(text){
        console.log(text);
    })
}) */

function deleteProduct(id){;

    const request = new XMLHttpRequest();

    request.open("GET","/ajax/removeProduct.php?id="+id);
    
    request.onreadystatechange = function(){

        if(request.readyState === 4){
            const res = request.responseText;
            console.log(res);
        }
    };
    
    request.send();

}