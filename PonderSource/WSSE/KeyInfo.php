<?php

namespace PonderSource\WSSE;

use JMS\Serializer\Annotation\{XmlNamespace, XmlAttribute, SerializedName};

/**
 * @XmlNamespace(uri="http://www.w3.org/2000/09/xmldsig#", prefix="ds")
 */
class KeyInfo {
    /**
     * @SerializedName("SecurityTokenReference")
     */
    private $securityTokenReference;

    /**
     * @SerializedName("Id")
     * @XmlAttribute
     */
    private $id;
   
    public function __construct($securityTokenReference, $id){
        $this->securityTokenReference = $securityTokenReference;
        $this->id = $id;
        return $this;
    }

    public function setSecurityTokenReference($securityTokenReference){
        $this->securityTokenReference = $securityTokenReference;
        return $this;
    }
    
    public function getSecurityTokenReference(){
        return $this->securityTokenReference;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getId(){
        return $this->id;
    }
}