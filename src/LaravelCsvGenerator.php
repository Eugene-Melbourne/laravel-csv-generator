<?php

namespace LaravelCsvGenerator;

use Symfony\Component\HttpFoundation\StreamedResponse;
use function response;

class LaravelCsvGenerator
{

    const DEFAULT_HTTP_HEADERS = [
        "Content-type"        => "text/csv",
        "Content-Disposition" => "attachment; filename=file.csv",
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0"
    ];

    protected $headers     = null;
    protected $data        = null;
    protected $httpHeaders = null;


    public function setHeaders(array $headers): self
    {
        $this->headers = $headers;

        return $this;
    }


    public function setData(array $data): self
    {
        $this->data = $data;

        return $this;
    }


    public function setHttpHeaders(array $httpHeaders): self
    {
        $this->httpHeaders = $httpHeaders;

        return $this;
    }


    public function renderStream(string $fileName = null): StreamedResponse
    {
        $fileName    = $fileName ?? 'file.csv';
        $httpHeaders = $this->httpHeaders ?? self::DEFAULT_HTTP_HEADERS;

        return response()->streamDownload(
                function (): void {
                // Output the generated Csv to Browser
                $file = fopen('php://output', 'w');
                fputcsv($file, $this->headers);
                foreach ($this->data as $record) {
                    fputcsv($file, $record);
                }
                fclose($file);
            }, $fileName, $httpHeaders);
    }


    public function toString(): string
    {
        $res = implode(',', $this->headers) . "\n";
        foreach ($this->data as $record) {
            $res .= '"' . implode('","', $record) . '"' . "\n";
        }

        return $res;
    }


}
