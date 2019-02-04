// example and test

Route::get('csv', function () {

    $data    = [
        [1, 2.1],
        [3, "hi, there"],
    ];
    $headers = ['one', 'two'];

    return (new \App\Services\Generators\LaravelCsvGenerator())
        ->setHeaders($headers)
        ->setData($data)
        ->renderStream();
});


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

    $str = (new \App\Services\Generators\LaravelCsvGenerator())
    ->setHeaders($headers)
    ->setData($data)
    ->toString();

    return response()->make($str, 200, $httpHeaders);
});
