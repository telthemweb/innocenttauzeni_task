<?php

namespace App\Http\Controllers\Equipments;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Models\Equipment;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
class EquipmentController extends Controller
{

    public function __construct()
    {
        //this middleware will check if user is logged in
        // if you are not logged in it will redirect you back to login page!!
        $this->middleware('auth');
    }
    /**
     * Display a listing of the Equipments.
     */
    public function index()
    {
        //Fetch all users from the table users
        $equipments = Equipment::orderByDesc('created_at')->get();
        if (auth()->user()->can(['view equipments'], $equipments)) {
            //we pass view data Equipments
            return view('equipments.index', compact('equipments'));
        }
        abort(403, 'You are not allowed to view this Equipment');
    }

   

    /**
     * Store a newly created Equipment
     */
    public function store(Request $request)
    {
        $equipment=new Equipment;
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type' => 'required',
            'model' => 'required|string|max:255',
        ]);
        if (auth()->user()->can(['record equipments'], $equipment)) {
            $name= $request->name;
            $type= $request->type;
            $model= $request->model;
            $availability= $request->availability;
            $status=$request->status;
             //if validation fail it will throw error -validation error
             if ($validator->fails()) {
                return redirect()->route('equipments')
                    ->withErrors($validator)
                    ->withInput();
            }

            ///if all is correct system will create Equipment!!

            $equipment->name = $name;
            $equipment->type = $type;
            $equipment->model = $model;
            $equipment->availability = $availability;
            $equipment->status = $status=="true"?true:false;
            $equipment->save();
            return redirect()->route('equipments')->withInput()->with('success', 'Equipment Created Sucessfully!!');
        }
        abort(403, 'You are not allowed to view this Equipment');
    }

   

    /**
     * Show the form for editing the specified Equipment.
     */
    public function edit($id)
    {
        $equipment = Equipment::findOrFail($id);
        if (auth()->user()->can(['edit user'], $equipment)) {
            return view('equipments.edit', compact('equipment'));
        }
        abort(403, 'You are not allowed to edit on this page');
    }

    /**
     * Update the specified Equipment.
     */
    public function update(Request $request, $id)
    {
        $name = $request->name;
        $phone =  $request->phone;
        $email =  $request->email;
        $gender = $request->gender;

        $equipment = Equipment::findOrFail($id);
        //check edit permission
        if (auth()->user()->can('edit equipment')){
            $name= $request->name;
            $type= $request->type;
            $model= $request->model;
            $availability= $request->availability;
            $status=$request->status;

            $equipment->name = $name;
            $equipment->type = $type;
            $equipment->model = $model;
            $equipment->availability = $availability;
            $equipment->status = $status=="true"?true:false;
            $equipment->update([$equipment]);
            redirect()->route('equipments')->withInput()->with('success', 'Equipment Updated Sucessfully!!');
        }
        abort(403, 'You are not allowed to update on this page');
        
    }

    /**
     * Remove the specified Equipment.
     */
    public function destroy($id)
    {
        $equipment = Equipment::findOrFail($id);
        //check delete permission
        if (auth()->user()->can(['edit user'], $equipment)){
            $equipment->delete();
        return redirect()->back()->with('success', 'Successfully deleted Equipment');
        }
        abort(403, 'You are not allowed to delete on this page');
    }

  //get assignment form
  public function getassignform($id){
    $equipment = Equipment::findOrFail($id);
    $users = User::orderByDesc('created_at')->get();
    if (auth()->user()->can(['assign equipment'], $equipment)) {
        return  view('equipments.assignequpment',compact('equipment','users'));
    }
    abort(403, 'You are not allowed to assign on this page');
    
  }

    //assign equipment to the user
    public function assign(Request $request){
        
        $assignmet=new Assignment;
        $equipment = Equipment::findOrFail($request->equipment_id);
        //check permission
        if (auth()->user()->can('assign equipment')) {

            $assignmet->equipment_id = $request->equipment_id;
            $assignmet->user_id = $request->user_id;
            $assignmet->date_assigned = date("Y-m-d h:i:sa");
            $assignmet->return_date =$request->return_date;
            $assignmet->save();

            //update Equipment status to Not Available
            $equipment->availability="Not Available";
            $equipment->update([$equipment]);
            return redirect()->route('equipments')->withInput()->with('success', 'Equipment assigned Sucessfully!!');
        
        }

    }
    public function unassign($id){
        $assignment= Assignment::findOrFail($id);
        $equipment = Equipment::findOrFail($assignment->equipment_id);
        if (auth()->user()->can(['unasign equipment'])) {
            $assignment->delete();

            //update Equipment status to Available
            $equipment->availability="Available";
            $equipment->update([$equipment]);
            return redirect()->back()->withInput()->with('success', 'Equipment has been unassigned Sucessfully!!');
        
        }
        abort(403, 'You are not allowed to delete on this page');
    }
}
