<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Raport;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use DateTime;

class RaportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allRaports()
    {
        $raports = Raport::all();
        return view('raports/raports', ['raports' => $raports]);
    }

    public function addRaport()
    {
        $customers = Customer::all();
        return view('raports/addRaport', ['customers' => $customers]);
    }

    public function deleteRaport($id)
    {
        $raport = Raport::find($id);
        return view('raports/deleteRaport', ['raport' => $raport]);
    }

    public function create(Request $request){
        $customers = Customer::all();
        $rules = [
            'sample_name' => ['required', 'string', 'max:255'],
            'test_start_date' => ['required', 'date'],
            'test_end_date' => ['required', 'date'],
            'id_user' => ['required', 'int'],
            'id_customer' => ['required', 'int'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('add-raport')
                ->withInput()
                ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{
                $raport = new Raport();
                $raport -> sample_name = $data['sample_name'];
                $raport -> test_start_date = $data['test_start_date'];
                $raport -> test_end_date = $data['test_end_date'];
                $raport -> id_user = $data['id_user'];
                $raport -> id_customer = $data['id_customer'];
                $raport->save();
                return redirect('add-raport')->with('status',"Insert successfully");
            }
            catch(Exception $e){
                return redirect('add-raport')->with('failed',"operation failed");
            }
        }
    }

    public function delete($id) {
        $raport = Raport::find($id);
        try {
            $raport->delete();
            return redirect('raports')->with('status',"Delete successfully");
        }
        catch(Exception $e){
            return redirect('raports')->with('failed',"operation failed");
        }
    }

    public function newPdf($id)
    {
        $raport = Raport::find($id);
        return view('raports/confirmPdf', ['raport' => $raport]);
    }

    public function addPdf($id)
    {
        $raport = Raport::find($id);
        /*date_default_timezone_set('Europe/Tallinn');
        $today = new DateTime();
        $result = $today->format('H:i:s');*/
        try {
            $pdf = PDF::setOptions(['defaultFont' => 'dejavu serif'])->loadView('raports/pdf', ['raport' => $raport]);
            $fileName =  $id . '.' . 'pdf' ;
            $path = public_path('pdf_files');
            $pdf->save($path . '/' . $fileName);
            return $pdf->download($fileName);
        }
        catch(Exception $e){
            return redirect('raports')->with('failed',"operation failed");
        }
    }
}
