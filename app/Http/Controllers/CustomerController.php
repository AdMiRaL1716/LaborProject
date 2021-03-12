<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
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

    public function allCustomers()
    {
        $customers = Customer::all();
        return view('customers/customers', ['customers' => $customers]);
    }

    public function addCustomer()
    {
        return view('customers/addCustomer');
    }

    public function editCustomer($id)
    {
        $customer = Customer::find($id);
        return view('customers/editCustomer', ['customer' => $customer]);
    }

    public function deleteCustomer($id)
    {
        $customer = Customer::find($id);
        return view('customers/deleteCustomer', ['customer' => $customer]);
    }

    public function create(Request $request){
        $rules = [
            'regCode' => ['required', 'string', 'max:255', 'unique:customers'],
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('add-customer')
                ->withInput()
                ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{
                $customer = new Customer();
                $customer -> regCode = $data['regCode'];
                $customer -> firstName = $data['firstName'];
                $customer -> lastName = $data['lastName'];
                $customer -> address = $data['address'];
                $customer -> phone = $data['phone'];
                $customer -> email = $data['email'];
                $customer->save();
                return redirect('add-customer')->with('status',"Insert successfully");
            }
            catch(Exception $e){
                return redirect('add-customer')->with('failed',"operation failed");
            }
        }
    }

    public function edit(Request $request, $id){
        $customer = Customer::find($id);
        $rules = [
            'regCode' => ['required', 'string', 'max:255', 'unique:customers'],
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('edit-customer/'.$id.'')
                ->withInput()
                ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{
                $customer -> regCode = $data['regCode'];
                $customer -> firstName = $data['firstName'];
                $customer -> lastName = $data['lastName'];
                $customer -> address = $data['address'];
                $customer -> phone = $data['phone'];
                $customer -> email = $data['email'];
                $customer->save();
                return redirect('edit-customer/'.$id.'')->with('status',"Update successfully");
            }
            catch(Exception $e){
                return redirect('edit-customer/'.$id.'')->with('failed',"operation failed");
            }
        }
    }

    public function delete($id) {
        $customer = Customer::find($id);
        try {
            $customer->delete();
            return redirect('customers')->with('status',"Delete successfully");
        }
        catch(Exception $e){
            return redirect('customers')->with('failed',"operation failed");
        }
    }

}
