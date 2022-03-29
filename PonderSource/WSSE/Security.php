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
    private $attributes;

    private $encryptionSecurityToken;

    private $encryptedKey;

    private $encryptedData;

    private $signatureSecurityToken;

    private $signature;

    public function __construct($soap1_2NamespacePrefix = 'S12'){
        $this->attributes[$soap1_2NamespacePrefix . ':MustUnderstand'] = 'true';
        return $this;
    }

    public function generateSignature(){}

    public function generateBinarySecurityToken(){}

    public function generateEncryptedData(){}

    public function generateEncryptedKey(){}

}