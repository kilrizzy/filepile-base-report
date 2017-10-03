<?php

namespace App\Reports;

abstract class BaseReport{

    protected $name;
    protected $attributes;

    public function __construct($attributes=[])
    {
        $this->attributes = $attributes;
    }

    public function getHeaders(){
        return [];
    }

    public function getRows(){
        $results = $this->getResults();
        $rows = [];
        foreach($results as $result){
            $rows[] = $this->getRowFromResult($result);
        }
        return $rows;
    }

    public function getResults(){
        return [];
    }

    protected function getRowFromResult($result){
        $row = [];
        return $row;
    }

    public function getName(){
        return $this->name;
    }

    public function getExportArray(){
        $rows = [];
        foreach($this->getRows() as $row){
            $rows[] = $row;
        }
        return $rows;
    }

    protected function defaultExportName(){
        return $this->getName().'-'.date('Y-m-d');
    }

    protected function makeExport($fileName=null){
        $report = $this;
        if(!$fileName){
            $fileName = $this->defaultExportName();
        }
        return \Excel::create($fileName, function($excel) use ($report) {
            $excel->sheet($report->getName(), function($sheet) use ($report) {
                $data = $report->getExportArray();
                $sheet->fromArray($data, null, 'A1', false, true);
            });
        });
    }

    public function export(){
        $export = $this->makeExport();
        $export->export('xls');
    }

    public function saveExport($path, $fileName){
        $export = $this->makeExport($fileName);
        $export->store('xls',$path);
    }

}
