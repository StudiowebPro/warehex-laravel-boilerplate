<?php
/**
 * Laravel Warehex-boilerplate
 * User: Kylrad
 * Company: Warehex
 * http://studioweb.pro
 * Date: 02.05.2017
 * Time: 0:59
 */

namespace Amp\Access\Back\User\Controllers;

use Amp\Base\Controller;

\View::getFinder()->prependLocation(base_path('amp/Access/Back/User/view'));

/**
 * Class UserController
 *
 * @package Amp\Access\Back\User\Controllers
 */
class UserController extends Controller
{

    public function index(){
        return view('index');
    }
}