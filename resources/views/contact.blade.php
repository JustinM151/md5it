<?php
/**
 * Created by PhpStorm.
 * User: justin
 * Date: 4/27/17
 * Time: 12:44 AM
 */
?>
@extends('layouts.main')
@section('nav')
    @include('components.nav')
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1>Drop Us A Line!</h1>
            <form action="{{url('/contact')}}" method="post">
                {{csrf_field()}}
                <fieldset class="well">
                    <div class="form-group">
                        <label for="name">Your Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Your Email:</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea name="message" id="message" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right">SUBMIT</button>
                    </div>
                    <div class="clearfix"></div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
