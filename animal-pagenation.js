var preAnimals = document.getElementsByClassName('admin-animal');
const animals = [];
for(let i = 0; i < preAnimals.length;i++){
    animals.push(preAnimals[i]);
}

if(animals.length > 2){
    let bread = document.getElementById('pagenation');
    let ol = document.createElement('ol');
    ol.classList.add('breadcrumb');
    let i = 1;
    for(let left = animals.length;left > 0; left -= 10){
        let li = document.createElement('li')
        li.classList.add('breadcrumb-item')
        let a = document.createElement('a')
        a.setAttribute('href', '#animal-nav');
        a.classList.add('clickables');
        if(left == animals.length){
            li.setAttribute('aria-current', 'page')
            li.classList.add('active')
        }
        a.textContent = 'Page ' + i;
        li.appendChild(a);
        ol.appendChild(li);
        i++;
    }
    bread.appendChild(ol);
    for(let j = 10;j<animals.length;j++){
        animals[j].style.display = 'none';
    }
    
}
var currentPage = document.getElementsByClassName('breadcrumb-item')[0];

function changePage(e){
    console.log(e.target);
    if(e.target != currentPage){
        currentPage.classList.remove('active')
        currentPage.removeAttribute('aria-current')
        currentPage = e.target;
        currentPage.classList.add('active')
        currentPage.setAttribute('aria-current', 'page');
        let selectedStr = e.target.innerText.split(' ')[1];
        let selected = parseInt(selectedStr);
        // let i = 0;
        // let j = 0;
        // while(j < animals.length){
        //     if(animalFits(animals[j])){
        //         if(i >= 10*(selected-1)&& i < 10*selected){
        //             animals[i].style.display = 'flex';
        //         }
        //         else{
        //             animals[i].style.display = 'none';
        //         }
        //         i++;
        //     }
        //     else{

        //     }
        //     j++;
        // }
        for(let i = 0; i < animals.length; i++){
            if(i >= 10*(selected-1) && i < 10*selected){
                animals[i].style.display = 'flex'
            }
            else{
                animals[i].style.display = 'none';
            }
        }
    }
}
atags = document.getElementsByClassName('clickables');
for(let i = 0; i < atags.length;i++){
    atags[i].addEventListener('click',changePage);
}

var deleteButtons = document.getElementsByClassName('deleteAnimal');
for(let i = 0; i < deleteButtons.length;i++){
    deleteButtons[i].addEventListener('click',deleteAnimal);
}

function deleteAnimal(e){
    let idhe = e.currentTarget.parentElement.parentElement.firstElementChild;
    console.log(idhe.textContent);
    if(confirm("Are you sure you want to delete this animal?")){
        console.log('Teksti ' + idhe.textContent);
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
    if(xhttp.responseText == 'Finished'){
        target.remove();
        console.log(animals);
    }
    else{
        console.log(xhttp.responseText)
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

function animalFits(animal){
    
}