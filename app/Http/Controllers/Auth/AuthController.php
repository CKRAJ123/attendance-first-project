<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Park;
class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('user_details')
                        ->withSuccess('You have Successfully loggedin');
        }
  
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
        //return redirect('dashboard',compact('data'))->withSuccess('Great! You have Successfully loggedin');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],

        'password' => Hash::make($data['password'])
      ]);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }





     public function userDetails(Request $request)
    {
        $ip = '14.98.24.134'; //For static IP address get
        //$ip = \request()->ip(); //Dynamic IP address get
        $data = \Location::get($ip);  
        $users = User::all();
         $parks=Park::all();
       
        $accept =  DB::select('select * from users where status = :statusvalue' , ['statusvalue' => 'accepted' ]);
    
        $reject= DB::select('select * from users where status = :statusvalue' , ['statusvalue' => 'rejected' ]);

        return view('details',compact('data','users','accept','reject','parks'));
    }

     public function accept($id)
    {
        

       User::where('id',$id)->update(['status'=>'accepted']);
       
        return redirect('wfh_details');
     }
     public function reject($id) 
     {
       

        User::where('id',$id)->update(['status'=>'rejected']);
       
        return redirect('wfh_details');
     }
     public function office() {
        return view('office');
     }


     public function store(Request $request){
        $parks = new Park();
        $parks->username = $request->username;
        $parks->slots = $request->slots;
        $parks->mobno=$request->mobno;
        $parks->save();
        // $data = $request->all();
        // $user = User::create([
        //     'username' => $data['username'],
        //     'slots' => $data['slots'],
        //     'mobno'=>$data['mobno'],
        //   ]);
        return redirect('parking_details');
        
     }
     public function parkingDetails(Request $request){

        $parks=Park::all();
        return view('carparked',compact('parks'));
     }
     public function wfhDetails(Request $request){

        $ip = '14.98.24.134'; //For static IP address get
        //$ip = \request()->ip(); //Dynamic IP address get
        $data = \Location::get($ip);  
        $users = User::all();
         //$parks=Park::all();
         $reject= DB::select('select * from users where status = :statusvalue' , ['statusvalue' => 'rejected' ]);
         $accept =  DB::select('select * from users where status = :statusvalue' , ['statusvalue' => 'accepted' ]);
        return view('wfhusers',compact('data','users','accept','reject'));
     }
}
