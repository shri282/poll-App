@extends('layouts.index')

<link rel="stylesheet" href="{{ asset('css/polls.css') }}" >
<script src="{{ asset('js/index.js') }}"></script>

@section('content')
<div class="categories">
    <h3 style="text-transform: capitalize; color:gray">poll catagories:</h3>
    <ul>
        @foreach($categories as $category)
        <li onclick="applyfilter(event)">{{ $category }}</li>
        @endforeach
    </ul>
</div>

<div class="polls" id="polls">
    @foreach($polls as $poll)
    <div class="poll-card">
        <p>{{ $poll['question'] . '?'}}</p>
        <ul>
            @foreach($poll['options'] as $option)
            @php
            $percentage = $poll['totalVoters'] > 0 ? ($option['votes'] / $poll['totalVoters']) * 100 : 0;
            @endphp
            <li>
                <p>{{ $option['option'] }}</p>
                <h5 style="margin: 0; color:blueviolet;">{{ round($percentage) . '%' }}</h5>
            </li>
            @endforeach
        </ul>
        <a class="edit-link" href="polls/{{ $poll['id'] }}">
            Edit
        </a>
    </div>
    @endforeach
</div>

<button onclick="showPollForm()" class="add-poll-btn">ADD NEW POLL</button>

<form class="poll-form" id="poll-form">
    @csrf
    <textarea type="text" placeholder="Enter the question" name="question" id="" rows="5" cols="50"></textarea>
    <textarea placeholder="Enter the description" name="description" id="description" rows="5" cols="50"></textarea>
    <textarea type="text" placeholder="Enter the options" name="options" id="option-input" rows="5" cols="50"></textarea>
    <input type="text" placeholder="Enter the category" name="category" id="">
    <select name="status" id="">
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
    </select>
    <button type="submit">ADD</button>
</form>
@endsection

