<?php

namespace App\Exports;

use App\MsStudents;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DownloadFormatImportStudents implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        // Karena kita cuma mau download format excel nya saja maka tidak usah ambil data dari model.
        return view('folder_excel.download_format_import_students');
    }
}
