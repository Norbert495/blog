@extends('layouts.master')
@section('title', 'Contact')

@section('content')
    <div class="wrapper">
        <div class="rte">
            <h1>Contact</h1>
        </div>

        <form method="POST" action="{{ route('contact') }}">
            @csrf

            <div class="form-fieldset">
                <input class="form-field {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" placeholder="Your e-mail" value="{{ old('email') }}" >
            </div>
            <div class="form-fieldset">
                <input class="form-field {{ $errors->has('subject') ? ' is-invalid' : '' }}" type="text" name="subject" placeholder="Subject" value="{{ old('subject') }}" >
            </div>
            <div class="form-fieldset is-wide">
                <textarea class="form-textarea {{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" placeholder="Message" value="{{ old('message') }}"> </textarea>
            </div>
            <button class="button">Send</button>
        </form>
    </div>
    @endsection
