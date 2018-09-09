<?php

declare(strict_types=1);

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Input;
use Modules\Admin\Helpers\Helper as Helper;
use Modules\Admin\Http\Requests\CategoryRequest;
use Modules\Admin\Models\Category;
use Modules\Admin\Models\ContactGroup;
use Modules\Admin\Models\User;
use PDF;
use Route;
use URL;
use View;

/**
 * Class AdminController
 */
class ContactGroupController extends Controller
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
        View::share('viewPage', 'Contact');
        View::share('sub_page_title', 'Contact');
        View::share('helper', new Helper);
        View::share('heading', 'Contact Group');
        View::share('route_url', route('contact'));
        $this->record_per_page = Config::get('app.record_per_page');
    }


    /*
     * Dashboard
     * */

    public function index(ContactGroup $contactGroup, Request $request)
    {
        $page_title     = 'Contact';
        $sub_page_title = 'contactGroup';
        $page_action    = 'View contactGroup';

        if ($request->ajax()) {
            $id               = $request->get('id');
            $category         = ContactGroup::find($id);
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

            $contactGroup = ContactGroup::with(['contactGroup' => function ($query) {
                $query->with('contact');
            }])->where(function ($query) use ($search,$status) {
                if (!empty($search)) {
                    $query->Where('groupName', 'LIKE', "%$search%");
                    $query->Where('parent_id', 0);
                }
            })->Paginate($this->record_per_page);
        } else {
            $contactGroup =  ContactGroup::with(['contactGroup' => function ($query) {
                $query->with('contact');
            }])->where('parent_id', 0)->orderBy('id', 'desc')->Paginate(10);
        }
        $contactGroupPag =  ContactGroup::where('parent_id', 0)->Paginate(10);
        $export          = $request->get('export');

        if ($export == 'pdf') {
            $contactGroup =  ContactGroup::with(['contactGroup' => function ($query) {
                $query->with('contact')->get();
            }])->where('parent_id', 0)->get();
            //dd($contactGroup );
            $pdf = PDF::loadView('packages::contactGroup.pdf', compact('contactGroupPag', 'contactGroup', 'data', 'page_title', 'page_action', 'sub_page_title', 'contacts', 'html'));

            return ($pdf->download('contact-group.pdf'));
        }


        return view('packages::contactGroup.index', compact('contactGroupPag', 'contactGroup', 'data', 'page_title', 'page_action', 'sub_page_title', 'contacts', 'html'));
    }

    // updateGroup

    public function updateGroup(Request $request)
    {
        $cgn            =  ContactGroup::find($request->get('parent_id'));
        $cgn->groupName = $request->get('groupName');
        $cgn->save();

        ContactGroup::whereNotIn('id', $request->get('ids'))
            ->where('parent_id', $request->get('parent_id'))->delete();

        $ids = $request->get('ids');

        foreach ($ids as $key => $value) {
            $data            = ContactGroup::findOrNew($value);
            $data->groupName = $request->get('groupName');

            if (count($data->contactId) == 0) {
                $data->contactId = $value;
            }

            $data->parent_id = $request->get('parent_id');
            $data->save();
        }
        echo json_encode(['status' => 1,'message' => 'Group Updated successfully']);

        exit();
    }

    /*
     * create Group method
     * */

    public function create(Category $category)
    {
        $page_title         = 'contactGroup';
        $page_action        = 'Create contactGroup';
        $category           = Category::all();
        $sub_category_name  = Category::all();

        $html       = '';
        $categories = '';

        return view('packages::contactGroup.create', compact('categories', 'html', 'category', 'sub_category_name', 'page_title', 'page_action'));
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
        $cat->slug                  =  strtolower(str_slug($request->get('category_group_name')));
        $cat->parent_id             =  $parent_id;
        $cat->category_name         =  $request->get('category_group_name');
        $cat->level                 =  1;
        $cat->category_group_image  =  $photo_name;
        $cat->description           =  $request->get('description');

        $cat->save();

        return Redirect::to(route('contact'))
            ->with('flash_alert_notice', 'New category  successfully created !');
    }

    /*
     * Edit Group method
     * @param
     * object : $category
     * */

    public function edit(Category $category)
    {
        $page_title  = 'Category';
        $page_action = 'Edit Group category';
        $url         = url::asset('storage/uploads/category/' . $category->category_group_image)  ;

        return view('packages::category.edit', compact('url', 'category', 'page_title', 'page_action'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
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
                  'The Group Category name already been taken!'
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
        $cat->slug                  =  strtolower(str_slug($request->get('category_group_name')));
        $cat->parent_id             =  $parent_id;
        $cat->category_name         =  $request->get('category_group_name');
        $cat->level                 =  1;
        $cat->description           =  $request->get('description');

        if (isset($photo_name)) {
            $cat->category_group_image  =  $photo_name;
        }
        $cat->save();

        return Redirect::to(route('contact'))
            ->with('flash_alert_notice', 'Contact Group  successfully updated.');
    }
    /*
     *Delete User
     * @param ID
     *
     */
    public function destroy(Request $request, $id)
    {
        ContactGroup::whereIdOrParentId($id, $id)->delete();

        return Redirect::to(route('contactGroup'))
            ->with('flash_alert_notice', 'Contact Group successfully deleted.');
    }

    public function show(ContactGroup $cg)
    {
    }
}
