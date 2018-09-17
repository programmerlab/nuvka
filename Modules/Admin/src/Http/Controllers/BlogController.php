<?php

declare(strict_types=1);

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Input;
use Modules\Admin\Helpers\Helper as Helper;
use Modules\Admin\Http\Requests\BlogRequest;
use Modules\Admin\Models\Blogs;
use Modules\Admin\Models\Category;
use Modules\Admin\Models\User;
use Route;
use View;

/**
 * Class AdminController
 */
class BlogController extends Controller
{
    /**
     * @var  Repository
     */

    /**
     * Displays all admin.
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
        $this->middleware('admin');
        View::share('viewPage', 'blog');
        View::share('helper', new Helper);
        View::share('route_url', route('blog'));
        View::share('heading', 'Blogs');

        $this->record_per_page = Config::get('app.record_per_page');
    }

    public function ajax(Request $request, Blogs $blog)
    {
        if ($request->file('file')) {
            $photo           = $request->file('file');
            $destinationPath = storage_path('blog');
            $photo->move($destinationPath, time() . $photo->getClientOriginalName());
            $blog_image         = time() . $photo->getClientOriginalName();
            $blog->blog_image   =   $blog_image;
        }

        exit();
    }
    /*
     * Dashboard
     * */

    public function index(Blogs $blog, Request $request)
    {
        $page_title  = 'Blog';
        $page_action = 'View Blog';

        // Search by name ,email and group
        $search = Input::get('search');

        if ((isset($search) && !empty($search))) {
            $search = isset($search) ? Input::get('search') : '';

            $blog = Blogs::where(function ($query) use ($search) {
                if (!empty($search)) {
                    $query->Where('blog_title', 'LIKE', "%$search%");
                }
            })->Paginate($this->record_per_page);
        } else {
            $blog  = Blogs::orderBy('id', 'desc')->Paginate(10);
        }

        return view('packages::blog.index', compact('blog', 'page_title', 'page_action'));
    }

    /*
     * create  method
     * */

    public function create(Blogs $blog)
    {
        $page_title  = 'Blog';
        $page_action = 'Create Blog';
        $categories  = Category::all();
        $type        = ['Stories' => 'Stories','News' => 'News','Tips' => 'Tips'];

        return view('packages::blog.create', compact('blog', 'page_title', 'page_action', 'categories', 'type'));
    }

    /*
     * Save Group method
     * */

    public function store(BlogRequest $request, Blogs $blog)
    {
        if ($request->file('blog_image')) {
            $photo           = $request->file('blog_image');
            $destinationPath = storage_path('blog');
            $photo->move($destinationPath, time() . $photo->getClientOriginalName());
            $blog_image         = time() . $photo->getClientOriginalName();
            $blog->blog_image   =   $blog_image;
        }

        $categoryName = $request->get('blog_category');
        $cn           = '';
        foreach ($categoryName as $key => $value) {
            $cn = ltrim($cn . ',' . $value, ',');
        }

        $table_cname         = \Schema::getColumnListing('blogs');
        $except              = ['id','create_at','updated_at','blog_category','blog_image'];
        $input               = $request->all();
        $blog->blog_category = $cn;
        foreach ($table_cname as $key => $value) {
            if (in_array($value, $except)) {
                continue;
            }

            if (isset($input[$value])) {
                $blog->$value = $request->get($value);
            }
        }

        $blog->blog_title         =   $request->get('blog_title');
        $blog->blog_description   =   $request->get('blog_description');
        $blog->blog_created_by    = $request->get('blog_created_by');

        $blog->save();

        return Redirect::to('admin/blog')
            ->with('flash_alert_notice', 'Blog was successfully created !');
    }
    /*
     * Edit Group method
     * @param
     * object : $category
     * */

    public function edit(Blogs $blog)
    {
        $page_title     = 'Blog';
        $page_action    = 'Edit Blog';
        $categories     = Category::all();
        $type           = ['Stories' => 'Stories','News' => 'News','Tips' => 'Tips'];
        $category_id    = explode(',', $blog->blog_category);

        return view('packages::blog.edit', compact('blog', 'banner', 'page_title', 'page_action', 'categories', 'type', 'category_id'));
    }

    public function update(BlogRequest $request, Blogs $blog)
    {
        $blog = Blogs::find($blog->id);

        if ($request->file('blog_image')) {
            $photo           = $request->file('blog_image');
            $destinationPath = storage_path('blog');
            $photo->move($destinationPath, time() . $photo->getClientOriginalName());
            $blog_image         = time() . $photo->getClientOriginalName();
            $blog->blog_image   =   $blog_image;
        }


        $categoryName = $request->get('blog_category');
        $cn           = '';
        foreach ($categoryName as $key => $value) {
            $cn = ltrim($cn . ',' . $value, ',');
        }


        if ($cn != '') {
            $blog->blog_category =  $cn;
        }
        $request = $request->except('_method', '_token', 'blog_category', 'blog_image');

        foreach ($request as $key => $value) {
            $blog->$key = $value;
        }

        $blog->save();

        return Redirect::to('admin/blog')
            ->with('flash_alert_notice', 'Blog was successfully updated!');
    }
    /*
     *Delete User
     * @param ID
     *
     */
    public function destroy(Request $request, $id)
    {
        Blogs::where('id', $id)->delete();

        return Redirect::to('admin/blog')
            ->with('flash_alert_notice', 'Blog was successfully deleted!');
    }

    public function show(Blogs $blog)
    {
        $page_title     = 'Blog';
        $page_action    = 'Show Blog';
        $categories     = Category::all();
        $type           = ['Stories' => 'Stories','News' => 'News','Tips' => 'Tips'];
        $category_id    = explode(',', $blog->blog_category);

        return view('packages::blog.show', compact('blog', 'banner', 'page_title', 'page_action', 'categories', 'type', 'category_id'));
    }
}
