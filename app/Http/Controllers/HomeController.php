<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Element;
use App\Models\Raport;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $raports = Raport::query()
            ->where('sample_name', 'LIKE', "%{$search}%")
            ->get();
        if (count($raports) > 0) {
            $users = User::all();
            $customers = Customer::all();
            return view('raports/raports', compact('raports', 'users', 'customers'));
        } else {
            $elements = Element::query()
                ->where('title', 'LIKE', "%{$search}%")
                ->get();
            if (count($elements) > 0) {
                return view('elements/elements', compact('elements'));
            } else {
                $customers = Customer::query()
                    ->where('regCode', 'LIKE', "%{$search}%")
                    ->get();
                if (count($customers) > 0) {
                    return view('customers/customers', compact('customers'));
                } else {
                    return redirect('home')->with('failed', "Search not found");
                }
            }
        }
    }
}
