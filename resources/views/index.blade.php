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
            <h1>Generate An MD5 Hash</h1>
        </div>
        <div class="col-md-6">
            <h3>Text To Hash</h3>
            <form action="{{url('/hash')}}" method="post">
                <fieldset class="well">
                    <div class="form-group">
                        <textarea name="text" class="form-control" placeholder="Enter text to be hashed"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right">GENERATE MD5 HASH</button>
                    </div>
                </fieldset>
            </form>
        </div>

        <div class="col-md-6">
            <h3>About MD5IT.COM</h3>
            <p>MD5IT.COM is a free resource for users to quickly and easily generate MD5 hashes as well as lookup the text values of generated hashes.
                MD5 has been proven insecure and should not be used for storing passwords to sites containing sensitive data. That being said a lot of websites in the internet STILL use MD5 as their password hashing algorithm.</p>
            <p>But if you are fine with using MD5, we are fine with providing you the tools to quickly generate it and look it up (to help you troubleshoot your own data).</p>
            <p>This website is also open source! You can find us on github here: http://link-to-github</p>
            <p><strong>An important note:</strong> We do not provide the populated database, just this websites source code.</p>
        </div>
    </div>
@endsection
