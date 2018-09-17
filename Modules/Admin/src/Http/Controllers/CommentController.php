<?php

declare(strict_types=1);

namespace Modules\Admin\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Input;
use Modules\Admin\Http\Requests\ContactRequest;
use Modules\Admin\Models\User;
use Route;
use URL;
use View;

/**
 * Class AdminController
 */
class CommentController extends Controller
{
    /**
     * @var  Repository
     */

    /**
     * Displays all admin.
     *
     * @return \Illuminate\View\View
     */
    public function __construct(Comments $comment)
    {
        $this->middleware('admin');
        View::share('viewPage', 'Post Task');
        View::share('sub_page_title', 'Comment');
        View::share('helper', new Helper);
        View::share('heading', 'Comment');
        View::share('route_url', route('comment'));
        $this->record_per_page = Config::get('app.record_per_page');
    }


    /*
     * Dashboard
     * */

    public function index(Comments $comment, Request $request)
    {
        $page_title     = 'comment';
        $sub_page_title = 'View Comment';
        $page_action    = 'View Comment';


        if ($request->ajax()) {
            $id               = $request->get('id');
            $category         = Comments::find($id);
            $category->status = $s;
            $category->save();
            echo $s;

            exit();
        }



        // Search by name ,email and group
        $search   = $request->get('search');
        $taskdate = $request->get('taskdate');

        if ((isset($search) && !empty($search)) || (isset($taskdate) && !empty($taskdate))) {
            $search   = isset($search) ? Input::get('search') : null;
            $comments = Comments::where(function ($query) use ($search,$taskdate) {
                if (!empty($search)) {
                    $query->whereHas('taskDetail', function ($query) use ($search) {
                        $query->where('title', $search);
                    });
                }

                if (!empty($taskdate)) {
                    $query->where('created_at', 'LIKE', '%' . $taskdate . '%');
                }
            })->with('userDetail', 'taskDetail')->where('commentId', 0)->Paginate($this->record_per_page);
        } else {
            $comments = Comments::with('userDetail', 'taskDetail')->where('commentId', 0)->orderBy('id', 'desc')->Paginate($this->record_per_page);
        }

        return view('packages::comment.index', compact('comments', 'data', 'page_title', 'page_action', 'sub_page_title'));
    }

    /*
     * create Group method
     * */

    public function create(Contact $contact)
    {
    }

    public function createGroup(Request $request)
    {
    }

    /*
     * Save Group method
     * */

    public function store(ContactRequest $request, Contact $contact)
    {
        $categoryName = $request->get('categoryName');
        $cn           = '';
        foreach ($categoryName as $key => $value) {
            $cn = ltrim($cn . ',' . $value, ',');
        }

        $table_cname           = \Schema::getColumnListing('contacts');
        $except                = ['id','create_at','updated_at','categoryName'];
        $input                 = $request->all();
        $contact->categoryName = $cn;
        foreach ($table_cname as $key => $value) {
            if (in_array($value, $except)) {
                continue;
            }

            if (isset($input[$value])) {
                $contact->$value = $request->get($value);
            }
        }
        $contact->save();

        return Redirect::to(route('contact'))
            ->with('flash_alert_notice', 'New contact successfully created!');
    }

    public function uploadFile($file)
    {

        //Display File Name
        $fileName = $file->getClientOriginalName();

        //Display File Extension
        $ext = $file->getClientOriginalExtension();
        //Display File Real Path
        $realPath = $file->getRealPath();
        //Display File Mime Type


        $file_name = time() . '.' . $ext;
        $path      = storage_path('csv');

        chmod($path, 0777);
        $file->move($path, $file_name);
        chmod($path . '/' . $file_name, 0777);

        return $path . '/' . $file_name;
    }

    public function contactImport(Request $request)
    {
        try {
            $file = $request->file('importContact');

            if ($file == null) {
                echo json_encode(['status' => 0,'message' => 'Please select  csv file!']);

                exit();
            }
            $ext = $file->getClientOriginalExtension();

            if ($file == null || $ext != 'csv') {
                echo json_encode(['status' => 0,'message' => 'Please select valid csv file!']);

                exit();
            }
            $mime = $file->getMimeType();

            $upload = $this->uploadFile($file);

            $rs =    \Excel::load($upload, function ($reader) use ($request) {
                $data = $reader->all();

                $table_cname = \Schema::getColumnListing('contacts');

                $except = ['id','create_at','updated_at'];

                $input = $request->all();
                // $contact->categoryName = $cn;
                $contact =  new Contact;
                foreach ($data  as $key => $result) {
                    foreach ($table_cname as $key => $value) {
                        if (in_array($value, $except)) {
                            continue;
                        }

                        if (isset($result->$value)) {
                            $contact->$value = $result->$value;
                            $status = 1;
                        }
                    }

                    if (isset($status)) {
                        $contact->save();
                    }
                }

                if (isset($status)) {
                    echo json_encode(['status' => 1,'message' => 'contact imported successfully!']);
                } else {
                    echo json_encode(['status' => 0,'message' => 'Invalid file type or content.Please upload csv file only.']);
                }
            });
        } catch (\Exception $e) {
            echo json_encode(['status' => 0,'message' => 'Please select csv file!']);

            exit();
        }
    }

    /*
     * Edit Group method
     * @param
     * object : $category
     * */

    public function edit(Contact $contact)
    {
        $page_title     = 'contact';
        $page_action    = 'Edit contact';
        $categories     = Category::all();
        $category_id    = explode(',', $contact->categoryName);

        return view('packages::contact.edit', compact('category_id', 'categories', 'url', 'contact', 'page_title', 'page_action'));
    }

    public function update(Request $request, Contact $contact)
    {
        $contact      = Contact::find($contact->id);
        $categoryName = $request->get('categoryName');
        $cn           = '';
        foreach ($categoryName as $key => $value) {
            $cn = ltrim($cn . ',' . $value, ',');
        }

        if ($cn != '') {
            $contact->categoryName =  $cn;
        }
        $request = $request->except('_method', '_token', 'categoryName');

        foreach ($request as $key => $value) {
            $contact->$key = $value;
        }
        $contact->save();

        return Redirect::to(route('contact'))
            ->with('flash_alert_notice', 'Contact  successfully updated.');
    }
    /*
     *Delete User
     * @param ID
     *
     */
    public function destroy(Request $request, $id)
    {
        Comments::where('id', $id)->delete();



        return Redirect::to(URL::previous())
            ->with('flash_alert_notice', 'Comment successfully deleted.');
    }

    public function show(Comments $comment)
    {
        $page_title     = 'comment Reply';
        $sub_page_title = 'View Comment';
        $page_action    = 'View Comment';
        $comments       = Comments::with('userDetail', 'commentReply', 'taskDetail')
            ->where('id', $comment->id)
            ->get();
        //dd($comments);
        return view('packages::commentReply.index', compact('comments', 'page_title', 'page_action', 'sub_page_title'));
    }

    public function showComment(Request $request, $id)
    {
        $page_title     = 'comment Reply';
        $sub_page_title = 'View Comment';
        $page_action    = 'View Comment';
        $comments       = Comments::with('userDetail', 'commentReply', 'taskDetail')
            ->where('taskId', $id)
            ->get();

        return view('packages::commentReply.index', compact('comments', 'page_title', 'page_action', 'sub_page_title'));
    }
}
