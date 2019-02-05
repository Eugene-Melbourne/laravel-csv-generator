# LaravelCsvGenerator

Helps download *.csv files from your laravel project.

Installation

    $ composer require  eugene-melbourne/laravel-csv-generator
    
example of use in your controller 

    class MyController extends Controller
    {

        public function getCsv(): \Symfony\Component\HttpFoundation\StreamedResponse
        {
            $data = [
                    [1, 2.1],
                    [3, "hi, there"],
                ];
            $headers = ['one', 'two'];
            $data = array_merge([$headers], $data);

            return (new \LaravelCsvGenerator\LaravelCsvGenerator())                    
                    ->setData($data)
                    ->renderStream();
        }
     
set your own http headers with `->setHttpHeaders(array $httpHeaders)`

get csv as string `->toString()`
              
              
              
More examples in [routes/web.php](https://github.com/Eugene-Melbourne/LaravelCsvGenerator/blob/master/routes/web.php)

Tested with Laravel 5.7
