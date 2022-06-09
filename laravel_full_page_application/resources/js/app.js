require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.Echo.channel('likes').listen('LikeToggle', function (data){
    // const { nft } = data

    const container = document.querySelector(`#nft_${data.nft.id}`)
    const count = container.querySelector('.collection-likes')
    count.textContent = data.nft.likes_count
    console.log(data)
})
