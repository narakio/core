<?php

namespace Tests\Feature;

use App\Models\Blog\BlogPostCategory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class BlogCategoryTest extends TestCase
{
    use DatabaseMigrations, WithoutMiddleware;

    public function test_create_category()
    {
        $str = 'First root node';
        $response = $this->postJson(
            "/ajax/admin/blog/categories",
            ['label' => $str, 'parent' => '']);
        $response->assertStatus(200)
            ->assertJson(['id' => slugify($str)]);
        $str2='Second node';
        $this->postJson(
            "/ajax/admin/blog/categories",
            ['label' => $str2, 'parent' => slugify($str)]);
        $this->assertEquals(BlogPostCategory::query()->get()->count(), 3);
    }

    public function test_show()
    {
        $response = $this->getJson('/ajax/admin/blog/categories');
        $response->assertStatus(200);
    }

    public function test_delete()
    {
        $str = 'First root node';
        $this->postJson(
            "/ajax/admin/blog/categories",
            ['label' => $str, 'parent' => '']);
        $this->assertEquals(BlogPostCategory::query()->get()->count(), 2);
        $response = $this->deleteJson(
            "/ajax/admin/blog/categories/".slugify($str));
        $response->assertStatus(204);
        $this->assertEquals(BlogPostCategory::query()->get()->count(), 1);
    }

}