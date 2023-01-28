var animals = document.getElementsByClassName('admin-animal');

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
