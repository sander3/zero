<?php

namespace App\Http\Controllers\Settings;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Notifications\DeleteAccount;
use Illuminate\Support\Facades\Auth;
use App\Events\Settings\AccountDeleted;
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
     * Show the form for deleting the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $link = URL::temporarySignedRoute(
            'settings.account.destroy', now()->addMinutes(5)
        );

        $request->user()->notify(new DeleteAccount($link));

        return redirect()
            ->route('settings.account.show')
            ->with('status', __('settings.account_deletion_link'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->user()->id);

        Auth::logout();

        $user->delete();

        event(new AccountDeleted($user));

        return redirect()->route('login');
    }
}
