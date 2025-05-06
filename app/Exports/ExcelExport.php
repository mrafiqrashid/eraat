<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExcelExport implements FromView
{
    /**
     * @return \Illuminate\Support\View
     */
    protected $request;
    protected $collection;

    public function __construct($request = null, $collection = null)
    {
        $this->request = $request;
        $this->collection = $collection;
    }

    public function view(): View
    {
        return view(
            $this->request->view,
            [
                'data' => $this->collection,
                'request' => $this->request,
                'imageLink' => '../public/eraat.png',
            ],
        );
    }
}
