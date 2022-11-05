<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\AuthModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{



    public $user;

    public function __construct()
    {

        $this->user = new AuthModel();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('Auth.login');
    }

    public function CheckAuth(Request $r)
    {
        $credentials = $r->validate([
            'ussername' => 'required',
            'password' => 'required'
        ]);


        
        if (Auth::attempt($credentials)) {
            $r->session()->regenerate();
            $ussername = $r->input('ussername');
            
            $status = $this->user->GetStatus($ussername);
            Session::put('ussername', $ussername);
            Session::put('status', $status->status);
            
            $r->session()->regenerate();
            
            return redirect()->intended('/home');

        } else {
            return redirect('/')->with('failed', 'Login Failed!');
        }





    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Auth.register');
    }

    public function CreateUser(Request $r)
    {

        $r->validate([
            'athereum' => 'required',
            'username' => 'required|unique:users,ussername',
            'name' => 'required',
            'password' => 'min:3|required_with:password2|same:password2',
            'password2' => 'min:3'
        ]);

        $password = Hash::make($r->password);

        $data = [
            'ethereum_address' => $r->athereum,
            'ussername' => $r->username,
            'password' => $password,
            'name' => $r->name,
            'status' => '-',

        ];

        $this->user->Register($data);
        return redirect('/')->with("success", "Sucess Register");
    }

    public function index()
    {

        $nama = $this->user->GetUser(session()->get('ussername'));
        $data=$this->user->GetUserAll();

        $data = [
            'nama' => $nama[0]->name,
            'data'=>$data
        ];
        return view('Auth.index', $data);
    }

    public function home()
    {

        $nama = $this->user->GetUser(session()->get('ussername'));

        $data = [
            'nama' => $nama[0]->name,
        ];
        return view('Auth.home', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {




        $nama = $this->user->GetUser(session()->get('ussername'));
        $data=$this->user->GetUserById($id);


        $data = [
            'nama' => $nama[0]->name,
            'data'=>$data,
        ];        

        return view('Auth.edit',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $request->validate([
            "username"=>'required|unique:users,ussername',
            "status"=>'required',
        ]);

        if($request->reset!=null){
            $request->validate([
                'password' => 'min:3|required_with:password2|same:password2',
                'password2' => 'min:3'
            ]);
        }


        $data=[
            'ethereum_address'=>$request->athereum,
            'ussername'=>$request->username,
            'password'=> Hash::make($request->password),
            'name'=>$request->username,
            'status'=>$request->status,
            
        ];

        $this->user->UpdateUser($data,$id);
        return redirect('/user')->with('success','Success Update User');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
