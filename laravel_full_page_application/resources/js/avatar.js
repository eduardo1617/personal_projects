const imageInput = document.querySelector('.avatar__input')
const imageURL =document.querySelector('.input__avatar--url')
const imagePreview = document.querySelector('.avatar__preview--container .avatar__preview')


imageInput.addEventListener('change', function (e){
    const [file] = e.target.files
    if(file){
        imagePreview.src = URL.createObjectURL(file)
        imageURL.textContent = imageInput.value
    }
})
