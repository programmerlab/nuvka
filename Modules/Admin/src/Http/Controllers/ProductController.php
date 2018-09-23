<?php

declare(strict_types=1);

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Modules\Admin\Helpers\Helper as Helper;
use Modules\Admin\Http\Requests\ProductRequest;
use Modules\Admin\Models\Product;
use Modules\Admin\Models\Category;
use Modules\Admin\Models\Report;
use Modules\Admin\Models\User;
use Route;
use View;

/**
 * Class AdminController
 */
class ProductController extends Controller
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
        View::share('viewPage', 'Product');
        View::share('helper', new Helper);
        View::share('route_url', route('product'));
        View::share('heading', 'Product');

        $this->record_per_page = Config::get('app.record_per_page');

        $report_count = Report::count();
        View::share('report_count', $report_count);
    }

    protected $categories;

    /*
     * Dashboard
     * */

    public function index(Product $product, Request $request)
    {
        $page_title  = 'Product';
        $page_action = 'View Product';

        if ($request->ajax()) {
            $id               = $request->get('id');
            $category         = Product::find($id);
            $category->status = $s;
            $category->save();
            echo $s;

            exit();
        }

        $products = $product->with('category')->orderBy('id', 'desc')->Paginate($this->record_per_page);

        return view('packages::product.index', compact('products', 'page_title', 'page_action', 'helper'));
    }

    /*
     * create  method
     * */

    public function create(Product $product)
    {

        $page_title         = 'Product';
        $page_action        = 'Create Product';
        $categories         = Category::all();
        $cat                = []; 
        $category           = [];
        $product            = [];
        $sub_category_name  = [];
         
        return view('packages::product.create', compact('categories', 'cat', 'category', 'product', 'sub_category_name', 'page_title', 'page_action'));
    }

    /*
     * Save Group method
     * */

    public function store(Request $request, Product $product)
    { 

        if ($request->file('photo')) {
            $photo           = $request->file('photo');
            $destinationPath = storage_path('uploads/products');
            $photo->move($destinationPath, time() . $photo->getClientOriginalName());
            $photo            = time() . $photo->getClientOriginalName();
            $product->photo   =   $photo;
        }


        if ($request->file('photo1')) {
            $photo           = $request->file('photo');
            $destinationPath = storage_path('uploads/products');
            $photo->move($destinationPath, time() . $photo->getClientOriginalName());
            $photo            = time() . $photo->getClientOriginalName();
            $product->photo1   =   $photo;
        }


        if ($request->file('photo2')) {
            $photo           = $request->file('photo');
            $destinationPath = storage_path('uploads/products');
            $photo->move($destinationPath, time() . $photo->getClientOriginalName());
            $photo            = time() . $photo->getClientOriginalName();
            $product->photo2   =   $photo;
        }
         



        $table_cname = \Schema::getColumnListing('products');
        $except      = ['id','create_at','updated_at','_token','photo'];
        $input       = $request->all();

 

        $categoryName = Category::find($request->get('product_category'));

        $product->slug = str_slug($request->get('product_title')) ;

        $product->url = $categoryName->category_name.'/' . str_slug($request->get('product_title'));
     
        foreach ($table_cname as $key => $value) {
            if (in_array($value, $except)) {
                continue;
            }

            if (isset($input[$value])) {
                $product->$value = $request->get($value);
            }
        }

        if (empty($request->get('meta_title'))) {
            $product->meta_title  =  $request->get('title');
        }

        if (empty($request->get('meta_description'))) {
            $product->meta_description  = implode(' ', array_slice(explode(' ', $request->get('description')), 0, 80));
        }

        $rs = $product->save();

        return Redirect::to(route('product'))
            ->with('flash_alert_notice', 'New Product was successfully created !');
    }
    /*
     * Edit Group method
     * @param
     * object : $category
     * */

    public function edit(Request $request, $id)
    {
        $product = Product::find($id);
        $page_title  = 'Product';
        $page_action = 'Show Product';
        $category    = Category::all();
        $categories    = Category::all();
        $cat                = []; 
        $category           = []; 
        $sub_category_name  = [];

        foreach ($category as $key => $value) {
            $cat[$value->category_name][$value->id] =  $value->sub_category_name;
        } 
         
        $category_id =  $product->product_category;
         
         //dd($categories);


        return view('packages::product.edit', compact('categories','category', 'product', 'page_title', 'page_action','category_id'));
    }

    public function update(ProductRequest $request, $id)
    {
          $product = Product::find($id);
        


        $table_cname = \Schema::getColumnListing('products');
        $except      = ['id','create_at','updated_at','_token','photo','photo1','photo2'];
        $input       = $request->all();

        $categoryName = Category::find($request->get('product_category'));

        $product->slug = str_slug($request->get('product_title')) ;

        $product->url = $categoryName->slug.'/' . str_slug($request->get('product_title'));
     
        foreach ($table_cname as $key => $value) {
            if (in_array($value, $except)) {
                continue;
            }

            if (isset($input[$value])) {
                $product->$value = $request->get($value);
            }
        }

        if (empty($request->get('meta_title'))) {
            $product->meta_title  =  $request->get('title');
        }

        if (empty($request->get('meta_description'))) {
            $product->meta_description  = implode(' ', array_slice(explode(' ', $request->get('description')), 0, 80));
        }

        if ($request->file('photo')) {
            $photo           = $request->file('photo');
            $destinationPath = storage_path('uploads/products');
            $photo->move($destinationPath, time() . $photo->getClientOriginalName());
            $photo            = time() . $photo->getClientOriginalName();
            $product->photo   =   $photo;
        }


        if ($request->file('photo1')) {
            $photo           = $request->file('photo1');
            $destinationPath = storage_path('uploads/products');
            $photo->move($destinationPath, time() . $photo->getClientOriginalName());
            $photo            = time() . $photo->getClientOriginalName();
            $product->photo1   =   $photo;
        }


        if ($request->file('photo2')) {
            $photo           = $request->file('photo2');
            $destinationPath = storage_path('uploads/products');
            $photo->move($destinationPath, time() . $photo->getClientOriginalName());
            $photo            = time() . $photo->getClientOriginalName();
            $product->photo2   =   $photo;
        }
        $product->save();

        return Redirect::to(route('product'))
            ->with('flash_alert_notice', 'Product was  successfully updated !');
    }
    /*
     *Delete User
     * @param ID
     *
     */
    public function destroy(Request $request, $id)
    {
        Product::where('id', $id)->delete();

        return Redirect::to(route('product'))
            ->with('flash_alert_notice', 'Product was successfully deleted!');
    }

     public function show(Request $request, $id)
    {
        $reports = Product::find($id);
        $page_title     = 'Product';
        $page_action    = 'Product Report';
        $categories     = Category::all();
        $product        = $reports->toArray();

        return view('packages::product.show', compact('product', 'banner', 'page_title', 'page_action', 'categories', 'type', 'category_id'));
    }
}
