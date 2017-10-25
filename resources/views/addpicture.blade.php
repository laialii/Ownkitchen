<!DOCTYPE html>
<html>
    <head>
        <title>Add Image</title>
    </head>
    <body>
        <h1>Add Image</h1>
        {!! Form::open(array('url' => 'add', 'files'=>true)) !!}
        <div>
            <p>
                {!! Form::label('Chose the picture:') !!}
                {!! Form::file('imagem') !!}
                enctype="multipart/form-data"
            </p>

        </div>
        <div>
            {!! Form::submit('Add record') !!}
        </div>
    </body>
</html>
