<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            $filePath = $e->getFile();
            if ($this->areGithubVariablesSet()){
               if(!$this->existsIssueInFile($filePath)){
                    Http::withBasicAuth("AgustinNormand",
                    "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")->post(
                        "https://api.github.com/repos/beetlejuice96/TP-Integrador-PAW/issues", [
                        "title" => "Bug in " . $filePath,
                        "body" => $e->__toString()
                    ]);
                }
            }
        });
    }

    /* Esto ni de casualidad va aca, pero lo estoy haciendo para probar, habria que acomodarlo */

    private function areGithubVariablesSet(){
        return !is_null(env("GITHUB_USERNAME")) &&
               !is_null(env("GITHUB_TOKEN")) &&
               !is_null(env("GITHUB_REPO"));
    }

    private function existsIssueInFile($fileName)
    {
        /* Esta funcion hace que no cree muchos issues para un mismo archivo */

        $result = false;
        $searchedTitle = "Bug in " . $fileName;

        $issues = Http::withBasicAuth("AgustinNormand",
            "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")->get(
                "https://api.github.com/repos/beetlejuice96/TP-Integrador-PAW/issues");

       foreach($issues->json() as $issue){
           $issueTitle = $issue["title"];
           if($issueTitle == $searchedTitle){
               $result = true;
               break;
           }
       }
       return $result;
    }
}