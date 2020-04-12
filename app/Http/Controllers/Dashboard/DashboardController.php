<?php
/**
 * DashboardController.php
 * @author Jhonn Carlo Valderama Rubico
 * @created 04.12.2020
 * @version 1.0
 */
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * DashboardController dashboard.
     */
    public function __construct()
    {

    }

    /**
     * Covid 19 index page.
     * @return object
     */
    public function index() : object
    {
        return view('dashboard.index');
    }
}
