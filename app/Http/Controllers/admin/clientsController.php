<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class clientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // جلب المستخدمين مع الأسئلة الخاصة بهم
        $clients = User::with(['questions' ,  'chances'])->paginate(10);

        return view('admin.clients', [
            'clients' => $clients,
        ]);
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
        $client = User::findOrFail($id);
        try {
            // التحقق من حالة المستخدم وتحديثها
            if ($client->status == 1) {
                $client->update(['status' => 0]); // تغيير الحالة إلى غير نشط
                return redirect()->back()->with('success', 'User deactivated successfully.');
            } else {
                $client->update(['status' => 1]); // تغيير الحالة إلى نشط
                return redirect()->back()->with('success', 'User activated successfully.');
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
