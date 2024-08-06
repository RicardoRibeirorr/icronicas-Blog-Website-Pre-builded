<template>
    <div>
        <!-- Icon -->
        <!-- <button v-if="icon" class="btn btn-light btn-sm rounded-circle right-0 fixed-top m-1 absolute" @click="followUser" 
        v-bind:class="{ 'text-primary': status}"><i class="fa fa-user-plus"></i></button> -->

        <!-- Just button with text -->
        <button class="btn btn-primary btn-sm mt-5" v-text="buttonText" @click="followUser"
        v-bind:class="{ 'btn-light border text-muted': status}"></button>

        <!-- Modal -->
            <div class="modal fade" id="unfollow_model" tabindex="-1" role="dialog" aria-labelledby="unfollow_modelTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-body">
                        <p class="py-2">Deseja deixar de seguir este utilizador?</p>
                        <div class="container"> 
                            <div class="row">
                                <div class="col-12 pb-2 border-top">
                                        <button type="button" class="btn btn-light w-100 bg-white border-0 text-danger"  @click="followUser(null,true)" data-dismiss="modal" >Deixar de seguir</button>
                                </div>
                                <div class="col-12 pb-2 border-top">
                                         <button type="button" class="btn btn-light w-100 bg-white border-0" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    </div> 
                </div>
            </div>
    </div>
</template>

<script>
    export default {
        props : ["userId","follows","icon"],
        mounted() {
            console.log('Component mounted.')
        },
        data: function (){
                console.log(this);

            return{
                status:this.follows,
            }
        },
        methods:{
            followUser(ev,allow = false) {
                console.log(allow);
                if (this.status == true && allow == false) {
                    $('#unfollow_model').modal({
                        show: true
                    })
                } else {
                    axios.post("/follow/" + this.userId)
                        .then(response => {
                            this.status = !this.status;
                        })
                        .catch(errors => {
                            console.log(errors);
                        })
                }
            }
        },
        computed:{
            classChange(){
                console.log(this.status);
                return (this.status) ? "text-blue" : "";
            },
            buttonText(){
                return (this.status) ? "Seguindo" : "Seguir";
            }
        }
    }

</script>
