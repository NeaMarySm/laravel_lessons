<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\profile\EditRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account.profile.index', [
            'user' => Auth::user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(User $profile)
    {

        return view('account.profile.edit', [
            'user' => $profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest  $request
     * @param  User $profile
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, User $profile)
    {
        $data = $request->validated();
        $oldPassword = $data['password'];
        if(Hash::check($oldPassword, $profile->password)){
            $status = $profile->fill([
                'name' => $data['name'],
                'email' => $data['email'],
                'password'=> Hash::make($data['new-password'])
                ])->save();
            if($status){
                return redirect()->route('account.profile.index')->with('success', __('messages.account.profile.edit.success'));
            }
            return back()->with('error', __('messages.account.profile.edit.fail.validation'));
        }
        return back()->with('error', __('messages.account.profile.edit.fail.password'));
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
