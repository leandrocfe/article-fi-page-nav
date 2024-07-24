<?php

if (! app()->isProduction()) {

    if ($user = \App\Models\User::first()) {
        auth()->login($user);
    }
}
