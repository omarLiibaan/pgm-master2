<?php
/**
 * Created by IntelliJ IDEA.
 * User: omarl
 * Date: 03.05.2019
 * Time: 15:33
 */
?>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
        @endforeach
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            Success
        </div>
    @endif


    @if(session('error'))
        <div class="alert alert-danger">
            Erreur
        </div>
    @endif
