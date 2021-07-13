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
            $body = $e->__toString();
            if($this->areGithubVariablesSet()){
               if(!$this->existsIssueInFileWithBody($filePath, $body)){
                    Http::withBasicAuth(env("GITHUB_USERNAME"),env("GITHUB_TOKEN"))
                    ->post(env("GITHUB_REPO"), [
                        "title" => "Bug in " . $filePath,
                        "body" => $body]
                    );
                }
            }
        });
    }

    /* Esto ni de casualidad va aca, pero lo estoy haciendo para probar, habria que acomodarlo */

    private function areGithubVariablesSet(){
        return !is_null(env("GITHUB_USERNAME")) &&
               (env("GITHUB_USERNAME") != "") &&
               !is_null(env("GITHUB_TOKEN")) &&
               (env("GITHUB_TOKEN") != "") &&
               !is_null(env("GITHUB_REPO")) &&
               (env("GITHUB_REPO") != "");
    }

    private function existsIssueInFileWithBody($fileName, $searchedBody)
    {
        /* Esta funcion hace que no cree muchos issues para un mismo archivo */

        $result = false;
        $searchedTitle = "Bug in " . $fileName;

        $issues = Http::withBasicAuth(env("GITHUB_USERNAME"),env("GITHUB_TOKEN"))
                  ->get(env("GITHUB_REPO"));

       foreach($issues->json() as $issue){
           $issueTitle = $issue["title"];
           $issueBody = $issue["body"];
           if($issueTitle == $searchedTitle && $issueBody == $searchedBody){
               $result = true;
               break;
           }
       }
       return $result;
    }
}