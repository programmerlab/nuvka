<?php

declare(strict_types=1);

namespace Modules\Admin\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Input;
use Modules\Admin\Http\Requests\CategoryRequest;
use Modules\Admin\Models\Category;
use Route;
use URL;
use View;

/**
 * Class AdminController
 */
class CategoryController extends Controller
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
        View::share('viewPage', 'Category');
        View::share('sub_page_title', 'Research Categories');
        View::share('helper', new Helper);
        View::share('heading', 'Research Categories');
        View::share('route_url', route('category'));

        $this->record_per_page = Config::get('app.record_per_page');
    }


    /*
     * Dashboard
     * */

    public function index(Category $category, Request $request)
    {
        $page_title  = 'Category';
        $page_action = 'View Category';


        if ($request->ajax()) {
            $id               = $request->get('id');
            $category         = Category::find($id);
            $category->status = $s;
            $category->save();
            echo $s;

            exit();
        }

        // Search by name ,email and group
        $search = Input::get('search');
        $status = Input::get('status');

        if ((isset($search) && !empty($search))) {
            $search = isset($search) ? Input::get('search') : '';

            $categories = Category::where(function ($query) use ($search,$status) {
                if (!empty($search)) {
                    $query->Where('category_group_name', 'LIKE', "%$search%")
                        ->OrWhere('category_name', 'LIKE', "%$search%");
                }
            })->orderBy('id', 'DESC')->where('parent_id', 0)->Paginate($this->record_per_page);
        } else {
            $categories = Category::orderBy('id', 'ASC')->where('parent_id', 0)->Paginate($this->record_per_page);
        }


        return view('packages::category.index', compact('result_set', 'categories', 'data', 'page_title', 'page_action', 'sub_page_title'));
    }

    /*
     * create Group method
     * */

    public function create(Category $category)
    {
        $page_title         = 'Category';
        $page_action        = 'Create Category';
        $category           = Category::all();
        $sub_category_name  = Category::all();

        $html       = '';
        $categories = '';

        return view('packages::category.create', compact('categories', 'html', 'category', 'sub_category_name', 'page_title', 'page_action'));
    }

    /*
     * Save Group method
     * */

    public function store(CategoryRequest $request, Category $category)
    {
        $name      = $request->get('category_group_name');
        $slug      = str_slug($request->get('category_group_name'));
        $parent_id = 0;

        $photo           = $request->file('category_group_image');
        $destinationPath = storage_path('uploads/category');
        $photo->move($destinationPath, time() . $photo->getClientOriginalName());
        $photo_name = time() . $photo->getClientOriginalName();
        $request->merge(['photo' => $photo_name]);


        $cat                        = new Category;
        $cat->category_group_name   =  $request->get('category_group_name');
        $cat->slug                  =  strtolower(str_slug($request->get('category_group_name'))) . '-market-research-reports';
        $cat->url                   =  'category/' . strtolower(str_slug($request->get('category_group_name'))) . '-market-research-reports';


        $cat->parent_id             =  $parent_id;
        $cat->category_name         =  $request->get('category_group_name');
        $cat->level                 =  1;
        $cat->category_group_image  =  $photo_name;
        $cat->description           =  $request->get('description');

        $cat->save();

        return Redirect::to(route('category'))
            ->with('flash_alert_notice', 'New category  successfully created !');
    }

    /*
     * Edit Group method
     * @param
     * object : $category
     * */

    public function edit(Request $request, $id)
    {
        $category    = Category::find($id);
        $page_title  = 'Category';
        $page_action = 'Edit category';
        $url         = url::asset('storage/uploads/category/' . $category->category_group_image)  ;

        return view('packages::category.edit', compact('url', 'category', 'page_title', 'page_action'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category  = Category::find($id);
        $name      = $request->get('category_group_name');
        $slug      = str_slug($request->get('category_group_name'));
        $parent_id = 0;

        $validate_cat = Category::where('category_group_name', $request->get('category_group_name'))
            ->where('parent_id', 0)
            ->where('id', '!=', $category->id)
            ->first();

        if ($validate_cat) {
            return  Redirect::back()->withInput()->with(
                'field_errors',
                  'The  Category name already been taken!'
            );
        }


        if ($request->file('category_group_image')) {
            $photo           = $request->file('category_group_image');
            $destinationPath = storage_path('uploads/category');
            $photo->move($destinationPath, time() . $photo->getClientOriginalName());
            $photo_name = time() . $photo->getClientOriginalName();
            $request->merge(['photo' => $photo_name]);
        }

        $cat                        = Category::find($category->id);
        $cat->category_group_name   =  $request->get('category_group_name');

        $cat->slug                  =  strtolower(str_slug($request->get('category_group_name'))) . '-market-research-reports';
        $cat->url                   =  'category/' . strtolower(str_slug($request->get('category_group_name'))) . '-market-research-reports';

        $cat->parent_id             =  $parent_id;
        $cat->category_name         =  $request->get('category_group_name');
        $cat->level                 =  1;
        $cat->description           =  $request->get('description');

        if (isset($photo_name)) {
            $cat->category_group_image  =  $photo_name;
        }

        $cat->save();


        return Redirect::to(route('category'))
            ->with('flash_alert_notice', 'Category  successfully updated.');
    }
    /*
     * Category category
     * @param ID
     *
     */
    public function destroy(Request $request, $id)
    {
        $reports = \DB::table('reports')->where('category_id', $id)->get();

        if ($reports) {
            return Redirect::to(route('category'))
                ->with('flash_alert_notice', 'You can\'t delete this Category. This is associated with reports');
        }
        Category::where('id', $category->id)->delete();
        Category::where('parent_id', $category->id)->delete();

        return Redirect::to(route('category'))
            ->with('flash_alert_notice', 'Category  successfully deleted.');
    }

    public function show(Category $category)
    {
    }
}
