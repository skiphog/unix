<?php

namespace App\Controllers;

trait ApiResponser
{
    /**
     * @param array $data
     * @param int   $code
     *
     * @return \Crudch\Http\Response
     */
    public function error(array $data, $code = 422)
    {
        return json(['errors' => $data], $code);
    }

    /**
     * @param mixed $data
     * @param int   $code
     *
     * @return \Crudch\Http\Response
     */
    public function success($data = null, $code = 200)
    {
        return json(['status' => 'ОК', 'data' => $data], $code);
    }
}
