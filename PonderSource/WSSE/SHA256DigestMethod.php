<?php

namespace PonderSource\WSSE;

use JMS\Serializer\Annotation\{XmlAttribute, SerializedName};

class SHA256DigestMethod implements DigestMethod {
    /**
     * @XmlAttribute
     * @SerializedName("Algorithm")
     */
    private $uri = "http://www.w3.org/2001/04/xmlenc#sha256";

    public function getUri(){
        return SHA256DigestMethod::$uri;
    }
    public function getDigest($value){
        return base64_encode(hash('sha256',$value,true));
    }
}