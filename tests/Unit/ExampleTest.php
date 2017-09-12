<?php

namespace Tests\Unit;

use App\Post;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    // essa trait rollbacks todas as transações realizadas
    // não limpa o banco. apenas desfaz a transações realizadas
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
//        $this->assertTrue(true);
        // Given eu tenho dois registros no banco de dados que são posts
        // e que cada um foi submetido com um mês de distância

        $first = factory(Post::class)->create();
        $second = factory(Post::class)->create([
            // overrides as informações padronizadas
            'created_at' => Carbon::now()->subMonth()
        ]);

        // When eu consulto os arquivos
        $posts = Post::archives();


        // Then a resposta deverá vir no formato correto
        $this->assertCount(2, $posts);
        $this->assertEquals([
            [
                "year" => $first->created_at->format('Y'),
                "month" => $first->created_at->format('F'),
                "published" => 1
            ],
            [
                "year" => $second->created_at->format('Y'),
                "month" => $second->created_at->format('F'),
                "published" => 1
            ]
        ], $posts);
    }
}
