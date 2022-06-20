<template>
    <modal v-bind="$attrs" v-on="$listeners" :clickToClose=false>
        <div class="modal-header">
          <h5 class="modal-title">{{ title }}</h5>
          <button @click="close" type="button" class="close">X</button>
        </div>
        <div class="modal-body">
            <slot></slot>
        </div>
        <div class="modal-footer">
            <slot name="buttons"></slot>
        </div>
    </modal>
</template>

<script>
import VModal from 'vue-js-modal'

export default {
    props: ['title','obj'],
    data: function(){
        return {

        }
    },
    methods: {
        close: function(){
            this.$modal.hide(this.$attrs.name)
        }
    },
    components: { 'vuemodal': VModal },
    inheritAttrs: false
}
</script>

<style>
    button.close{
        color: #000;
        opacity: 1;
        font-size: 26px;
    }
    button.close:hover, button.close:active{
        color: #d3d3d3;
    }
</style>
