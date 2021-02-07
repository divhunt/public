<?php

    $response = new classes\App\Response();

    $response->xml($student, new SimpleXMLElement('<result/>'));