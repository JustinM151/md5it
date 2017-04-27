<?php
/**
 * Created by PhpStorm.
 * User: justin
 * Date: 4/27/17
 * Time: 12:40 AM
 */
?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">MD5IT.COM</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{url('/hash')}}">GENERATE MD5 HASH</a></li>
                <li><a href="{{url('/lookup')}}">LOOKUP HASH</a></li>
            </ul>
            <form action="{{url('/search')}}" class="navbar-form navbar-left" role="search" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Quick Search" required>
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>
        </div>
    </div>
</nav>
