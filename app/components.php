<?php

if (!function_exists('createModelMigrationSeederFiles')) {
    function createModelMigrationSeederFiles(string $moduleName, array $fields)
    {

        dd($fields);
        $ucFirstModuleName = Str::ucfirst($moduleName);

        Artisan::call('make:model', [
            'name' => $ucFirstModuleName,
            '-m' => true,
            '-s' => true,
        ]);

        $modelFile = fopen(app_path('Models/' . $ucFirstModuleName . '.php'), "w");

        $content = '<?php

        namespace App\Models;

        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;


        class ' . $ucFirstModuleName . ' extends Model
        {
            use HasFactory;
            protected $fillable = [
                "name",
            ];
        }';
        fwrite($modelFile, $content);

    }
}

if (!function_exists('createControllerFile')) {

    function createControllerFile($moduleName)
    {
        $ucFirstModuleName = Str::ucfirst($moduleName);
        $lowerCase = Str::lower($moduleName);

        Artisan::call('make:controller', [
            'name' => 'Backend/' . $ucFirstModuleName . 'Controller',
        ]);

        $controllerFile = fopen(app_path('Http/Controllers/Backend/' . $ucFirstModuleName . 'Controller.php'), "w");

        $content = '<?php';
        $content .= "\n\n";
        $content .= 'namespace App\Http\Controllers\Backend;';
        $content .= "\n\n";
        $content .= 'use App\Helpers\ActivityLogger;';
        $content .= "\n";
        $content .= 'use App\Http\Controllers\Controller;';
        $content .= "\n";
        $content .= 'use App\Models\\' . $ucFirstModuleName . ';';
        $content .= "\n";
        $content .= 'use Illuminate\Http\JsonResponse;';
        $content .= "\n";
        $content .= 'use Illuminate\Http\Request;';
        $content .= "\n";
        $content .= 'use Illuminate\Support\Facades\DB;';
        $content .= "\n";
        $content .= 'use Illuminate\Support\Facades\Log;';
        $content .= "\n";
        $content .= 'use Illuminate\Support\Str;';
        $content .= "\n\n";
        $content .= 'class ' . $ucFirstModuleName . 'ApiController extends Controller';
        $content .= "\n";
        $content .= '{';
        $content .= "\n\n";
        $content .= '    function getAll' . $ucFirstModuleName . '(Request $request){';
        $content .= "\n\n";
        $content .= '        $' . $lowerCase . ' = ' . $ucFirstModuleName . '::where(function ($query) use ($request) {';
        $content .= "\n";
        $content .= '            $query->where(\'name\', \'like\', \'%\'.$request->searchQuery.\'%\');';
        $content .= "\n";
        $content .= '        })->orderBy($request->sortByColumn, $request->sortOrder)->paginate($request->rowsPerPage, [\'*\'], \'page\', $request->currentPage);';
        $content .= "\n\n";
        $content .= '        return $this->sendResponse(JsonResponse::HTTP_CREATED,"' . $ucFirstModuleName . ' Fetched Successfully", $' . $lowerCase . ' );';
        $content .= "\n\n";

        $content .= '    }';
        $content .= "\n\n";
        $content .= '    function add' . $ucFirstModuleName . '(Request $request){';
        $content .= "\n";
        $content .= '        $' . $lowerCase . ' = new ' . $ucFirstModuleName . '([';
        $content .= "\n";
        $content .= '            \'name\' => $request->name,';
        $content .= "\n";
        $content .= '        ]);';
        $content .= "\n";
        $content .= '        $' . $lowerCase . '->save();';
        $content .= "\n";
        $content .= '        return $this->sendResponse(JsonResponse::HTTP_CREATED,"' . $ucFirstModuleName . ' Created Successfully", $' . $lowerCase . ' );';
        $content .= "\n";
        $content .= '    }';
        $content .= "\n\n";
        $content .= '    function update( ' . $ucFirstModuleName . ' $' . $lowerCase . ', Request $request){';
        $content .= "\n";
        $content .= '        $' . $lowerCase . '->name = $request->name;';
        $content .= "\n";
        $content .= '        $' . $lowerCase . '->save();';
        $content .= "\n\n";
        $content .= '        return $this->sendResponse(JsonResponse::HTTP_OK,"' . $ucFirstModuleName . ' Updated Successfully", $' . $lowerCase . ');';
        $content .= "\n";
        $content .= '    }';
        $content .= "\n\n";
        $content .= '    function destroy( ' . $ucFirstModuleName . ' $' . $lowerCase . ', Request $request){';
        $content .= "\n";
        $content .= '        $' . $lowerCase . '->delete();';
        $content .= "\n\n";
        $content .= '        return $this->sendResponse(JsonResponse::HTTP_OK,"' . $ucFirstModuleName . ' Deleted Successfully", []);';
        $content .= "\n";
        $content .= '    }';
        $content .= "\n\n";
        $content .= "\n\n";
        $content .= '    function bulkDelete( Request $request){';
        $content .= "\n";
        $content .= '        $ids = $request->ids;';
        $content .= "\n";
        $content .= '        $' . $lowerCase . ' = ' . $ucFirstModuleName . '::whereIn(\'id\', $ids)->get();';
        $content .= "\n";
        $content .= '        $' . $lowerCase . '->each->delete();';
        $content .= "\n\n";
        $content .= '        return $this->sendResponse(JsonResponse::HTTP_OK,"' . $ucFirstModuleName . ' Deleted Successfully", []);';
        $content .= "\n";
        $content .= '    }';
        $content .= "\n\n";
        $content .= "\n\n";
        $content .= '}';
        $content .= "\n";

        fwrite($controllerFile, $content);
    }

}

if (!function_exists('addRouteToApi')) {

function addRouteToApi($moduleName){

    $ucFirstModuleName = Str::ucfirst($moduleName);
    $plularModuleName = Str::plural(Str::lower($moduleName));
    $apiRoutesFile = fopen(base_path('routes/backend.php'), "a");

    $content = "\n";
    $content .= 'Route::get(\'/'.$plularModuleName.'\', ['.$ucFirstModuleName.'ApiController::class, \'getAll'.$ucFirstModuleName.'\']);';
    $content .= "\n";
    $content .= 'Route::post(\'/'.$plularModuleName.'/add\', ['.$ucFirstModuleName.'ApiController::class, \'add'.$ucFirstModuleName.'\']);';
    $content .= "\n";
    $content .= 'Route::post(\'/'.$plularModuleName.'/{'.Str::lower($moduleName).'}\', ['.$ucFirstModuleName.'ApiController::class, \'update\']);';
    $content .= "\n";
    $content .= 'Route::delete(\'/'.$plularModuleName.'/{'.Str::lower($moduleName).'}\', ['.$ucFirstModuleName.'ApiController::class, \'destroy\']);';
    $content .= "\n";
    $content .= 'Route::post(\'/'.$plularModuleName.'/bulk\', ['.$ucFirstModuleName.'ApiController::class, \'bulkDelete\']);';

    fwrite($apiRoutesFile, $content);


}
}
