@extends('layouts.app')
@section('content')
<div class="list">
    <h2>Posts List</h2>
    <table>
        @foreach ($posts as $post)
        <tr>
        <td>{{$post->title}}</td>
        <td>{{$post->active}}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
