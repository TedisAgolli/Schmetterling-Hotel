
@extends('app')

@section('content')

    <link rel="stylesheet" href="{{URL::asset('/css/manager_login.css')}}" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8" /> <!--The charset attribute specifies the character encoding for the HTML document.-->
    <title>
        Hotel Manager Log-in Page
    </title>

</head>
<body>




{!!  Form::open(array('url' => 'admin/login')) !!}

        <div id="block"> <!-- Grouping our elements under block.-->


            {!! Form::label('user','p',array('class' => 'user')) !!}<!-- The letter p is converted in the icon on the left part of the username textbox.-->

            {!!  Form::text('name','', array('placeholder'=>'Username','required'=>'required' )) !!}

            {!! Form::label('pass','k',array('class' => 'pass')) !!}<!-- The letter k is converted in the icon(the key) on the left part of the password textbox.-->

           {!!  Form::password('pass', array('placeholder'=>'Password','required'=>'required','minlength'=>'8' )) !!}
  <br>


            

            <div id="error_message">
                @if(Session::has('alert'))
                    <p class="alert alert-success">{{ Session::get('alert') }}</p>
                @endif
            </div>
        {!!  Form::submit('Submit', array('class' => 'submit')) !!}



    </div>

{!! Form::close() !!}





</body>

@stop