<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Resident;
use App\Apartment;
//use App\AppServiceProvider;
//use App\Illuminate\Support\Facades\Validator;



class ResidentsController extends Controller
{
    public function index()
    {
        $createres = Resident::all();
        return view('CreateRes.index',compact('createres'));
    }
    public function show($id)
    {
        $post = Resident::find($id);
        return view('CreateRes.show', compact('post'));
    }

    public function create()
    {
        /*$customers = Customer::lists('name','id');
        return view('stocks.create', compact('customers'));*/
        $apartment = Apartment:: lists('id');
        return view('CreateRes.create',compact('apartment'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'res_pccid' => 'required|integer',
            'res_fname' => 'required|string',
            'res_lname' => 'required|string',
            'res_gender' => 'required|string',
            'res_status' => 'required',
            'apt_id' => 'required',
            'cntr_name' => 'required'
        ]);
        $resident = new Resident();
        $resident->res_pccid = $request -> res_pccid;
        $resident->res_fname = $request -> res_fname;
        $resident->res_mname = $request -> res_mname;
        $resident->res_lname = $request -> res_lname;
        $resident->res_gender = $request -> res_gender;
        $resident->res_phone = $request -> res_phone;
        $resident->res_cellphone = $request -> res_cellphone;
        $resident->res_email = $request -> res_email;
        $resident->res_pccid = $request -> res_pccid;
        $resident->res_status = $request -> res_status;
        $resident->res_comment = $request -> res_comment;
        $resident->apt_id = $request -> apt_id;
        $resident->cntr_name = $request -> cntr_name;
        $resident -> save();
        //$resident = Request::all();
        //Resident::create($resident);
        return redirect('resident');
    }


    public function edit($id)
    {
        $resident=Resident::find($id);
        //dd($resident);
        return view('CreateRes.edit',compact('resident'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this -> validate ($request, [
            'res_pccid' => 'required|integer',
            'res_fname' => 'required|string',
            'res_lname' => 'required|string',
            'res_gender' => 'required',
            'res_status' => 'required'
        ]);

        // $residentupdate = Request::all();
        $resident = Resident::find($id);
        $resident->res_pccid = $request->res_pccid ;
        $resident->res_fname = $request->res_fname;
        $resident->res_mname = $request->res_mname;
        $resident->res_lname = $request->res_lname;
        $resident->res_gender = $request->res_gender;
        $resident->res_phone = $request->res_phone;
        $resident->res_cellphone = $request->res_cellphone;
        $resident->res_email = $request->res_email;
        $resident->res_status = $request->res_status;
        $resident->res_comment = $request->res_comment;
        $resident->save();
        return redirect('resident');
    }


    public function destroy($id)
    {
        Resident::find($id)->delete();
        return redirect('resident');
    }

}