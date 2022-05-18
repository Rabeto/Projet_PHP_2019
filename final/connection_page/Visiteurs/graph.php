<?php

    $invoice = $_POST['num_visiteur'];

    function inc($invoice){
    // Invoice
    $invoice =  preg_replace_callback( "|(\d+)|", "increment", $invoice);

        function increment($matches)
        {
            if(isset($matches[1]))
            {
                $length = strlen($matches[1]);
                return sprintf("%0".$length."d", ++$matches[1]);
            }
        }
    #return $invoice;
    }
    return $invoice;
?>
