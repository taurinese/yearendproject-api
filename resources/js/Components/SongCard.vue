<template>
    <div class="w-48 m-auto">
        <div class="song-card overflow-y-hidden relative grid grid-cols-1 grid-flow-row w-48">
            <a href="">
                <img src="https://picsum.photos/640/400/?random"
                    alt="Placeholder"
                    class="song-cover rounded-xl w-full h-48 col-span-1 row-span-1"/>
                    <span class="text-white col-span-1 row-span-1">Discovery</span><br>
                    <span class="text-gray-500 col-span-1 row-span-1">Daft Punk</span>
                    <img class="play-icon absolute right-0 bottom-0 -translate-y-1/2" src="img/play-button.svg" alt="play button">
            </a>
        </div>
    </div>
</template>

<script>
export default {
    name: 'SongCard'
}
</script>

<style lang="scss" scoped>
   .hover\:shadow-xl:hover {
        --tw-shadow: 0 20px 25px -5px rgba(255, 255, 255, 0.1), 0 10px 10px -5px rgba(255, 255, 255, 0.04);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    }
    .play-icon{
        filter: brightness(0) invert(1);
        width:30px;
        height:30px;
        display:inline-block;
        transform:translate(0px, -25%);
    }
    .song-card{
        &:hover{
            .song-cover{
                opacity:0.8;
            }
        }
    }
</style>