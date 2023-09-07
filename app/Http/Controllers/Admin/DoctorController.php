<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Major;
use App\Http\Requests\StoreDoctor;
use App\Http\Requests\UpdateDoctor;
use App\Http\traits\UploadFile;

use function PHPUnit\Framework\fileExists;

class DoctorController extends Controller
{

    use UploadFile;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $doctors=Doctor:: with('major')->latest()->paginate(10);
        // dd($doctors);
        return view('AdminLTE.doctor.index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $majors=Major::get();
        // dd($major);
        return view('AdminLTE.doctor.create',compact('majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctor $request)
{
    

    if ($request->hasFile('image')) {
        $image = $request->image;
        $filename=$this->UploadImage($image,'doctor/images');
    }

    Doctor::create([
        'name' => $request->name,
        'image' => $filename??'',
        'major_id' => $request->major
    ]);

    return redirect()->route('doctor.index')->with('success', 'Dr create success');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        $majors=Major::get();
        return view("AdminLTE.doctor.edit",compact('majors','doctor'));
    }

    /**
     * Update the specified resource sin storage.
     */
    public function update(UpdateDoctor $request, Doctor $doctor)
    {

        if ($request->hasFile('image')) {
// dd($doctor->image);
            if ($doctor->image) {
                $this->DeleteImage($doctor->image,'doctor/images');
            }
            $filename=$this->UploadImage($request->image,'doctor/images');
        }

        $doctor->update([
            'name' => $request->name,
            'image' => $filename??$doctor->image,
            'major_id' => $request->major
        ]);
    return redirect()->route('doctor.index')->with('success', 'Dr update success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        if ($doctor->image) {
            $this->DeleteImage($doctor->image,'doctor/images');
        }
        $doctor->delete();
        return redirect()->route('doctor.index')->with('success', 'Dr destroy success');
    }
}
