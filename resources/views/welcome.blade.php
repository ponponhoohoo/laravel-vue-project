<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
        <!-- Styles -->
        
    </head>
    <body>
        <div id="app">
            <example-component v-bind:items='{{$items}}'></example-component>
<!--             <table>
            @foreach($items as $item)
                <tr>
                    <th>{{ $item->title }}</th>
                    <td>{{ $item->content }}</td>
                </tr>
            @endforeach
            </table> -->
        </div>
        
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
