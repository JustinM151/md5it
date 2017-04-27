<?php
/**
 * Created by PhpStorm.
 * User: justin
 * Date: 4/27/17
 * Time: 2:41 PM
 */
?>
<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Oh No!</strong>
    <ul>
        @foreach($errors as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>