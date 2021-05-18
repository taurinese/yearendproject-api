<template>
    <div class="px-48 mt-12">
        <app-layout />
        <h2 class="text-xl text-white font-bold">Titre de la news</h2>
        <div class="pt-12 flex flex-col justify-center">
            <div class="mt-12">
                <img src="https://picsum.photos/640/400/?random" alt="contact"
                class="rounded-xl w-2/3 h-96 mx-auto">
            </div>
            <div class="mt-12">
                <p class="text-white">
                    Voilà dans la maison et tout les gens qui s’amusent wow la vie est vraiment cool je 
                    m’amuse sgiesn igusn uisengu nsgui nsuig signesignsei nsegin sign sng sing sing usi
                    sgnesgiusngisngins nseg. <br>

                    esgnseiugnsei seign seign sein gseng sinusognsignseion soing sioesgeion iosegn ioe
                    lorem ipsum bla bla bla bla bla bla bla. <br>

                    Bla bla bla sheeeeeeeeeeeeeesh
                </p>
                <p class="px-2 md:px-4 text-sm italic text-right text-white mt-12"> par author le datetime</p>
            </div>
        </div>
    </div>
</template>

<script>
import AppLayout from '../Layouts/AppLayout.vue'


    export default{
        components: { AppLayout }, 
        
    }
</script>

<style lang="scss" scoped>

</style>