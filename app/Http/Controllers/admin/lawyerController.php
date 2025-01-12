<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Lawyer;
use Illuminate\Http\Request;

class lawyerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lawyers = Lawyer::paginate('10');

       return view('admin.lawyers' , compact('lawyers'));

    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lawyer = Lawyer::findOrFail($id);
        try {
            // التحقق من حالة المستخدم وتحديثها
            if ($lawyer->status == 1) {
                $lawyer->update(['status' => 0]); // تغيير الحالة إلى غير نشط
                return redirect()->back()->with('success', 'lawyer deactivated successfully.');
            } else {
                $lawyer->update(['status' => 1]); // تغيير الحالة إلى نشط
                return redirect()->back()->with('success', 'lawyer activated successfully.');
            }
        } catch (\Exception $e) {
            // في حال وجود خطأ أثناء التحديث
            return redirect()->back()->with('failed', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
