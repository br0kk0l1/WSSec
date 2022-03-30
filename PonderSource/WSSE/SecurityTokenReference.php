<?php

namespace PonderSource\WSSE;

use JMS\Serializer\Annotation\{XmlNamespace,XmlAttribute,SerializedName,XmlAttributeMap};

/**
 * @XmlNamespace(uri="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd", prefix="wsse");
 * @XmlNamespace(uri="http://docs.oasis-open.org/wss/oasis-wss-wssecurity-secext-1.1.xsd", prefix="wsse11")
 */
class SecurityTokenReference {
    /**
     * @XmlAttributeMap
     */
    private array $attributes;

    /**
     * @SerializedName("wsse:Reference")
     */
    private WSSecReference $reference;

    public function __construct(WSSecReference $reference, array $attributes = []){
        $this->reference = $reference;
        $this->attributes = $attributes;
        return $this;
    }

    public function setId($id){
        $this->attributes['Id'] = $id;
        return $this;
    }

    public function getId(){
        return $this->attributes['Id'];
    }

    public function setReference($reference){
        $this->reference = $reference;
        return $this;
    }

    public function getReference(){
        return $this->reference;
    }

    public function setTokenType($tokenType){
        $this->attributes['TokenType'] = $tokenType;
        return $this;
    }

    public function getTokenType(){
        return $this->tokenType;
    }

    public function setAttributes($attributes){
        $this->attributes = $attributes;
        return $this;
    }

    public function getAttributes(){
        return $this->attributes;
    }
}