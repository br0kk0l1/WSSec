<?php

namespace PonderSource\WSSE;

use JMS\Serializer\Annotation\{XmlNamespace, SerializedName};

/**
 * @XmlNamespace(uri="http://www.w3.org/2001/04/xmlenc#")
 * @SerializedName("CipherData")
 */
class CipherData {
    /**
     * @SerializedName("CipherValue")
     */
    private $cipherValue;

    /**
     * @SerializedName("CipherReference")
     */
    private $cipherReference;

    public function __construct($cipherDataOrReference){
        $type = get_class($cipherDataOrReference);
        if ($type === 'PonderSource\WSSE\CipherValue'){
            $this->cipherValue = $cipherValue;
        } else if ($type === 'PonderSource\WSSE\CipherReference'){
            $this->cipherReference = $cipherReference;
        } else {
            throw new Exception('CipherData can only contain either CipherValue or CipherReference types');
        }
    }
}