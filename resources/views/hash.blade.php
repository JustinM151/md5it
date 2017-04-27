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
    @include('components.nav', ['setActive'=>'hash'])
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1>Generate An MD5 Hash</h1>
        </div>
        <div class="col-md-6">
            <h3>Text To Hash</h3>
            <form action="{{url('/hash')}}" method="post">
                {{csrf_field()}}
                <fieldset class="well">
                    <div class="form-group">
                        <textarea name="text" class="form-control" placeholder="Enter text to be hashed" required>{{ !empty($hash->text) ? $hash->text:'' }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right">GENERATE MD5 HASH</button>
                    </div>
                </fieldset>
            </form>

            @if(!empty($hash))
                <h3>Your MD5 Hash</h3>
                <form action="{{url('/lookup')}}" method="post">
                    {{csrf_field()}}
                    <fieldset class="well">
                        <div class="form-group">
                            <input name="hash" class="form-control" value="{{$hash->hash}}" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">LOOKUP MD5 HASH</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">
                            <h4><strong>Hash Stats</strong></h4>
                            <p><strong>Times Hashed:</strong> {{$hash->hashed_times ?: '0'}}</p>
                            <p><strong>Last Hashed:</strong> {{$hash->hashed_at ? $hash->hashed_at->diffForHumans() : 'Never'}}</p>
                            <p><strong>Times Looked Up:</strong> {{ $hash->queried_times ?:'0'}}</p>
                            <p><strong>Last Lookup:</strong> {{ $hash->queried_at ? $hash->queried_at->diffForHumans() : 'Never'}}</p>
                        </div>
                    </fieldset>
                </form>

            @endif
        </div>

        <div class="col-md-6">
            <h3>About MD5IT.COM</h3>
            <p>MD5IT.COM is a free resource for users to quickly and easily generate MD5 hashes as well as lookup the text values of generated hashes.
                MD5 has been proven insecure and should not be used for storing passwords to sites containing sensitive data.
                That being said a lot of websites on the internet STILL use MD5 as their password hashing algorithm.</p>

            <p>But if you are fine with using MD5, we're fine with providing you the tools to quickly generate it and look it up (to help you troubleshoot your own data).
            If you insist on using MD5, or have no other option because of legacy code, it is highly recomended that you at least start using a "salt" for your hashes.
            A salt is simply additional data you append or prepend to your data before hashing it. This could be a passphrase, the database records ID, the date the record was created, or even better, a combination of all of the above.</p>

            <p>This website was built with PHP using Laravel 5.4 and MySQL and is also open source! You can find the source on github here: <a rel="nofollow" href="https://github.com/JustinM151/md5it" target="_blank">https://github.com/JustinM151/md5it</a></p>
            <p><strong>An important note:</strong> We do not provide the populated database, just this website's source code.</p>
        </div>
    </div>
@endsection
