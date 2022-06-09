const nftCardsContainer = document.querySelector(".live-auctions-cards-container");
const nftCards = document.querySelectorAll(".live-auctions-cards .card");
const btnContainer = document.querySelector(".slide-btn-container");

const leftBtn = document.querySelector(".left-row");
const rightBtn = document.querySelector(".right-row");

rightBtn.addEventListener("click", function () {
    nftCardsContainer.scrollLeft += nftCardsContainer.offsetWidth + 30;

    const current = document.querySelector(".slide-btn-container .current");
    if (current.nextSibling) {
        current.nextSibling.classList.add("current");
        current.classList.remove("current");
    }
});

// event listener to left arrow

leftBtn.addEventListener("click", function () {
    nftCardsContainer.scrollLeft -= nftCardsContainer.offsetWidth + 30;

    const current = document.querySelector(".slide-btn-container .current");
    if (current.previousSibling) {
        current.previousSibling.classList.add("current");
        current.classList.remove("current");
    }
});

// bullets

const bullets = Math.floor(nftCards.length / 4);

for (let i = 0; i < bullets; i++) {
    const btn = document.createElement("div");
    btn.classList.add("slide-button");

    if (i === 0) {
        btn.classList.add("current");
    }

    btnContainer.appendChild(btn);

    btn.addEventListener("click", (e) => {
        nftCardsContainer.scrollLeft = i * (nftCardsContainer.offsetWidth + 30);
        document.querySelector(".slide-btn-container .current").classList.remove("current");

        e.target.classList.add("current");
    });
}






//Math.floor redondea a la baja y Math.ceil redondea a la alta
// const bullets = Math.floor(nftCards.length / 4);


// let i = 0;
// do {
//     const btn = document.createElement("div");
//     btn.classList.add("slide-button");
//     btnContainer.appendChild(btn);
//     i++;
// } while (i <= bullets - 1);
//
// const points = document.querySelectorAll(".slide-button");
//
// points.forEach(function (point, key) {
//     points[0].style.transform = "scale(1.3)";
//     points[0].style.background = "var(--on__surface)";
//     points[key].addEventListener("click", () => {
//         let position = key;
//         let operation = position * (-1410 - 30);
//
//         nftCardsContainer.style.transform = `translateX(${operation}px)`;
//
//         points.forEach((point, key) => {
//             point.style.transform = "scale(1)";
//             point.style.background = "var(--secondary__white)";
//         });
//         points[key].style.transform = "scale(1.3)";
//         points[key].style.background = "var(--on__surface)";
//     });
// });



// const leftBtn = document.querySelector('.left-row')
// const rightBtn = document.querySelector('.right-row')

// rightBtn.addEventListener('click', function(){
//     let operation = (-nftCardsContainer.offsetWidth - 30);
//     nftCardsContainer.style.transform = `translateX(${operation}px)`;
// })
//
// leftBtn.addEventListener('click', function(){
//     let operation = ((nftCardsContainer.offsetWidth + 30) - (nftCardsContainer.offsetWidth + 30));
//
//     nftCardsContainer.style.transform = `translateX(${operation}px)`;
// })

// points.forEach(function (point, key) {
//     points[0].style.transform = "scale(1.4)";
//
//     points[key].addEventListener("click", () => {
//         let position = key;
//         let operation = position * (-1410 - 30);
//
//         nftCardsContainer.style.transform = `translateX(${operation}px)`;
//
//         points.forEach((point, key) => {
//             point.style.transform = "scale(1)";
//         });
//         points[key].style.transform = "scale(1.4)";
//     });
// });


// rightBtn.addEventListener('click', function (e){
//     console.log('nell')
//     nftCardsContainer.scrollLeft += 1410
// })
//
// leftBtn.addEventListener('click', function (e){
//     nftCardsContainer.scrollLeft -= 1410
// })


//
// imageInput.onchange = function (){
//     const [file] = imageInput.files
//     if(file){
//         imagePreview.src = URL.createObjectURL(file)
//         imageURL.textContent = imageInput.value
//     }
// }

// price.onkeyup = function (){
//     if(price.value){
//         bidPrice.textContent = price.value + ' eTH'
//     }
// }
//
// title.onkeyup = function (){
//     if(title.value){
//         nftTitle.textContent = '"' + title.value +'"'
//     }
// }


// const imageInput = document.querySelector('.image__input')
// const imagePreview = document.querySelector('.card-img-container .image__preview')
// const imageURL =document.querySelector('.input__file--url')
//
// const price = document.querySelector('.price')
// const title = document.querySelector('.title')
//
// const bidPrice = document.querySelector('.bid-price')
// const nftTitle = document.querySelector('.nft-title')


// price?.addEventListener('input', function (e){
//     bidPrice.textContent = e.target.value
// })
//
// title?.addEventListener('input', function (e){
//     nftTitle.textContent = e.target.value
// })



