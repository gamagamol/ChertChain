<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuthModel;
use App\Models\CertificationModel;
use Illuminate\Support\Facades\Hash;

class CertificationController extends Controller
{

    public $user;
    public $certificate;

    public function __construct()
    {

        $this->user = new AuthModel();
        $this->certificate = new CertificationModel();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()


    {


        $nama = $this->user->GetUser(session()->get('ussername'));


        $data = [
            'nama' => $nama[0]->name,
            'data' => $this->certificate->Index()
        ];

        return view('certification.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nama = $this->user->GetUser(session()->get('ussername'));

        $data = [
            'nama' => $nama[0]->name,
            'data' => $this->user->GetUserAll()
        ];

        return view('certification.add', $data);
    }
    public function sign()
    {
        $nama = $this->user->GetUser(session()->get('ussername'));

        $id_auth = $this->user->GetUser(session()->get('ussername'));

        $data = [
            'nama' => $nama[0]->name,
            'id_auth' => $id_auth[0]->id_auth,
            'data' => $this->certificate->Sign($id_auth[0]->id_auth)
        ];
        return view('certification.sign', $data);
    }


    public function holder()
    {
        $nama = $this->user->GetUser(session()->get('ussername'));

        $id_auth = $this->user->GetUser(session()->get('ussername'));

        $data = [
            'nama' => $nama[0]->name,
            'id_auth' => $id_auth[0]->id_auth,
            'data' => $this->certificate->Holder($id_auth[0]->id_auth)
        ];
        return view('certification.holder', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'holder' => 'required',
            'signer' => 'required',
            'title' => 'required',
            'data1' => 'required',
            'data2' => 'required',
            // 'document'=>'required',
            'link' => 'required',
        ]);

        $id_auth = $this->user->GetUser(session()->get('ussername'));
        // dd($request->all());

        $benar = true;
        while ($benar) {
            $angka_random = rand(0, 10000);
            $hash_certificate = Hash::make($angka_random);
            $hash = $this->certificate->CheckHash($hash_certificate);
            $benar = $hash;
        }

        $data = [
            'id_auth' => $id_auth[0]->id_auth,
            'hash_certificate' => $hash_certificate,
            'title_certificate' => $request->title,
            'data_certificate' => $request->data1,
            'data_certificate1' => $request->data2,
            'ipfs_link' => $request->link,
            'holder' => $request->holder,
            'sign' => $request->signer,
            'status_holder' => 0,
            'status_sign' => 0,
        ];

        // dd($data);


        $this->certificate->Insert($data);

        return redirect('/certification')->with('success', 'Success Insert Certificate');
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


        $data = [
            'nama' => $nama[0]->name,
            'data' => $this->certificate->GetCertificateById($id)
        ];




        return view('certification.detail', $data);
    }



    public function SignDetail($id)
    {

        $nama = $this->user->GetUser(session()->get('ussername'));
        $data = [
            'nama' => $nama[0]->name,
            'data' => $this->certificate->GetCertificateById($id)
        ];
        return view('certification.sign_detail', $data);
    }
    public function HolderDetail($id)
    {

        $nama = $this->user->GetUser(session()->get('ussername'));
        $data = [
            'nama' => $nama[0]->name,
            'data' => $this->certificate->GetCertificateById($id)
        ];
        return view('certification.holder_detail', $data);
    }


    public function UpdateSign(Request $r)
    {


        $this->certificate->UpdateSign($r->id_certificate, $r->type);


        return redirect("/certification/$r->type")->with('success', "Succes Update Data");
    }


    public function UpdateAll(Request $r)
    {
        $this->certificate->UpdateAll($r->id_auth, $r->type);
        return response()->json(['status'=>true]);
    }
}
