<?php

namespace PonderSource\WSSec;

use JMS\Serializer\Annotation\{Type, XmlElement, XmlNamespace, SerializedName};

/**
 * @XmlNamespace(uri="http://www.w3.org/2001/04/xmlenc#")
 */
class CipherData {
    /**
     * @SerializedName("xenc:CipherValue")
     * @XmlElement(cdata=false)
     * @Type("string")
     */
    private $cipherValue;

    /**
     * @SerializedName("xenc:CipherReference")
     * @Type("PonderSource\WSSec\CipherReference")
     */
    private $cipherReference;

    public function __construct($cipherDataOrReference){
        if (is_string($cipherDataOrReference)){
            $this->cipherValue = $cipherDataOrReference;
        } else if (is_object($cipherDataOrReference) && get_class($cipherDataOrReference) === 'PonderSource\WSSec\CipherReference'){
            $this->cipherReference = $cipherDataOrReference;
        } else {
            throw new \Exception('CipherData can only contain either CipherValue(string) or CipherReference types');
        }
    }
}