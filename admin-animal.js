var deleteButtons = document.getElementsByClassName('deleteAnimal');
for(let i = 0; i < deleteButtons.length;i++){
    deleteButtons[i].addEventListener('click',deleteAnimal);
}

function deleteAnimal(e){
    let idhe = e.currentTarget.parentElement.parentElement.firstElementChild;
    console.log(idhe.textContent);
    if(confirm("Are you sure you want to delete this animal?")){
        var str = './pages/deleteAnimal.php?id=' + idhe.textContent;
        loadDoc(str,deleted,e.currentTarget.parentElement.parentElement)
    }
}

loadDoc("url-1", deleted);

loadDoc("url-2", myFunction2);

function loadDoc(url, cFunction, target) {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {cFunction(this, target);}
  xhttp.open("GET", url);
  xhttp.send();
}

function deleted(xhttp, target) {
  target.remove();
  console.log(xhttp.responseText);
}
function myFunction2(xhttp) {
  // action goes here
}