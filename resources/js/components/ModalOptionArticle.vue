<template>
    <!-- Modal -->
    <div class="modal fade show" id="exampleModalLong" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Opções</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="overflow:auto; max-height:24rem;">

                    <!-- Titulos -->
                    <div class="">
                        <p class="border-bottom mb-1  font-weight-bold ">Titulos</p>
                        <button data-dismiss="modal" class="btn btn-light py-1 mb-1" @click="add('\n#TITULO1')">Titulo 1</button>
                        <button data-dismiss="modal" class="btn btn-light py-1 mb-1" @click="add('\n##TITULO1')">Titulo 2</button>
                        <button data-dismiss="modal" class="btn btn-light py-1 mb-1" @click="add('\n###TITULO1')">Titulo 3</button>
                        <button data-dismiss="modal" class="btn btn-light py-1 mb-1" @click="add('\n####TITULO1')">Titulo 4</button>
                    </div>
                    <!-- Imagens -->
                    <div class="mt-4">
                        <p class="border-bottom mb-1  font-weight-bold">Imagens</p>
                        <button data-dismiss="modal" class="btn btn-light py-1 mb-1 " @click="add('![DESCRIÇÃO_IMAGEM](LINK_IMAGEM)')">Descritiva</button>
                        <button data-dismiss="modal" class="btn btn-light py-1 mb-1 " @click="add('![](LINK_IMAGEM)')">Simples</button>
                    </div>
                    <!-- Links -->
                    <div>
                        <p class="border-bottom mb-1 mt-3 mr-3 font-weight-bold">Links</p>
                        <button data-dismiss="modal" class="btn btn-light py-1 mb-1 " @click="add('[TITULO](LINK)')">Nomeado</button>
                        <button id="btn_exposto_pop" class="btn btn-light py-1 mb-1 "  @click="pop('btn_exposto_pop')" data-container="body" data-toggle="popover" data-placement="top" data-content="Basta indicar o link, não é necessario nenhuma ação. Ex: Eu sou um link https://facebook.com">Exposto</button>
                    </div>
                    <!-- Textos formatados -->
                    <div class="mt-4">
                        <p class="border-bottom mb-1  font-weight-bold">Formatos texto</p>
                        <button data-dismiss="modal" class="btn btn-light py-1 mb-1 " @click="add('\n>CITAÇÃO')">Citação</button>
                        <button data-dismiss="modal" class="btn btn-light py-1 mb-1 " @click="add('\n```\nCODE\n```')">Multi Code</button>
                        <button data-dismiss="modal" class="btn btn-light py-1 mb-1 " @click="add('`CODE`')">Code</button>
                        <button data-dismiss="modal" class="btn btn-light py-1 mb-1 " @click="add('\n```javascript\nCODE_COM_LINGUAGEM\n```')">Multi Code Definido</button>
                    </div>
                    <!-- Estilos de texto -->
                    <div class="mt-4">
                        <p class="border-bottom mb-1  font-weight-bold">Estilos de text</p>
                        <button data-dismiss="modal" class="btn btn-light py-1 mb-1 " @click="add('**NEGRITO**')">Negrito</button>
                        <button data-dismiss="modal" class="btn btn-light py-1 mb-1 " @click="add('*ITALICO*')">Italico</button>
                        <button data-dismiss="modal" class="btn btn-light py-1 mb-1 " @click="add('_SUBLINHADO_')">Sublinhado</button>
                        <button data-dismiss="modal" class="btn btn-light py-1 mb-1" @click="add('~~RISCADO~~')">Riscado</button>
                    </div>
                    <!-- LISTAS -->
                    <div class="mt-4">
                        <p class="border-bottom mb-1  font-weight-bold">Listas</p>
                        <button data-dismiss="modal" class="btn btn-light py-1 mb-1 " @click="add('\n1. Texto\n2. Texto')">Numerada</button>
                        <button data-dismiss="modal" class="btn btn-light py-1 mb-1 " @click="add('\n- Texto\n- Texto')">Marcada</button>
                        <button data-dismiss="modal" class="btn btn-light py-1 mb-1 " @click="add('\n1. First list item\n   - First nested list item\n      - Second nested list item\n')">Aninhada</button>
                        <button data-dismiss="modal" class="btn btn-light py-1 mb-1 " @click="add('\n- [x] Texto\n- [ ] Texto')">Tarefa</button>
                    </div>
                    <!-- Tabelas -->
                    <div class="mt-4">
                        <p class="border-bottom mb-1  font-weight-bold">Tabelas</p>
                        <button class="btn btn-light py-1 mb-1 " @click="add('\n| T1        | T2           |\n| ------------- |:-------------:|')">Titulo 1x2</button>
                        <button class="btn btn-light py-1 mb-1 " @click="add('\n| T1        | T2           | T3 |\n| ------------- |:-------------:| -----:|')">Titulo 1x3</button>
                        <button class="btn btn-light py-1 mb-1 " @click="add('\n| C1        | C2           |')">Linha 1x2</button>
                        <button class="btn btn-light py-1 mb-1 " @click="add('\n| C1        | C2           | C3 |')">Linha 1x3</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        methods: {
            add(text) {
                var textarea = document.getElementById("content");
                var content = textarea.value.substring(0, textarea.selectionStart) + text + textarea.value.substring(
                    textarea.selectionEnd, textarea.value.length);
                textarea.value = content;
            },
            pop(id) {
                $("#"+id).popover('show');
            }
        },
        computed: {
            classChange() {
                console.log(this.status);
                return (this.status) ? "text-blue" : "";
            },
            buttonText() {
                return (this.status) ? "Seguindo" : "Seguir";
            }
        }
    }

</script>
