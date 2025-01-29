<?php

namespace App\Infrastructure\Routing;

class Response{
    private int $statusCode;
    private array $headers=[];
    private mixed $body;

    public function __construct(mixed $body=null, int $statusCode=200, array $headers=[]){
        $this->body=$body;
        $this->statusCode=$statusCode;
        $this->headers=$headers;
    }

    static function html(string $template,array $data=[], int $status=200):self{
        ob_start();
        if($data){
            extract($data,EXTR_OVERWRITE);
        }
        include VIEWS.'/'.$template.'.view.php';
        $body=ob_get_clean();
        return new self($body,$status,['Content-Type'=>'text/html']);
    }

    public function send(){
        http_response_code($this->statusCode);
        foreach($this->headers as $key=>$value){
            header("{$header}:{$value}");
        }
        echo $this->body;
    }

    static function json(array $data,int $status=200):self{
        return new self(json_encode($data),$status,['Content-Type'=>'application/json']);
    }

}