<template>
    <span class="">
        <button v-if="!tipo || (tipo != 'button' && tipo != 'link')" type="button" :class="css || 'btn btn-primary'" data-toggle="modal" :data-target="'#' + nome">
            <i :class=classButton></i> {{ titulo }}
        </button>

        <button v-if="tipo == 'button'" type="button" :class="css || 'btn btn-primary'" data-toggle="modal" :data-target="'#' + nome">
            <i :class=classButton></i> {{ titulo }}
        </button>

        <a v-if="tipo == 'link'" href="#" :class="css || ''" data-toggle="modal" :data-target="'#' + nome">{{ titulo }}</a>
    </span>
</template>

<script>
    export default {
        name: "ModalLink",
        // props: ['tipo','nome','titulo','css','classButton']
        props:{
            tipo: {
                type: String,
                default: ''
            },
            nome: {
                type: String,
                default: ''
            },
            titulo: {
                type: String,
                default: ''
            },
            css: {
                type: String,
                default: ''
            },
            classButton: {
                type: String,
                default: ''
            },
        }
    }
</script>

<style scoped>

</style>
