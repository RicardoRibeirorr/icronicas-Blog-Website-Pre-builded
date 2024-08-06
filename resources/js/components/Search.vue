<template>
        <div class="dropdown d-flex col-9 col-sm-4 col-md-6 px-0 justify-content-sm-start justify-content-md-end">
            <input type="text" class="form-control search dropdown-toggle w-auto" @input="requestAction" data-toggle="dropdown" placeholder="Procurar..">
            <div class="dropdown-menu search-menu w-100" aria-labelledby="dropdown_user">
                <div class="menuItems">
                    
                    <a  v-for="item in articles" class="dropdown-item" :href="'/a/'+item.id">{{item["title"]}}</a>
                    <span v-if="articles.length<=0" class="dropdown-item text-muted" >Sem resultados</span>
                    

                </div>
            </div> 
    </div>
</template>

<script>
    export default {
        props: ["user"],
        mounted() {
            console.log('Component newwe.')
        },
        data: function () {

            return {
                articles: []
            }
        },
        methods:{
            requestAction(event){
                if(event.target.value!="" && event.target.value!=" " && event.target.value!=null){
                    axios.post("/search/" + event.target.value)
                    .then(response=>{
                        this.articles = response.data;
                        console.log(this.articles);
                        console.log(response.data);
                    })
                    .catch(errors =>{
                        console.log(errors)
                    })
                }
            }
        }
    }

</script>
