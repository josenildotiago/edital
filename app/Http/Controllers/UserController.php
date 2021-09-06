<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = DB::table('permissions')->get();
        return view('painel.create_user', ['permissions' => $permissions]);
    }

    public function profile()
    {
        $user = User::with('permissions')->where('id', Auth::user()->id)->get();
        
        $userPermission = $user;
        return view('painel.profile', [
            'userPermission' => $userPermission
        ]);
    }

    public function profilePhoto(Request $request)
    {
        $id = Auth::user()->id;

        $validator = Validator::make(
            $request->all(),
            [
            'foto' => ['mimes:jpg,bmp,png']
            ]
        );
        // dd($request->admin);
        if ($validator->fails()) {
            return redirect('/profile')
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($request->hasFile('foto')) {
            if ($request->file('foto')->isValid()) {
                // dd($request->foto);
                // User::findOrFail($id)->update($request->all());
                $user = User::findOrFail($id);
                $requestImage = $request->foto;
                $extension = $requestImage->extension();
                $imageName = "fotos/".md5($requestImage->getClientOriginalName().strtotime('now')).".".$extension;
                $request->foto->move(storage_path('app/public/fotos'), $imageName);

                $user->foto = $imageName;
                $user->save();
                return redirect()->route('home')->with("success_user", "Salvo com sucesso");

            }
        }

        
        // User::findOrFail($id)->update($request->all());
        // return redirect()->route('home')->with("success_user", "Salvo com sucesso"); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8']
            ]
        );
        // dd($request->admin);
        if ($validator->fails()) {
            return redirect('/create_user')
                        ->withErrors($validator)
                        ->withInput();
        }
        $admin = 'user';
        if (isset($request->admin) && !empty($request->admin)) {
            $admin = $request->input('admin');
        }else {
            $admin = 'user';
        }
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ])->givePermissionTo($admin);

        return redirect()->route('home')->with("success_user", "Salvo com sucesso");

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

    public function updatePassword(Request $request)
    {
        return view('painel.updatePassword');
    }

    public function editSenha(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
            'senha_antiga' => ['required','string','min:8'],
            'nova_senha' => ['required', 'string', 'min:8','different:senha_antiga']
            ]
        );
        if ($validator->fails()) {
            return redirect('/update_password')
                        ->withErrors($validator)
                        ->withInput();
        }
        // dd($request);
        $user = Auth::user();
        $password = $user->password;

        $oldPassword = $request->input('senha_antiga');
        $newPassword = $request->input('nova_senha');
        if(!Hash::check($oldPassword, $password)){
            return redirect()->route('update.password')->with("error_senha_naoConfere", "Salvo com sucesso");
        }

        $valor = Hash::make($newPassword);
        User::findOrFail($user->id)->update([
            'password' => $valor
        ]);

        Log::channel('main')->info('trocou senha '.$user->name);
        return redirect()->route('home')->with("success_user_update_senha", "Salvo com sucesso");

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
        //
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
