<?php

class ApiView
{
    function response($data, $status)
    {
        header("Content-Type: application/json");
        header('HTTP/1.1 ' . $status . " " . $this->requestStatus($status));
        echo json_encode($data);
    }

    function requestStatus($status)
    {

        $statusMessages = array(
            200 => "OK",
            201 => "Created",
            400 => "Bad Request",
            404 => "Not Found",
            500 => "Internal Server Error"
        );

        return (isset($statusMessages[$status])) ? $statusMessages[$status] : $statusMessages[500];
    }
}
