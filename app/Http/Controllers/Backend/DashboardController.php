<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DataPool;
use App\Models\Lead;
use App\Models\Listing;
use App\Models\User;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->hasRole('Super Admin')){
           return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('user.dashboard');

        }


    }

    public function adminDashboard()
    {
        return view('backend.dashboard')
            ->with('listing_count', 12)
            ->with('leads_count', 23)
            ->with('users_count', 323)
            ->with('data_pool_count', 32);
    }


    public function userDashboard()
    {
        return view('user.dashboard');

        return view('backend.dashboard')
            ->with('listing_count', 12)
            ->with('leads_count', 23)
            ->with('users_count', 323)
            ->with('data_pool_count', 32);
    }

    private function getCountsByMonth($modelName)
    {
        $counts = [];
        for ($i = 0; $i < 12; $i++) {
            $counts[] = $modelName::whereMonth('created_at', date('m', strtotime(date('Y-m-01') . " -$i months")))
                ->whereYear('created_at', date('Y', strtotime(date('Y-m-01') . " -$i months")))
                ->count();
        }
        return $counts;
    }

    private function getCountsByStatus($modelName)
    {
        $status = $modelName::getStatus();
        $counts = [];
        foreach ($status as $key => $value) {
            $counts[$key] = $modelName::where('status', $key)->count();
        }
        return $counts;
    }


    // ----------------- Module Generator -----------------
    // ----------------- Module Generator -----------------
    // ----------------- Module Generator -----------------




    public function createModule(Request $request)
    {

        return view('backend.component.create');
    }

    public function storeModule(Request $request)
    {
        $moduleName = $request->moduleName;
        // make array of all fields and type of fields comming in request field_name and field_type coming in array
        foreach ($request->field_name as $key => $value) {
            $fields[] = [
                'field_name' => $request->field_name[$key],
                'field_type' => $request->field_type[$key],
            ];
        }

        // createModelMigrationSeederFiles($moduleName,$fields);
        // createControllerFile($moduleName,$fields);
        // addRouteToApi($moduleName);

    }
}
