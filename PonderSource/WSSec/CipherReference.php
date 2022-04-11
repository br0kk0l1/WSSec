<?php

namespace PonderSource\WSSec;

use PonderSource\WSSec\Namespaces;
use JMS\Serializer\Annotation\{XmlElement,XmlRoot,Type,XmlNamespace,SerializedName,XmlAttribute,XmlList};

/**
 * @XmlNamespace(uri=Namespaces::XENC, prefix="xenc")
 * @XmlNamespace(uri=Namespaces::DS, prefix="ds")
 * @XmlRoot("xenc:CipherReference")
 */
class CipherReference {
    /**
     * @SerializedName("URI")
     * @XmlAttribute
     * @Type("string")
     */
    private $uri;

    /**
     * @SerializedName("Transforms")
     * @XmlList(inline=true, entry="Transform", namespace=Namespaces::DS)
     * @Type("array<PonderSource\WSSec\Transform>")
     * @XmlElement(namespace=Namespaces::DS)
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