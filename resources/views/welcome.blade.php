<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>To DO List App</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body id="app" class="font-sans antialiased">
        <div class="w-screen h-screen bg-green-400 flex justify-center items-center">
          
            <todo-list></todo-list>
        
    
            
        </div>
      
    </body>
</html>
