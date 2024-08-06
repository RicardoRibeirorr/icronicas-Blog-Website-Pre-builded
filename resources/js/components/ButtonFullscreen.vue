<template>
    <div>
        <button id="fullscreen_btn" type="button" class="btn btn-link  btn-sm fullscreen" @click="extend" ><i class="fa fa-expand"></i></button>
    </div>
</template>

<script>
    export default {
        props : ["el_id"],
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
            extend(){
              var el=document.getElementById(this.el_id);
              var btnFullscreen=document.getElementById("fullscreen_btn");
              var btnOption=document.getElementById("options_btn");
              if(el.style.position=="fixed"){
                el.style.position = null;el.style.top = null; el.style.left = null;el.style.width = null;el.style.height = null;el.style.padding = null;
                btnFullscreen.style.position = null;btnFullscreen.style.top = null; btnFullscreen.style.right = null;
                btnOption.style.position = null;btnOption.style.top = null; btnOption.style.right = null;btnOption.style.zIndex = null;btnOption.style.color = null;btnOption.style.border = null;
              }else{
              el.style.position = "fixed";el.style.top = "0";el.style.left = "0";el.style.width = "100%";el.style.height = "100%";el.style.padding = "1.5rem";
              btnFullscreen.style.position = "fixed";btnFullscreen.style.top = "0.3rem";btnFullscreen.style.right = "1rem";
              btnOption.setAttribute( 'style', 'border:none !important' );btnOption.style.position = "fixed";btnOption.style.top = "3rem";btnOption.style.right = "1rem";btnOption.style.zIndex = "100";btnOption.style.color = "blue";
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
