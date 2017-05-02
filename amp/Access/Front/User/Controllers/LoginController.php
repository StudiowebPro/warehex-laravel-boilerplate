<?php
/**
 * Laravel Warehex-boilerplate
 * User: Kylrad
 * Company: Warehex
 * http://studioweb.pro
 * Date: 02.05.2017
 * Time: 14:15
 */

namespace Amp\Access\Front\User\Controllers;

use Amp\Base\Controller;

\View::getFinder()->prependLocation(base_path('amp/Access/Front/User/view'));

class LoginController extends Controller
{

    public function showLoginForm(){
        return view('login');
    }
}