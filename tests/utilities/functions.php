<?php

function create ($class, $attributes = []) {
    return factory('App\\' . $class)->create($attributes);
}

function make ($class, $attributes = []) {
    return factory('App\\' . $class)->make($attributes);
}
