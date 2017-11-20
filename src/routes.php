<?php

Route::get('bill', 'arman\billing_software\billingSoftwareController@bill');

Route::post('generate', 'arman\billing_software\billingSoftwareController@generate');