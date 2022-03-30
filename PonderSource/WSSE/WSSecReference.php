<?php

namespace PonderSource\WSSE;

use JMS\Serializer\Annotation\{XmlNamespace,SerializedName,XmlAttribute};

/**
 * @XmlNamespace(uri="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd");
 */
class WSSecReference {
    /**
     * @SerializedName("ValueType")
     * @XmlAttribute
     */
    private $valueType;

    /**
     * @SerializedName("URI")
     * @XmlAttribute
     */
    private $uri;

    public function __construct($uri, $valueType = null) {
        $this->uri = $uri;
        $this->valueType = $valueType;
        return $this;
    }

    public function setURI($uri){
        $this->uri = $uri;
        return $this;
    }

    public function getURI(){
        return $this->uri;
    }

    public function setValueType($valueType){
        $this->valueType = $valueType;
        return;
    }

    public function getValueType(){
        return $this->valueType;
    }
}