<?php

namespace App\Http\Controllers;

use App\Models\SensorValue;
use Illuminate\Http\Request;

class ShowDataController extends Controller
{
    public function getInfo(Request $request)
    {
        $data = $request->all();

        $paginate = $data['paginate'] ?? 10;
        $page = $data['page'] ?? 1;
        $filter = $data['filter'] ?? null;

        $data = SensorValue::when($filter, function ($query, $filter) {
            return $query->where('value', 'like', "%$filter%")
                ->orWhere('created_at', 'like', "%$filter%");
        })->paginate($paginate, ['*'], 'page', $page);

        return view('dashboard')->with('data', $data);
    }
}
