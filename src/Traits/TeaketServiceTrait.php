<?php

namespace Donkovah\Teaket\Traits;

use App\User;
use Illuminate\Http\Request;
use Donkovah\Teaket\Model\Teaket;
use Illuminate\Support\Facades\Auth;

/**
 * This trait assumes you make use of Laravel's 
 * Eloquent and you have a Teaket model.
 * You can create another trait and implement the
 * methods in 'Donkovah\Teaket\Contract\TeaketInterface'
 * just in case you store your data somewhere else
 * or you use another logic.
 */

 trait TeaketServiceTrait
{
    public $navActive = [
        'parent'=>'ticket', 
        'child'=>'', 
        'title'=> 'Ticket'
    ];
   /**
     * get all tickets from DB
    */
    public function index(User $user)
    {
        if (Auth::user()->isHR() || Auth::user()->isHR() || Auth::user()->isAudit() || Auth::user()->isTech()) {
            $teakets = Teaket::where('status_id', '!=', 3)
            ->orderBy('created_at', 'desc')
            ->get(); //3 reps solved
        } else {
            $teakets = Teaket::where('status_id', '!=', 3)
            ->whereIn('user_id', Auth::user()->organization->users->pluck('id'))
            ->orderBy('created_at', 'desc')
            ->get(); //3 reps solved
        }
        if (request()->ajax() || starts_with(request()->path(), 'api')) {
            return response()->json([
                'teakets' => $teakets
            ]);
        }
        $navActive = $this->navActive;
        return view('teaket::teaket.list', compact('teakets', 'navActive'));
    }
   /**
     * only needed if you make use of view
    */
    public function create()
    {
        $teaket = null;
        $status = config('teaket.status');
        $category = config('teaket.category');
        $priority = config('teaket.priority');
        if (request()->ajax() || starts_with(request()->path(), 'api')) {
            return response()->json([
                'teaket' => $teaket,
                'status' => $status,
                'category' => $category,
                'priority' => priority,
            ]);
        }
        $navActive = $this->navActive;
        return view('teaket::teaket.create', 
        compact('teaket', 'status', 'category', 'priority', 'navActive'));
    }
    /**
     * get admin for a category
     * This is assumed that you dont change the config category
     * Edit to suite your usage.
     */
    public function getAdminCategory($category)
    {
        switch ($category) {
            case 1:
                # Hr
                $admin = User::where('department_id', '=', 1)->get();
                break;
            case 2:
                # Tech
                $admin = User::where('department_id', '=', 3)->get();
                break;       
            case 3:
                # Audit
                $admin = User::where('department_id', '=', 6)->get();
                break;           
            case 4:
                # Finance
                $admin = User::where('department_id', '=', 2)->get();
                break;            
            default:
                return response()->json([
                    'admin' => null,
                ]);
                break;
        }
        return response()->json([
            'admin' => $admin
        ]);

    }

    /**
     * show a teaket and its details
    */
    public function show(Teaket $teaket)
    {
        $teaket->load('comments');
        if (request()->ajax() || starts_with(request()->path(), 'api')) {
            return response()->json([
                'teaket' => $teaket
            ]);
        }
        $navActive = $this->navActive;
        return view('teaket::teaket.show', compact('teaket', 'navActive'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'priority' => 'required',
            'admin' => 'required'
            ]);

        $teaket = new Teaket;
        $teaket->title = $request->title;
        $teaket->body = $request->body;
        $teaket->category_id = $request->category;
        $teaket->priority_id = $request->priority;
        $teaket->status_id = config('teaket.status')[0]['id'];
        $teaket->user_id = Auth::id();
        $teaket->save();

        $teaket->users()->attach($request->admin, ['is_admin' => 1]);
        
        if (request()->ajax() || starts_with(request()->path(), 'api')) {
            return response()->json([
                'teaket' => $teaket,
                'message' => 'Created Successfully'
            ], 200);
        }
        return redirect()->route('teaket.index');
    }
 
    /**
     * send notifications via specific chanells
    */
    public function sendTeaketNotification()
    {

    }
     
    /**
     * assign teaket to administrator
    */
    public function assignTeaketTo(Teaket $teaket, User $admin)
    {
        /** 
         * this is supposed to be the teakets you couldn't do,
         * so you assigned it to someone else.
         * we clone the teaket and move the original teaket to archive/abandon
        */ 
        //todo
        $teaket->admin_id = $admin->id;
        $teaket->save();
    }
    
    /**
     * get all closed tickets from DB or cloud
    */
    public function getClosedTeakets($start_date = null, $end_date = null)
    {
        $teakets = Teaket::where('status_id', '=', 8)->get();
        if (request()->ajax() || starts_with(request()->path(), 'api')) {
            return response()->json([
                'teakets' => $teakets
            ]);
        }
        return view('teaket.index', compact('teakets'));
    }

    /**
     * get all open tickets from DB or cloud
    */
    public function getOpenTeaket()
    {
        //status id 7 reps open
        $teakets = Teaket::where('status_id', '=', 7)->get();
        if (request()->ajax() || starts_with(request()->path(), 'api')) {
            return response()->json([
                'teakets' => $teakets
            ]);
        }
        return view('teaket.index', compact('teakets'));
    }

    /**
     * get closed teakets by this admin
    */
    public function getAdminClosedTeakets(User $admin)
    {
        $teakets = Teaket::where([
            ['status_id', '=', 8],
            ['admin_id', '=', $admin->id],
        ])->get();
        if (request()->ajax() || starts_with(request()->path(), 'api')) {
            return response()->json([
                'teakets' => $teakets
            ]);
        }
        return view('teaket.index', compact('teakets'));
    }

    /**
     * get all tickets from DB or cloud
    */
    public function getAdminOpenTeakets(User $user)
    {
        $teakets = Teaket::where([
            ['status_id', '=', 7],
            ['admin_id', '=', $user->id],
        ])->get();
        if (request()->ajax() || starts_with(request()->path(), 'api')) {
            return response()->json([
                'teakets' => $teakets
            ]);
        }
        return view('teaket.index', compact('teakets'));

    }
    
    /**
     * get all tickets from DB or cloud
    */
    public function getUserClosedTeakets(User $user)
    {
        $teakets = Teaket::where([
            ['status_id', '=', 8],
            ['user_id', '=', $user->id],
        ])->get();
        if (request()->ajax() || starts_with(request()->path(), 'api')) {
            return response()->json([
                'teakets' => $teakets
            ]);
        }
        return view('teaket.index', compact('teakets'));

    }
    
    /**
     * Calculate teaket time
    */
    public function getTotalTimeSpentOnTeaket(Teaket $teaket)
    {

    }

    /**
     * Archive Teaket
    */
    public function moveTicketToArchive(Teaket $teaket)
    {
        $teaket->status_id = 9;//reps archive.
        $teaket->save();
        if (request()->ajax() || starts_with(request()->path(), 'api')) {
            return response()->json([
                'teaket' => $teaket
            ]);
        }
        return back();

    }


    /**
     * close/reopen current ticket
    */
    public function close(Teaket $teaket)
    {        
        $teaket->status_id = ($teaket->status_id == 3) ? 1 : 3;
        $teaket->save();
        if (request()->ajax() || starts_with(request()->path(), 'api')) {
            return response()->json([
                'teaket' => $teaket,
                'status' => 200
            ]);
        }
        session()->flash('toast', [
            'status' => 'success', 
            'body' => 'Action Successful',
            'topic' => 'Success']
        );    
        return back();
    }

}
