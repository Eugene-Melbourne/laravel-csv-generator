# LaravelCsvGenerator
makes *.csv files from arrays

It is not a package, it is a one file [LaravelCsvGenerator.php](https://github.com/Eugene-Melbourne/LaravelCsvGenerator/blob/master/LaravelCsvGenerator.php) 

that you can copy to your project, in `\app\Services\Generators\` folder.


example of use

     $data    = [
                    [1, 2.1],
                    [3, "hi, there"],
                ];
     $headers = ['one', 'two'];
     
     $str = (new \App\Services\Generators\LaravelCsvGenerator())
                ->setHeaders($headers)
                ->setData($data)
                ->toString();
                
                
More examples in [routes/web.php](https://github.com/Eugene-Melbourne/LaravelCsvGenerator/blob/master/routes/web.php)
