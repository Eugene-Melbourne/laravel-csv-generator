# LaravelCsvGenerator

Helps download *.csv files from your laravel project.

It is not a package, it is a one file [LaravelCsvGenerator.php](https://github.com/Eugene-Melbourne/LaravelCsvGenerator/blob/master/LaravelCsvGenerator.php) 

that you can copy to your project, in `\app\Services\Generators\` folder.


example of use in your controller 

    class MyController extends Controller
    {

        public function getCsv(): \Symfony\Component\HttpFoundation\StreamedResponse
        {
            $data    = [
                    [1, 2.1],
                    [3, "hi, there"],
                ];
            $headers = ['one', 'two'];

            return (new \App\Services\Generators\CsvGenerator())
                    ->setHeaders($headers)
                    ->setData($data)
                    ->renderStream();
        }
     
                
                
More examples in [routes/web.php](https://github.com/Eugene-Melbourne/LaravelCsvGenerator/blob/master/routes/web.php)

Tested with Laravel 5.7
