@extends('layouts.index')

<link rel="stylesheet" href="{{ asset('css/poll.css') }}">
<script src="{{ asset('js/poll.js') }}"></script>

@section('content')
<div class="poll-contents">
   <input style="display: none;" type="number" name="" id="pollid" value="{{ $poll['id'] }}">
   <h5>Question :</h5>
   <p class="question">{{ $poll['question'] .'?' }}</p>
   <h5>Description :</h5>
   <p class="description">{{ $poll['description'] }}</p>
   <h5>Options :</h5>
   <ul class="options">
        @foreach($poll['options'] as $index => $option)
            @php
            $percentage = $poll['totalVoters'] > 0 ? ($option['votes'] / $poll['totalVoters']) * 100 : 0;
            @endphp
            <li class="option">
                <div class="view-mode">
                    <p>{{ $option['option'] }}</p>
                    <h5 style="margin: 0; color:blueviolet;">{{ round($percentage) . '%' }}</h5>
                </div>
                <div class="edit-mode" style="display: none;">
                    <input type="text" name="options[]" value="{{ $option['option'] }}" />
                    <input type="number" name="votes[]" value="{{ $option['votes'] }}" />
                </div>
            </li>
        @endforeach
   </ul>
   <button id="edit-button">EDIT</button>
   <button id="save-button" style="display: none;">SAVE</button>
</div>
@endsection