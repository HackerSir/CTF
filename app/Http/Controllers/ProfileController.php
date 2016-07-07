<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    protected $user;

    /**
     * ProfileController constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->user = $request->user();
    }

    /**
     * 查看會員資料
     *
     * @return \Illuminate\View\View
     */
    public function getProfile()
    {
        return view('profile.index', ['user' => $this->user]);
    }

    /**
     * 個人資料編輯頁面
     *
     * @return \Illuminate\View\View
     */
    public function getEditProfile()
    {
        return view('profile.edit', ['user' => $this->user]);
    }

    /**
     * 編輯個人資料
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);
        $this->user->name = $request->get('name');
        $this->user->save();
        return redirect()->route('profile')->with('global', '資料修改完成。');
    }

    /**
     * 密碼修改頁面
     *
     * @return \Illuminate\View\View
     */
    public function getChangePassword()
    {
        return view('profile.change-password', ['user' => $this->user]);
    }

    /**
     * 修改密碼
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request)
    {
        //檢查原密碼
        if (!Hash::check($request->get('password'), $this->user->getAuthPassword())) {
            return redirect()->route('profile.change-password')->withErrors(['password' => '輸入有誤，請重新輸入。']);
        }
        //檢查新密碼
        $this->validate($request, [
            'new_password' => 'required|confirmed|min:6',
        ]);
        //更新密碼
        $this->user->password = bcrypt($request->get('new_password'));
        $this->user->save();
        return redirect()->route('profile')->with('global', '密碼修改完成。');
    }
}
