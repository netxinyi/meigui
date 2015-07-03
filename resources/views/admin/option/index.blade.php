@extends('admin.master')

@section('body')

    <form class="" action="{{url('/auth/login')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <button type="submit" class="btn btn-green">保存</button>

    </form>

@stop
