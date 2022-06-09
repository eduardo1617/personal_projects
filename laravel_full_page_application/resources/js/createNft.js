const imageInput = document.querySelector('.image__input')


const imagePreview = document.querySelector('.card-img-container .image__preview')
const imageURL =document.querySelector('.input__file--url')

const price = document.querySelector('.price')
const title = document.querySelector('.title')

const bidPrice = document.querySelector('.bid-price')
const nftTitle = document.querySelector('.nft-title')

price.addEventListener('input', function (e){
    bidPrice.textContent = e.target.value + 'eTH'
})

title.addEventListener('input', function (e){
    nftTitle.textContent = e.target.value
})

imageInput.addEventListener('change', function (e){
    const [file] = e.target.files
    if(file){
        imagePreview.src = URL.createObjectURL(file)
        imageURL.textContent = imageInput.value
    }
})
