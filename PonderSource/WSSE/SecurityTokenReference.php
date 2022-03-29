<?php

namespace PonderSource\WSSE;

use JMS\Serializer\Annotation\{XmlNamespace,XmlAttribute,SerializedName};

/**
 * @XmlNamespace(uri="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd", prefix="wsse");
 * @XmlNamespace(uri="http://docs.oasis-open.org/wss/oasis-wss-wssecurity-secext-1.1.xsd", prefix="wsse11")
 */
class SecurityTokenReference {
    /**
     * @XmlAttribute
     * @SerializedName("Id")
     */
    private $id;

    /**
     * @XmlAttribute
     * @SerializedName("TokenType")
     */
    private $tokenType;

    /**
     * @SerializedName("Reference")
     */
    private $reference;

    public function __construct($id, $reference, $tokenType = null){
        $this->id = $id;
        $this->reference = $reference;
        $this->tokenType = $tokenType;
        return $this;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getId(){
        return $this->id;
    }

    public function setReference($reference){
        $this->reference = $reference;
        return $this;
    }

    public function getReference(){
        return $this->reference;
    }

    public function setTokenType($tokenType){
        $this->tokenType = $tokenType;
        return $this;
    }

    public function getTokenType(){
        return $this->tokenType;
    }
}