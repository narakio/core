<?php namespace App\Http\Controllers\Ajax\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class BlogPostCategory extends Controller
{
    public function index()
    {
        return \App\Support\Trees\BlogPostCategory::getTree();
    }

    public function create()
    {
        $id = $this->request->get('id');
        $label = $this->request->get('label');
        if (is_null($label)) {
            return response('', Response::HTTP_NO_CONTENT);
        }
        $newCat = new \App\Models\Blog\BlogPostCategory(
            [
                'blog_post_category_name' => $label,
                'blog_post_category_codename' => makeHexUuid()
            ]);
        if (!is_null($id)) {
            $parentCategory = $this->getCat($id);
            if (!is_null($parentCategory)) {
                $newCat->appendToNode($parentCategory);
            } else {
                return response('', Response::HTTP_NO_CONTENT);
            }
        }
        $newCat->save();
        return ['id' => $newCat->getAttribute('blog_post_category_codename')];

    }

    public function update($id)
    {
        $cat = $this->getCat($id);
        if (!is_null($cat)) {
            $label = $this->request->get('label');
            $cat->setAttribute('blog_post_category_name', $label);
            $cat->save();
        }
        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function delete($id)
    {
        if (strlen($id) == 32 && ctype_xdigit($id)) {
            $model = \App\Models\Blog\BlogPostCategory::query()
                ->where('blog_post_category_codename', $id)->first();
            if (!is_null($model)) {
                $model->delete();
            }
        }
        return response(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @param string $id
     * @return \App\Models\Blog\BlogPostCategory|null
     */
    private function getCat($id)
    {
        if (strlen($id) == 32 && ctype_xdigit($id)) {
            return \App\Models\Blog\BlogPostCategory::query()
                ->where('blog_post_category_codename', $id)->first();
        }
        return null;
    }

}