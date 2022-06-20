<template>
    <div :id=nome class="modal fade" tabindex="-1" role="dialog" :aria-labelledby="nome" aria-hidden="true">
        <div :class="'modal-dialog ' + tamanhoModal || 'modal-lg'"  role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ tituloModal }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <slot></slot>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ModalComponent.vue",
        props: ['nome','tituloModal', 'tamanhoModal']
    }
</script>

<style scoped>

</style>
