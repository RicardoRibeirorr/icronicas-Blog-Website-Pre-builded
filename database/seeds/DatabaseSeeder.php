<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->users();
        $this->categories();
        $this->articles();
    }


    public function users(){
        DB::table('users')->insert(['name' => "Icronica",'description' => "Uma visão alternativa para ocupar o seu tempo com valor. Tem alguma questão ou ideia para melhorar os nossos serviços? Contacte-nos: geral@iconnicws.com","email"=>"geral@iconnicws.com","password"=>"123456789"]);
    }

    public function categories(){
        // Estilo de vida
        DB::table('category_sections')->insert(['id' => "1",'name' => "Estilo de vida"]);
        DB::table('categories')->insert(['category_sections_id'=>'1','id' => "1",'name' => "Vida",'description' => "Blog, opiniões, segredos de vivências, saúde, ..."]);
        DB::table('categories')->insert(['category_sections_id'=>'1','id' => "2",'name' => "Trabalho",'description' => "Blog, Opiniões, relações, segredos, esclarecimentos, ..."]);

        // Tecnologias
        DB::table('category_sections')->insert(['id' => "2",'name' => "Tecnologias "]);
        DB::table('categories')->insert(['category_sections_id'=>'2','id' => "3",'name' => "Programação",'description' => "Tutoriais, novas tecnologias, dicas, ..."]);
        DB::table('categories')->insert(['category_sections_id'=>'2','id' => "4",'name' => "Robótica",'description' => "Tutoriais, novas tecnologias, dicas, ..."]);
        DB::table('categories')->insert(['category_sections_id'=>'2','id' => "5",'name' => "Informática",'description' => "Tutoriais, novas tecnologias, dicas, ..."]);

        // Entretenimento
        DB::table('category_sections')->insert(['id' => "3",'name' => "Entretenimento"]);
        DB::table('categories')->insert(['category_sections_id'=>'3','id' => "6",'name' => "Jogos",'description' => "Opiniões, tutoriais... sobre jogos de video, jogos de mesa..."]);
        DB::table('categories')->insert(['category_sections_id'=>'3','id' => "7",'name' => "Piadas",'description' => "Anedotas, memes, piadas..."]);
        DB::table('categories')->insert(['category_sections_id'=>'3','id' => "8",'name' => "Desporto",'description' => "Opiniões, dicas, "]);

        // Áreas
        DB::table('category_sections')->insert(['id' => "4",'name' => "Áreas Profissionais"]);
        DB::table('categories')->insert(['category_sections_id'=>'4','id' => "9",'name' => "Letras",'description' => "Tradução, escritura, ..."]);
        DB::table('categories')->insert(['category_sections_id'=>'4','id' => "10",'name' => "Musica",'description' => "Composição, Maestro, ..."]);
        DB::table('categories')->insert(['category_sections_id'=>'4','id' => "11",'name' => "Economia",'description' => "Empresas, negocios, opiniões, experiencias, ..."]);
        DB::table('categories')->insert(['category_sections_id'=>'4','id' => "12",'name' => "Ciência",'description' => "Descobertas, opiniões, esclarecimentos, ..."]);

        // Gastronomia
        DB::table('category_sections')->insert(['id' => "5",'name' => "Gastronomia "]);
        DB::table('categories')->insert(['category_sections_id'=>'5','id' => "13",'name' => "Culinária",'description' => "Receitas, opiniões... sobre culinária tradicional, ..."]);
        DB::table('categories')->insert(['category_sections_id'=>'5','id' => "14",'name' => "Padaria",'description' => "Receitas, opiniões... sobre bolos, pão..."]);
    }

    public function articles(){
        DB::table('articles')->insert(['title' => "Criar artigo em Icronica","user_id"=>"1",'description' => "Truques e dicas para criar o seu primeiro artigo Icronica, merecedor de 100 IcronicaStars!","content"=>"Em desenvolvimento!","category_id"=>"2"]);
        DB::table('articles')->insert(['title' => "Markdown/Comandos Icronica","user_id"=>"1",'description' => "Lista de Markdowns/Comandos para criar os seus artigos bonitos, atraentes e a todo o gás!","content"=>"Em desenvolvimento!","category_id"=>"2"]);
    }
}
