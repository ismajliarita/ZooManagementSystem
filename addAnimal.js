/**
 * @params {File[]} files Array of files to add to the FileList
 * @return {FileList}
 */
function FileListItems(files) {
    var b = new ClipboardEvent("").clipboardData || new DataTransfer()
    for (var i = 0, len = files.length; i < len; i++) b.items.add(files[i])
    return b.files
}

var files = [
    new File(['content'], 'sample1.txt'),
    new File(['abc'], 'sample2.txt')
];


//   console.log(fileInput.files)


var photos = [];
var flag = true;
var addClicked = false;

function handlePhotos() {
    photos = [];
    let fotot = document.getElementById('photos');
    for (let i = 0; i < fotot.files.length; i++) {
        photos.push(fotot.files[i]);
    }
    addClicked = true;
    fotot.click();
    console.log('Edon');
}

function addPhoto() {
    console.log(photos);
    if (flag) {
        createAddButton();
        flag = false;
    }

    var newPhotos = [];
    let inputi = document.getElementById('photos');
    let length = inputi.files.length;
    console.log(addClicked);
    if (addClicked) {
        for (let i = 0; i < photos.length; i++) {
            newPhotos.push(photos[i]);
        }
        addClicked = false;
        console.log(addClicked);

    }
    for (let i = 0; i < inputi.files.length; i++) {
        newPhotos.push(inputi.files[i]);
    }
    photos = newPhotos;
    inputi.files = new FileListItems(photos)
    console.log(photos)

    // photos = document.getElementById('photos').files;
}
function createAddButton() {
    let inputi = document.getElementById('photos')
    let button = document.createElement('button')
    button.classList.add('btn')
    button.classList.add('btn-warning');

    button.setAttribute('id', 'addAnother');
    button.setAttribute('type', 'button');
    button.innerHTML = 'Add another'
    inputi.insertAdjacentElement("afterend", button);
    button.addEventListener('click', handlePhotos)
}

function concatenate(arr1, arr2) {
    var array = new DataTransfer();
    for (let i = 0; i < arr1.length; i++) {
        for (let j = 0; j < arr2.length; j++) {
            if (arr1[i] == arr2[j]) {
                continue;
            }
            if (j == arr2.length - 1) {
                console.log(200)
                array.items.add(arr1[i]);
            }
        }
    }
    for (let i = 0; i < arr2.length; i++) {
        for (let j = 0; j < arr1.length; j++) {
            if (arr2[i] == arr1[j]) {
                continue;
            }
            if (j == arr1.length - 1) {
                array.add(arr2[i]);
            }
        }
    }
    return array.items;
}

function addAnimal() {
    document.getElementById('addAnimalForm').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';

}
document.getElementById('overlay').addEventListener('click', () => {
    document.getElementById('addAnimalForm').style.display = 'none';
    document.getElementById('editFormFixed').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
})

var fotot = document.getElementById("photos");

// Get the image element
var div = document.getElementById("animal-photos");

// Create a FileReader object
var reader = new FileReader();

// Add an event listener for when the file has been read
// reader.addEventListener("load", function () {
//     // Set the src of the img element to the data URL of the file
//     let foto = document.createElement('img');
//     foto.src = reader.result;
//     fotot.appendChild(foto);
// }, false);

function loadPhotos() {
    var length = fotot.files.length;
    for (let i = 0; i < length; i++) {
        readFile(i);
    }
}
function readFile(index) {
    var file = fotot.files[index];

    // Check if the file is an image
    if (file.type.match(/image.*/)) {
        // Read the file as a data URL
        reader.readAsDataURL(file);
    } else {
        // Display an error message
        console.log("File is not an image.");
    }
}
function handleMultiples() {
    addPhoto();
}
document.getElementById('photos').addEventListener('change', handleMultiples)
// Add an event listener for when a file is selected
// input.addEventListener("change", function () {
//     // Get the first file from the input
//     var file = input.files[0];

//     // Check if the file is an image
//     if (file.type.match(/image.*/)) {
//         // Read the file as a data URL
//         reader.readAsDataURL(file);
//     } else {
//         // Display an error message
//         console.log("File is not an image.");
//     }
// }, false);
function editAnimal(e) {
    var animalId = e.currentTarget.parentElement.parentElement.firstElementChild.innerHTML;
    console.log(animalId);
    document.getElementById('editFormFixed').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
    let url = 'getAnimalEdit.php?id='+animalId;
    loadDoc(url, displayAttributes, animalId);
}
function loadDoc(url, cFunction, target) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () { cFunction(this, target); }
    xhttp.open("GET", url);
    xhttp.send();
}

function displayAttributes(stmt, target){
    var response = stmt.responseText;
    var element = document.createElement('div');
    element.innerHTML = response;
    var elements = element.firstElementChild.children;
    document.getElementById('edit-animal-name').value = elements[0].innerHTML;
    document.getElementById('edit-animal-type').value = elements[1].innerHTML;
    document.getElementById('edit-animal-age').value = elements[2].innerHTML;
    document.getElementById('edit-animal-desc').value = elements[3].innerHTML;
    let uppercase = elements[4].innerHTML;
    let lowercase = uppercase.toLowerCase();
    let selector = 'edit-' + lowercase;
    console.log(selector);
    document.getElementById(selector).checked = true;
}

var editButtons = document.getElementsByClassName('editAnimal');
for (let i = 0; i < editButtons.length; i++) {
    editButtons[i].addEventListener('click', editAnimal);
}
