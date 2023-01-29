var deleteButtons = document.getElementsByClassName('deleteAnimal');
for(let i = 0; i < deleteButtons.length;i++){
    deleteButtons[i].addEventListener('click',deleteAnimal);
}

function deleteAnimal(e){
    let idhe = e.currentTarget.parentElement.parentElement.firstElementChild;
    console.log(idhe.textContent);
    if(confirm("Are you sure you want to delete this animal?")){
        var str = 'deleteAnimal.php?id=' + idhe.textContent;
        loadDoc(str,deleted,e.currentTarget.parentElement.parentElement)
    }
}

function loadDoc(url, cFunction, target) {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {cFunction(this, target);}
  xhttp.open("GET", url);
  xhttp.send();
}

function deleted(xhttp, target) {
    if(xhttp.responseText == 'Finished')
        target.remove();
    else{
        alert('Could not delete animal');
    }
}
function myFunction2(xhttp) {
  // action goes here
}

console.log('Edon');
var viewButtons = document.getElementsByClassName('viewAnimal');
for(let i = 0; i < viewButtons.length; i++){
    viewButtons[i].addEventListener('click',viewAnimal);
}

function viewAnimal(e){
    console.log(idnum);
    var idholder = e.currentTarget.parentElement.parentElement.firstElementChild.innerHTML;
    var idnum = parseInt(idholder);
    window.location.href = "viewAnimal.php?id="+idnum;
}



