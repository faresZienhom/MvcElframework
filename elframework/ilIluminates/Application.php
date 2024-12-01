<?php 
namespace Iliuminates;

use App\Core;
use Iliuminates\Router\Route;
use Iliuminates\Router\Segment;

class Application 
{
    protected $router;

    
    public function start(){
        
        
        
        $this->router = new Route();
        if (Segment::get(0) === 'api') {
            $this->apiRoute(); 
        } else {
            $this->webRoute(); 
        }
     }
    
    public function __destruct()
    {
        
      $this->router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
            
    
    }
    public function webRoute(){
        
        foreach(Core::$globalWeb as $global){
            new $global();
        }
        include route_path('web.php');
    }
    
    
    public function apiRoute(){
        foreach(Core::$globalApi as $global){
            new $global();
        }
        include route_path('api.php');
    }

}
