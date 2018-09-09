<?php

declare(strict_types=1);

namespace Modules\Admin\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Input;
//use App\Category;
use Modules\Admin\Http\Requests\PressRequest;
use Modules\Admin\Models\Press;
use Modules\Admin\Models\User;
use Paginate;
use Route;
use URL;
use View;

/**
 * Class AdminController
 */
class PressController extends Controller
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
        View::share('viewPage', 'Press');
        View::share('helper', new Helper);
        View::share('heading', 'Press');
        $this->record_per_page = Config::get('app.record_per_page');
        View::share('route_url', route('press'));
    }

    protected $press;

    /*
     * Dashboard
     * */

    public function index(Press $press, Request $request)
    {
        $page_title  = 'Press';
        $page_action = 'View Press';


        // Search by name ,email and group
        $search = Input::get('search');
        $status = Input::get('status');

        if ((isset($search) && !empty($search))) {
            $search = isset($search) ? Input::get('search') : '';


            $results = Press::where(function ($query) use ($search,$status) {
                if (!empty($search)) {
                    $query->Where('pressName', 'LIKE', "%$search%")
                        ->OrWhere('link', 'LIKE', "%$search%");
                }
            })->Paginate($this->record_per_page);
        } else {
            $results = press::Paginate($this->record_per_page);
        }

        return view('packages::press.index', compact('results', 'Press', 'page_title', 'page_action'));
    }

    /*
     * create Group method
     * */

    public function create(Press $press, Request $request)
    {
        $id          =  $request->get('id');
        $page_title  = 'Press';
        $page_action = 'Create Press';

        return view('packages::press.create', compact('id', 'press', 'page_title', 'page_action'))->withInput(Input::all());
    }

    /*
     * Save Group method
     * */

    public function store(PressRequest $request, Press $result)
    {
        $result->fill(Input::all());

        $result->slug = str_slug($request->get('title'));
        $result->url  = 'press-release/' . str_slug($request->get('title'));


        $result->save();

        return Redirect::to(route('press'))
            ->with('flash_alert_notice', 'New press   successfully created.');
    }

    /*
     * Edit Group method
     * @param
     * object : $category
     * */

    public function edit(Request $request, $id)
    {
        $page_title  = 'Press';
        $page_action = 'Edit Press';
        $press       = Press::find($id);

        return view('packages::press.edit', compact('press', 'page_title', 'page_action'));
    }

    public function update(Request $request, $id)
    {
        $result = Press::find($id);
        $result->fill(Input::all());
        $result->slug = str_slug($request->get('title'));
        $result->url  = 'press-release/' . str_slug($request->get('title'));

        $result->save();

        return Redirect::to(route('press'))
            ->with('flash_alert_notice', 'Press successfully updated.');
    }
    /*
     *Delete User
     * @param ID
     *
     */
    public function destroy(Request $request, $id)
    {
        $del = Press::where('id', $id)->delete();

        return Redirect::to(URL::previous())
            ->with('flash_alert_notice', 'Press item successfully deleted.');
    }

    public function show(Press $result)
    {
        $page_title   = 'Press';
        $page_action  = 'Show Press';

        return view('packages::press.show', compact('result', 'data', 'page_title', 'page_action', 'html'));
    }
}
