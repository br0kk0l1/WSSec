<?php

namespace PonderSource\WSSec\DigestMethod;

use JMS\Serializer\Annotation\{Type, XmlAttribute, SerializedName};

class SHA256 implements IDigestMethod {
    /**
     * @XmlAttribute
     * @SerializedName("Algorithm")
     * @Type("string")
     */
    private $uri = "http://www.w3.org/2001/04/xmlenc#sha256";

    public function getUri(){
        return SHA256::$uri;
    }
    public function getDigest($value){
        return base64_encode(hash('sha256',$value,true));
    }
}