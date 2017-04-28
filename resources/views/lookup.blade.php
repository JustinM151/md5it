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
    @include('components.nav', ['setActive'=>'lookup'])
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1>Lookup An MD5 Hash</h1>
        </div>
        <div class="col-md-6">
            <h3>MD5 Hash To Lookup</h3>
            <form action="{{url('/lookup')}}" method="post">
                {{csrf_field()}}
                <fieldset class="well">
                    <div class="form-group">
                        <input type="text" name="hash" class="form-control" placeholder="Enter Hash To Lookup" value="{{ !empty($hash->hash) ? $hash->hash:'' }}" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right">LOOKUP MD5 HASH</button>
                    </div>
                </fieldset>
            </form>

            @if(!empty($hash))
                <h3>Your Reversed MD5 Hash</h3>
                <form action="{{url('/hash')}}" method="post">
                    {{csrf_field()}}
                    <fieldset class="well">
                        <div class="form-group">
                            <textarea name="text" class="form-control" required>{{$hash->text}}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">GENERATE MD5 HASH</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">
                            <h4><strong>Hash Stats</strong></h4>
                            <p><strong>Times Looked Up:</strong> {{ $hash->queried_times ?:'0'}}</p>
                            <p><strong>Last Lookup:</strong> {{ $hash->queried_at ? $hash->queried_at->diffForHumans() : 'Never'}}</p>
                            <p><strong>Times Hashed:</strong> {{$hash->hashed_times ?: '0'}}</p>
                            <p><strong>Last Hashed:</strong> {{$hash->hashed_at ? $hash->hashed_at->diffForHumans() : 'Never'}}</p>
                        </div>
                    </fieldset>
                </form>

            @endif
        </div>

        <div class="col-md-6">
            <h3>How We Reverse MD5 Hashes</h3>
            <p>Many people would call md5it a "MD5 Hash Decryptor" or "MD5 Hash Decoder", neither are correct though.
            md5it reverses the MD5 hash algorithm with the help of a database containing millions of hashes and their text counterparts.
            When you enter a hash to lookup md5it.com searches the database for this hash, pulls it and returns the text value back to you.</p>

            <p>This method of reversing hashes is often called "Rainbow Tables".
                An MD5 Rainbow Table is a table in a database of precomputed hashes and their plain text counterparts.
                Rainbow Tables are generally used for cracking password hashes, but in the case of md5it.com, we hope you only use this tool for troubleshooting your own data.</p>

            <h3>I got an error telling me to slow down, why?</h3>
            <p>We throttle user requests to 1 request per 3 seconds, which should be more than adequate for human use.
                What we do not wan't to do is enable people to write scripts that use our site as a password cracker.
            By limiting consumption to 1 request per second the site remains 100% usable for humans while severely crippling bots.</p>
        </div>
    </div>
@endsection
