<?php

declare(strict_types=1);

namespace App;

use Exception;
use App\Exceptions\ViewNotFoundException;
use Illuminate\View\Factory;
use Illuminate\Events\Dispatcher;
use Illuminate\View\FileViewFinder;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Compilers\BladeCompiler;

class View
{
    public function __construct(
        protected string $view,
        protected array $data = []
    )
    {
    }
    
    public static function make(string $view, array $data = []): static
    {
        return new static($view, $data);
    }
    
    public function render(): string
    {
        $fileSystem = new Filesystem();
        
        $viewFinder = new FileViewFinder($fileSystem, [VIEW_PATH]);
        
        $resolver = new EngineResolver();
        $resolver->register('blade', function () use ($fileSystem) {
            return new CompilerEngine(new BladeCompiler($fileSystem, STORAGE_PATH . '/cache', 'cache'));
        });
        
        $viewFactory = new Factory($resolver, $viewFinder, new Dispatcher());
        
        try {
            return $viewFactory->make($this->view)->with($this->data)->render();
        } catch (Exception $e) {
            die('Error Creating View: ' . $e->getMessage());
        }
    }
    
    public function __toString(): string
    {
        return $this->render();
    }
}
