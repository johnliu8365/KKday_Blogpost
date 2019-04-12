<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Post;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    // 測試如果文章為空
    public function testEmptyResult()
    {
        $post = Post::all();

        // 確認 $articles 是 Collection
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $post);
        $this->assertCount(0, $post);
    }

    // 測試新增資料並列出
    public function testCreateAndList()
    {
        for ($i = 1; $i <= 10; $i ++) {
            factory(Post::class)->create();
        }

        // 確認有 10 筆資料
        $post = Post::all();
        $this->assertCount(10, $post);
    }

}
