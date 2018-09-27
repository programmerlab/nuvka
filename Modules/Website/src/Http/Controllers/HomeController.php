<?php
namespace Modules\Website\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth; 
use Modules\Website\Models\User;
use Modules\Website\Models\Category;
use Modules\Website\Models\Product;
use Modules\Website\Models\Transaction;
use View;
use Html;
use URL; 
use Validator; 
use Paginate;
use Grids; 
use Form;
use Hash; 
use Lang;
use Session;
use DB;
use Route;
use Crypt;
use Redirect;
use Cart;
use Input;
use App\Helpers\Helper as Helper;
use Modules\Website\Models\Settings; 
use Modules\Website\Models\ShippingBillingAddress;
use Modules\Website\Models\Page;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     

      public function __construct(Request $request,Settings $setting) { 
        
        View::share('category_name',$request->segment(1));
        View::share('total_item',Cart::content()->count());
        View::share('sub_total',Cart::subtotal()); 
        View::share('userData',$request->session()->get('current_user'));

        $hot_products   = Product::orderBy('views','desc')->limit(3)->get();
        $special_deals  = Product::orderBy('discount','desc')->limit(3)->get(); 
        View::share('hot_products',$hot_products);
        View::share('special_deals',$special_deals);  

        $website_title      = $setting::where('field_key','website_title')->first();
        $website_email      = $setting::where('field_key','website_email')->first();
        $website_url        = $setting::where('field_key','website_url')->first();
        $contact_number     = $setting::where('field_key','contact_number')->first();
        $company_address    = $setting::where('field_key','company_address')->first();

        $banner             = $setting::where('field_key','LIKE','%banner_image%')->get();


         View::share('website_title',$website_title);
         View::share('website_email',$website_email);
         View::share('website_url',$website_url);
         View::share('contact_number',$contact_number);
         View::share('company_address',$company_address);
         View::share('banner',$banner);  

          View::share('meta_desc','');
         View::share('website_logo','');

        $category_list = Category::where('parent_id',0)->get();
        View::share('category_list',$category_list); 


        View::share('userData',$request->session()->get('current_user'));
         if ($request->session()->has('current_user')) { 

            $this->user_id = $request->session()->get('current_user')->id;

        }else{
            $this->user_id = "";
        }

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $categories = Category::nested()->get();

        return view('home'); 


        $html =  Category::renderAsHtml(); 

        $categories =  Category::attr(['name' => 'categories'])
                        ->selected([3])
                        ->renderAsDropdown();
          return view('category',compact('categories','html')); 

    } 

    public function category(Request $request)
    {

        $btn = $request->get('submit_btn');

        if($btn=="Add Category")
        {
            $name = $request->get('sub_cat');
            $slug = str_slug($request->get('sub_cat'));
            $parent_id = 0;
            $cat = new Category;
            $cat->name = title_case($request->get('sub_cat'));
            $cat->slug = strtolower(str_slug($request->get('sub_cat')));
            $cat->parent_id = $request->get('categories');
            $cat->save();            
        }
        if($btn=="Add Sub Category")
        {
            $name = $request->get('sub_cat');
            $slug = str_slug($request->get('sub_cat'));
            $parent_id = $request->get('categories');

            $cat = new Category;

            $cat->name = title_case($request->get('sub_cat'));
            $cat->slug = strtolower(str_slug($request->get('sub_cat')));
            $cat->parent_id = $request->get('categories');

            $cat->save();
        }
        $categories =  Category::attr(['name' => 'categories'])
                        ->selected([3])
                        ->renderAsDropdown();

       $html =  Category::renderAsHtml(); 

       return view('category',compact('categories','html'));

  
    }


    public function home()
    {
        $banner_path1   = asset('public/enduser/assets/images/sliders/01.jpg');
        $banner_path2   = asset('public/enduser/assets/images/sliders/02.jpg');
 
        return view('website::home', compact('banner_path1', 'banner_path2'));
    }
 /*----------*/
    public function checkout()
    {
         $request = new Request;

        
        $products = Product::with('category')->orderBy('id','asc')->get();
        $categories = Category::nested()->get(); 
        return view('website::checkout',compact('categories','products','category'));   
    }

     /*----------*/
    public function mainCategory( $category=null)
    {   
        
        $request = new Request;
        $q = Input::get('q'); 
         
         $catID = Category::where('slug',$category)->orWhere('name',$category)->first();
        if($catID!=null && $catID->count()){ 

            $sub_cat = Category::where('parent_id', $catID->id)->Orwhere('id', $catID->id)->pluck('id');
             
            $products = Product::with('category')->whereIn('product_category',$sub_cat)->orderBy('id','asc')->get();
             
            if($products->count())
            { 
                 
                $products = Product::with('category')->whereIn('product_category',$sub_cat) 
                                ->orderBy('id','asc')
                                ->get();
                 if($q)
                 {
                    $products = Product::with('category')->whereIn('product_category',$sub_cat)
                                ->where('product_title','LIKE','%'.$q.'%')
                                ->orderBy('id','asc')
                                ->get();
                     
                 } 
                 
            } 
        }else{
            $products = Product::with('category')->where('product_category',0)->orderBy('id','asc')->get();

        }
       
        $categories = Category::nested()->get(); 
        return view('website::category',compact('categories','products','category','q','category')); 
    }

     /*----------*/
    public function productCategory( $category=null)
    {   
        $request = new Request;
        $q = Input::get('q'); 
         
        $catID = Category::where('slug',$category)->orWhere('name',$category)->first();
           
        if($catID!=null && $catID->count()){ 
            $products = Product::with('category')->where('product_category',$catID->id)->orderBy('id','asc')->get();
            
            if($products->count()==0)
            {
                  
                  $products = Product::with('category')->whereIn('product_category',[$catID->id]) 
                                ->orderBy('id','asc')
                                ->get();
                 if($q)
                 {
                    $products = Product::with('category')->whereIn('product_category',[$catID->id])
                                ->where('product_title','LIKE','%'.$q.'%')
                                ->orderBy('id','asc')
                                ->get();
           
                 }

                 
            } 
        }else{
            $products = Product::with('category')->where('product_category',0)->orderBy('id','asc')->get();

        }
       
        $categories = Category::nested()->get(); 
        return view('website::category',compact('categories','products','category','q','category'));   
    }
    /*----------*/
    public function productDetail($subCategoryName=null,$productName=null)
    {   
        
        $product = Product::with('category')->where('slug',$productName)->first();
        
        $categories = Category::nested()->get();  
         
        if($product==null)
        {
             $url =  URL::previous().'?error=InvaliAccess'; 
              return Redirect::to($url);
        }else{
          $product->views=$product->views+1;
          $product->save(); 
        }
         
        return view('website::product-details',compact('categories','product')); 
    }
     /*----------*/
    public function order(Request $request)
    { 
        $cart = Cart::content();
        $products = Product::with('category')->orderBy('id','asc')->get();
        $categories = Category::nested()->get(); 
        return view('website::order',compact('categories','products','category','cart'));   
         
    }
     /*----------*/
    public function faq()
    {
         $products = Product::with('category')->orderBy('id','asc')->get();
        $categories = Category::nested()->get(); 
        return view('website::faq',compact('categories','products','category')); 
        return view('website::faq');   
    }

    public function contact()
    {
         $products = Product::with('category')->orderBy('id','asc')->get();
        $categories = Category::nested()->get(); 
        return view('website::contact',compact('categories','products','category')); 
        return view('website::contact');   
    }
     /*----------*/
     public function trackOrder()
    {
         $products = Product::with('category')->orderBy('id','asc')->get();
        $categories = Category::nested()->get(); 
        return view('website::track-orders',compact('categories','products','category')); 
        return view('website::track-orders');   
    }
     /*----------*/
     public function tNc()
    {
         $products = Product::with('category')->orderBy('id','asc')->get();
        $categories = Category::nested()->get(); 
        return view('website::terms-conditions',compact('categories','products','category')); 
        return view('website::terms-conditions');   
    }

    public function thankYou(Request $request)
    {
        $user_id    = $this->user_id;
        $cart       = Cart::content();

       
        if($cart->count()==0)
        {
           return  Redirect::to('checkout');
        }
        if($user_id=="")
        {
           return  Redirect::to('confirm-order');
        }

        $products   = Product::with('category')->orderBy('id','asc')->get();
        $categories = Category::nested()->get(); 

        $billing    = ShippingBillingAddress::where('user_id',$this->user_id)->where('address_type',1)->first();
        $shipping   = ShippingBillingAddress::where('user_id',$this->user_id)->where('address_type',2)->first(); 

        foreach ($cart as $key => $result) {

            $transaction                = new Transaction;
            $transaction->user_id       = $user_id;
            $transaction->product_name  = $result->name;
            $transaction->product_id    = $result->id;
            $transaction->total_price   = $result->price;
            $transaction->discount_price= $result->price;
            $transaction->payment_mode  = "COD";
            $transaction->transaction_id = strtotime("now");
            $transaction->product_details = json_encode(Product::where('id',$result->id)->get()->toArray());
            $transaction->save();
             
        } 
        $cart = Cart::content(); 
       // dd(Cart::subtotal());
        if($cart){

            $email_content['receipent_email'] = $billing->email;
            $email_content['subject'] = "Invoice";
            $template = "invoice";
            $template_content = ['cart'=>$cart ,'billing' => $billing , 'shipping' => $shipping,'transaction'=>$transaction];

            $data = $template_content; 
          
          Helper::sendMail($email_content, $template, $template_content);
        } 


        foreach ($cart as $key => $value) {
             Cart::remove($key);
        }

      //   $request->session()->flush();
       // $request->session()->keep(['current_user']); 

        return view('website::thanku',compact('categories','products','category','cart','billing','shipping'));

    }


    public function page(Request $request, $name=null){
    
      $page = Page::where('slug',$name)->first();
      $page_title= ucfirst(($page->title)??$name);
      $html = ($page->page_content)??'<h1>Record not found</h1>';

      return view('website::page',compact('page','page_title','html'));

    }
}
