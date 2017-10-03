<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class BaseReportController extends Controller
{

    protected $reportClass;
    protected $viewIndex='report.index';
    protected $baseRoute='';

    public function __construct()
    {
    }

    public function index(Request $request){
        $reportClass = $this->reportClass;
        $report = new $reportClass($request->all());
        return view($this->viewIndex,[
            'report'=>$report,
            'baseRoute' => $this->baseRoute,
        ]);
    }

    public function export(Request $request){
        $reportClass = $this->reportClass;
        $report = new $reportClass($request->all());
        $report->export();
    }

}
