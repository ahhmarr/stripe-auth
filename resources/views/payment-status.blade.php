@extends('master')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
@section('content')
    <div class="container">
         @if($flag)
            <div class="card">
                <img height="50%" src="data:image/png;base64,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" alt="">
                Also we should say: Thank you for offsetting your trip for {{$amount}}
            </div>
        @else
            <div class="card">
                <img height="50%" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYBuaH-fbgBGt36aP0SmciW0f8BwAGpZTKENhPri4hArf75F9mKA" alt="">
                Error In processing Payment
            </div>
        @endif
    </div>
   
    <style>
        body {
            background-color: #ccc;
        }
        div.card{
            background-color: white;
            position:fixed;
            top:35%;
            width:80%;
            height:250px;
            font-size:30px;
            text-align:center;
            padding-top:60px;
            box-shadow: 1px 1px 13px #999;
        }
        
    </style>
@stop