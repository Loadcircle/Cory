<?php

function active($path){
    return request()->is($path) ? 'active' : '';
}
