<template>
    <div>
        <!-- Icon -->
        <button v-if="icon" class="btn btn-light btn-sm rounded-circle right-0 fixed-top m-1 absolute" @click="followUser" 
        v-bind:class="{ 'text-primary': status}"><i class="fa fa-user-plus"></i></button>

        <!-- Just button with text -->
        <button v-else class="btn btn-light  btn-sm mt-5" @click="followUser" v-text="buttonText"
        v-bind:class="{ 'text-primary': status}"></button>
    </div>
</template>

<script>
    export default {
        props : ["user"],
        mounted() {
            console.log('Component mounted.')
        },
        data: function (){
                console.log(this);

            return{
                status:this.yser,
            }
        },
    }

</script>
