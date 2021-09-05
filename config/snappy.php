<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Snappy PDF / Image Configuration
    |--------------------------------------------------------------------------
    |
    | This option contains settings for PDF generation.
    |
    | Enabled:
    |    
    |    Whether to load PDF / Image generation.
    |
    | Binary:
    |    
    |    The file path of the wkhtmltopdf / wkhtmltoimage executable.
    |
    | Timout:
    |    
    |    The amount of time to wait (in seconds) before PDF / Image generation is stopped.
    |    Setting this to false disables the timeout (unlimited processing time).
    |
    | Options:
    |
    |    The wkhtmltopdf command options. These are passed directly to wkhtmltopdf.
    |    See https://wkhtmltopdf.org/usage/wkhtmltopdf.txt for all options.
    |
    | Env:
    |
    |    The environment variables to set while running the wkhtmltopdf process.
    |
    */
    
    'pdf' => [
        'enabled' => true,
        // BINARY FOR LOCAL WINDOWS
        //'binary'  => env('SNAPPY_BIN', '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf"'),
        
        // BINARRY FOR BILDPACK HEROKU https://github.com/chap/wkhtmltopdf-heroku-18-buildpack.git
        'binary'  => '/app/bin/wkhtmltopdf',
        
        'timeout' => false,
        'options' => [],
        'env'     => [],
    ],
    
    'image' => [
        'enabled' => true,
        // BINARY FOR LOCAL WINDOWS
        //'binary'  => "C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf",
        
        // BINARRY FOR BILDPACK HEROKU https://github.com/chap/wkhtmltopdf-heroku-18-buildpack.git
        'binary'  => '/app/bin/wkhtmltoimage',
        
        'timeout' => false,
        'options' => [],
        'env'     => [],
    ],

];
