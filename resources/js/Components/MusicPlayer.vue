<template>
    <div>
        <div
            class="
                fixed
                w-96
                h-32
                rounded-xl
                bg-white
                left-1/2
                transform
                -translate-x-1/2
                bottom-8
            "
        >
            <transition name="fade">
                <div
                    class="
                        absolute
                        w-3/4
                        h-20
                        bg-gray-200
                        bottom-full
                        left-1/2
                        transform
                        -translate-x-1/2
                        rounded-t
                    "
                    v-if="showInfo"
                >
                    <div class="my-2">
                        <span class="px-12 text-lg text-black">Daft Punk</span>
                        <br />
                        <span class="px-12 text-sm text-black"
                            >Digital Love</span
                        >
                    </div>
                    <div class="progress-bar mt-4">
                        <div class="bar"></div>
                    </div>
                </div>
            </transition>
            <div class="grid grid-cols-3 h-full">
                <div
                    class="
                        col-span-1
                        row-span-1
                        flex
                        justify-center
                        items-center
                    "
                >
                    <img
                        src="https://res.cloudinary.com/hyi9bajzn/image/upload/v1624789293/posts/posts_60d8512d23798.jpg"
                        alt=""
                        class="w-24 rounded-full"
                        :class="{ rotate: isPlaying }"
                    />
                </div>
                <div
                    class="
                        col-span-2
                        row-span-1
                        flex
                        justify-evenly
                        items-center
                    "
                >
                    <img
                        @click="previousSong"
                        src="/img/forward-button.svg"
                        alt="play"
                        class="w-8 h-8 cursor-pointer"
                        style="transform: scaleX(-1)"
                    />
                    <img
                        @click="playSong"
                        :src="
                            isPlaying
                                ? '/img/pause.svg'
                                : '/img/play-button.svg'
                        "
                        alt="play"
                        class="w-12 h-12 cursor-pointer"
                    />
                    <img
                        @click="nextSong"
                        src="/img/forward-button.svg"
                        alt="play"
                        class="w-8 h-8 cursor-pointer"
                    />
                </div>
            </div>
            <!-- <audio controls="controls">
                <source
                    src="https://res.cloudinary.com/hyi9bajzn/video/upload/v1624831122/musics/daft-punk-digital-love-official-audio_ueklbg.mp3"
                    type="audio/mpeg"
                />
                Your browser does not support the audio element.
            </audio> -->
        </div>
    </div>
</template>

<script>
export default {
    setup() {
        return {};
    },
    data() {
        return {
            audio: new Audio(
                "https://res.cloudinary.com/hyi9bajzn/video/upload/v1624831122/musics/daft-punk-digital-love-official-audio_ueklbg.mp3"
            ),
            isPlaying: false,
            showInfo: false,
        };
    },
    methods: {
        playSong() {
            if (this.isPlaying) {
                this.audio.pause();
                this.isPlaying = false;
                this.showInfo = false;
            } else {
                this.audio.play();
                this.isPlaying = true;
                this.showInfo = true;
            }
        },
        nextSong() {
            console.log("next");
        },
        previousSong() {
            console.log("previous");
        },
    },
};
</script>

<style lang="scss" scoped>
.progress-bar {
    height: 2px;
    width: 80%;
    background-color: white;
    margin: auto;
    position: relative;
    .bar {
        position: absolute;
        background-color: red;
        width: 20%;
        height: 2px;
    }
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 1s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}

.rotate {
    animation: rotation 2s infinite linear;
}

@keyframes rotation {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(359deg);
    }
}
</style>
