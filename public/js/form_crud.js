const title = document.querySelector('#title');
const slug  = document.querySelector('#slug');

title.addEventListener('change', function(){
    fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
});

const nameCategories = document.querySelector('#name');
const slugCategories  = document.querySelector('#slug');

title.addEventListener('change', function(){
    fetch('/dashboard/categories/checkSlug?name=' + nameCategories.value)
        .then(response => response.json())
        .then(data => slugCategories.value = data.slugCategories)
});

document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
});

function goBack() {
    window.history.back();
}

function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
    }
}