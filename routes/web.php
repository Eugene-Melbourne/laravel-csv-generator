// example and test

// basic - stream csv to the user
Route::get('csv', function () {

    $data    = [
        [1, 2.1],
        [3, "hi, there"],
    ];
    $headers = ['one', 'two'];
    $data    = array_merge([$headers], $data);

    return (new \LaravelCsvGenerator\LaravelCsvGenerator())
        ->setData($data)
        ->renderStream();
});

// make csv string and then stream it to the user
Route::get('csv-string', function () {

    $httpHeaders = array(
        "Content-type"        => "text/csv",
        "Content-Disposition" => "attachment; filename=file.csv",
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0"
    );

    $data    = [
        [1, 2.1],
        [3, "hi, there"],
    ];
    $headers = ['one', 'two'];
    $data    = array_merge([$headers], $data);

    $str = (new \LaravelCsvGenerator\LaravelCsvGenerator())
    ->setData($data)
    ->toString();

    return response()->make($str, 200, $httpHeaders);
});
