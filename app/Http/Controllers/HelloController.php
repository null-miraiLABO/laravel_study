<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

global $head,$style,$body,$end;

$head = '<html><head>';
$style = <<<EOF
    <style>
    body {font-size: 16pt; color: #999;}
    h1 {font-size: 100pt; text-align: right; color: #eee; margin: -40px 0px -50px 0px;}
    </style>
EOF;
$body = '</head><body>';
$end = '</body></html>';

function tag($tag,$txt){
    return "<$tag>" . $txt . "</$tag>";
}

class HelloController extends Controller
{
    public function index() {
        global $head,$style,$body,$end;

        $html = $head . tag('title','Hello/Index') . $style . 
            $body . tag('h1','Index') . tag('p','this is Index') 
            . '<a href="/hello/other">go to other</a>'
            . $end;

        return $html;
    }

    public function other() {
        global $head,$style,$body,$end;

        $html = $head . tag('title','Hello/Other') . $style . 
            $body . tag('h1','Other') . tag('p','this is Other') 
            . '<a href="/hello">go to hello</a>'
            . $end;

        return $html;
    }

    public function requres(Request $request, Response $respose) {
        $html = <<<EOF
        <html>
        <head>
        <title>RequRes</title>
        <style>
        body {font-size: 16pt; color: #999;}
        h1 {font-size: 120pt; text-align: right; color: #fafafa; margin: -50px 0px -120px 0px;}
        </style>
        </head>

        <body>
            <h1>Hello</h1>
            <h3>Request</h3>
            <pre>{$request}</pre>
            <h3>Response</h3>
            <pre>{$respose}</pre>
        </body>
        </html>
        EOF;

        $respose->setContent($html);
        return $respose;
    }
}