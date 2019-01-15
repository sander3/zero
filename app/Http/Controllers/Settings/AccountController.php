<?php

namespace App\Http\Controllers\Settings;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Settings\AccountUpdated;
use App\Http\Requests\Settings\StoreAccount;

class AccountController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return view('settings.account', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Settings\StoreAccount  $request
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAccount $request)
    {
        $request->user()->update($request->validated());

        event(new AccountUpdated($request->user()));

        return redirect()
            ->route('settings.account.show')
            ->with('status', __('settings.account_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
