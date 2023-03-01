<?php

declare(strict_types=1);

namespace App;

use Dotenv\Dotenv;
use App\Exceptions\RouteNotFoundException;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;

class Application
{
    private Config $config;

    public function __construct(
        private Container $container,
        private ?Router $router = null,
        private array  $request = []
    )
    {
    }
    
    public function initDb(array $config): void
    {
        $capsule = new Capsule();
        $capsule->addConnection($config);
        $capsule->setEventDispatcher(new Dispatcher($this->container));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
    
    public function getContainer(): Container
    {
        return $this->container;
    }
    
    public function boot(): self
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();
        
        $this->config = new Config($_ENV);
        
        $this->initDB($this->config->db);
        
        return $this;
    }
    
    public function run(): void
    {
        try {
            echo $this->router->resolve($this->request['method'], $this->request['uri']);
        } catch (RouteNotFoundException $e) {
            http_response_code(404);
            
            echo view('errors.404');
        }
    }
}
