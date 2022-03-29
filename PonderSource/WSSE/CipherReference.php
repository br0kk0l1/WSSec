<?php

namespace PonderSource\WSSE;

use JMS\Serializer\Annotation\{XmlNamespace,SerializedName,XmlAttribute,XmlList};

/**
 * @XmlNamespace(uri="http://www.w3.org/2001/04/xmlenc#")
 */
class CipherReference {
    /**
     * @SerializedName("URI")
     * @XmlAttribute
     */
    private $uri;

    /**
     * @SerializedName("Transforms")
     * @XmlList(inline=true, entry="Transform", namespace="http://www.w3.org/2000/09/xmldsig#")
     */
    private $transforms = [];

    public function __construct($uri, $transforms = []){
        $this->uri = $uri;
        $this->transforms = $transforms;
        return $this;
    }

    public function setUri($uri){
        $this->uri = $uri;
        return $this;
    }
    public function getUri(){
        return $this->uri;
    }
    public function setTransforms($transforms){
        $this->transforms = $transforms;
        return $this;
    }
    public function getTransforms(){
        return $this->transforms;
    }
    public function addTransform($transform){
        array_push($this->transforms, $transform);
        return $this;
    }
    public function removeTransform($transform){
        array_filter($this->transforms, function($t) { return $t != $transform; });
        return $this;
    }
}