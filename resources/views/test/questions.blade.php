@extends('layout.main')

@section('content')
    <link rel="stylesheet" href="{{URL::asset('src/css/All-testPage.css')}}">
    <section class="exam">
        <div class="container">
            <div class="hidden user">{{$id}}</div>
            <h3 class="exam-title">{{$name}}</h3>
            @foreach($test as $test)
                <div class="question">
                    <h4>Q{{$test['id']}}:</h4>
                    <p>{{$test['question']}}</p>
                    <input type="radio" value="A" name="{{$test['id']}}">
                    <span> A&#41; </span>
                    <span>{{$test['A']}}</span>
                    <br>
                    <br>
                    <input type="radio" value="B" name="{{$test['id']}}">
                    <span> B&#41; </span>
                    <span>{{$test['B']}}</span>
                    <br>
                    <br>
                    <input type="radio" value="C" name="{{$test['id']}}">
                    <span> C&#41; </span>
                    <span>{{$test['C']}}</span>
                    <br>
                    <br>
                    <input type="radio" value="D" name="{{$test['id']}}">
                    <span> D&#41; </span>
                    <span>{{$test['D']}}</span>
                    <br>
                    <br>
                    <input type="radio" value="{{$test['answer']}}" name="{{$test['id']}}answer" class="hidden">
                </div>
            @endforeach
            @if(Auth::guard('web') -> check())
                <a class="btn btn-primary get-result" data-id='1' href="#">Correct Exam</a>
            @else
                <a class="btn btn-primary get-result" data-id="2" href="#">Correct Exam</a>
            @endif
        </div>
    </section>
    <script type="text/javascript">
        $('.container').find('.get-result').on('click', function (e) {
            e.preventDefault();
            let t = 0;

            for (let i = 1; i <= 40; i++){
                let value = $('input[name='+i+']:checked').val();
                let answer = $('input[name='+i+'answer]').val();

                if (value === answer){
                    t += 1;
                }
            }
            if (e.target.dataset['id'] === 1){
                location.href = '/user/tests/result/'+$('.exam-title').html()+'/'+t+'/'+$('.user').html();
            }else {location.href = '/tests/result/'+$('.exam-title').html()+'/'+t+'/'+$('.user').html();}
        });
    </script>
@endsection

@section('title')
    {{$name}} Test
@endsection