<?php
/**
 * Created by PhpStorm.
 * User: justin
 * Date: 4/27/17
 * Time: 12:40 AM
 */

$active['hash'] = '';
$active['lookup'] = '';
if(!empty($setActive)) {
    switch($setActive) {
        case 'hash':
            $active['hash'] = ' class="active"';
            break;
        case 'lookup':
            $active['lookup'] = ' class="active"';
            break;
    }
}
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
                <li{!! $active['hash'] !!}><a href="{{url('/hash')}}">GENERATE MD5 HASH</a></li>
                <li{!! $active['lookup'] !!}><a href="{{url('/lookup')}}">LOOKUP MD5 HASH</a></li>
            </ul>
        </div>
    </div>
</nav>
