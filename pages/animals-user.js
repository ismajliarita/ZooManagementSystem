var animals = document.getElementsByClassName('flip-card');

if(animals.length > 2){
    let bread = document.getElementById('pagenation');
    
    let ul = document.createElement('ul');
    ul.classList.add('pagebox');
    
    let i = 1;
    
    let zoZo_Z = document.createElement('li');
    zoZo_Z.setAttribute('id', 'the_Z');
    zoZo_Z.textContent = 'Z';
    
    zoZo_Z.style.marginRight="2.5px";
    zoZo_Z.style.display="inline";
    
    ul.appendChild(zoZo_Z);

    for(let left = animals.length; left > 0; left -= 9){
        
        let li = document.createElement('li');
        li.classList.add('pagebox-item');

        let a = document.createElement('a');
        a.setAttribute('href', '#topOfPage');
        a.classList.add('clickables');

        if(left == animals.length){
            li.setAttribute('aria-current', 'page');
            li.classList.add('active');
        }

        let div1 = document.createElement('div');
        a.classList.add('theOandI');
        div1.textContent="O ";

        let div2 = document.createElement('div');
        a.classList.add('theOandI');
        div2.textContent = i;
        
    //  CSS
    a.style.color="black";

    li.style.textAlign="center";
    li.style.marginRight="2.5px";
    li.style.display="inline";
    
    zoZo_Z.style.fontSize="1.5rem";
    zoZo_Z.style.fontWeight="italics";
    
    div1.style.fontSize="1.5rem";
    div1.style.fontWeight="italics";
    
    div2.style.marginTop ="-9px";
    div2.style.fontSize = "0.8rem";
    
    ul.style.display="flex";
    ul.style.backgroundColor = "white";
    ul.style.paddingTop = "5px";
    ul.style.paddingBottom = "5px";
    ul.style.paddingRight = "20px";
    ul.style.paddingLeft = "20px";
    ul.style.borderRadius = "15%";
        
    //  appending repeatable elements  
        a.appendChild(div1);
        a.appendChild(div2);
        li.appendChild(a);
        ul.appendChild(li);
        i++;
    }
//  appending unrepeatable elements  
    bread.appendChild(ul);

    for(let j = 9; j<animals.length; j++){
        animals[j].style.display = 'none';
    }
    
}

//Event listener
var currentPage = document.getElementsByClassName('pagebox-item')[0];

function changePage(e){
    console.log(e.currentTarget);
    if(e.currentTarget != currentPage){
        currentPage.classList.remove('active')
        currentPage.removeAttribute('aria-current')
        currentPage = e.currentTarget;
        currentPage.classList.add('active')
        currentPage.setAttribute('aria-current', 'page');

        let selectedStr = currentPage.children[1].innerHTML;
        console.log(selectedStr);

        // let selectedStr = e.currentTarget.innerText.split(' ')[1];
        let selected = parseInt(selectedStr);
        // console.log(selected);
        for(let i = 0; i < animals.length; i++){
            if(i >= 9 * (selected-1) && i < 9 * selected){
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
