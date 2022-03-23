<?php

namespace PonderSource\WSSE;

use JMS\Serializer\Annotation\{XmlNamespace,XmlRoot,SerializedName,XmlAttributeMap};

/**
 * @XmlNamespace(uri="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd", prefix="wsse");
 * @XmlRoot("wsse:Security");
 */
class Security {
    /**
     * @XmlAttributeMap
     */
    private $attributes = ['S12:MustUnderstand' => 'true'];

    public function __construct(){
        return $this;
    }

    public function generateSignature(){}

    public function generateBinarySecurityToken(){}

    public function generateEncryptedData(){}

    public function generateEncryptedKey(){}

}