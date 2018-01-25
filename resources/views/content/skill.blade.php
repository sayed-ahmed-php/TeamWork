<select class="{{$class}}" name="skill" id="{{$id}}">
    @foreach($skill as $skill)
        <option>{{$skill['name']}}</option>
    @endforeach
</select>