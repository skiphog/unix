<?php

/**
 * @return \App\Models\Users\Auth
 */
function auth()
{
    return app(\App\Components\Guard::class);
}
