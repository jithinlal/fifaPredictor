<?php

namespace App\Http\Controllers\Admin;

use Session;

use App\Http\Controllers\Controller;

use App\User;

class UserController extends Controller
{
    const ADMINS = [1, 2];
    const SA_DOMAIN_NAMES = ['softwareassociates.in', 'softwareassociates.co.in'];

    private $_records = 20;

    public function index()
    {
        $data = [];

        $data['users'] = [];
        $data['count'] = 0;

        $count = User::whereNotIn('id', self::ADMINS)->count();
        if ($count > 0) {
            $users = User::whereNotIn('id', self::ADMINS)->paginate($this->_records);
        }

        $data['users'] = $users;
        $data['count'] = $count;


        return view('user.index', $data);


    }

    public function admin()
    {
        $data = [];

        $admins = User::whereIn('id', self::ADMINS)->paginate($this->_records);

        $data['users'] = $admins;


        return view('user.admin', $data);
    }

    public function saUser()
    {
        $data = [];

        $data['users'] = [];
        $data['count'] = 0;

        $count = User::where('sa_user', 1)->count();
        if ($count > 0) {
            $saUsers = User::where('sa_user', 1)->paginate($this->_records);
        }

        $data['users'] = $saUsers;
        $data['count'] = $count;


        return view('user.sa-user', $data);
    }

    public function makeSaUsers()
    {
        $newSaUsercount = 0;
        $newSaUsernames = [];
        $nonSaUsersCount = User::whereNotIn('id', self::ADMINS)->whereNull('sa_user')->count();
        if ($nonSaUsersCount > 0) {
            $nonSaUsers = User::whereNotIn('id', self::ADMINS)->whereNull('sa_user')->get();
            foreach ($nonSaUsers as $user) {
                $email = $user->email;
                $domain_name = substr(strrchr($email, "@"), 1);
                if (in_array($domain_name, self::SA_DOMAIN_NAMES)) {
                    $newSaUser = User::find($user->id);
                    $newSaUser->sa_user = 1;
                    $newSaUser->save();

                    $newSaUsercount++;
                    $newSaUsernames[] = $newSaUser->name;
                }
            }
            if ($newSaUsercount > 0) {
                Session::flash('alert-success', $newSaUsercount . ' SA users Added. They are ' . implode(" , ", $newSaUsernames));
            } else {
                Session::flash('alert-success', $newSaUsercount . ' SA users Added');
            }
            return redirect('/admin/user-sa-user');
        } else {
            Session::flash(' alert - warning ', $newSaUsercount . ' SA users Added ');
            return redirect('/admin/user-sa-user');
        }

    }
}
