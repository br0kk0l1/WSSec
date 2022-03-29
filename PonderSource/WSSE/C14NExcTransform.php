<?php

namespace PonderSource\WSSE;

use JMS\Serializer\Annotation\{XmlAttribute,SerializedName};

class C14NExcTransform implements Transform {
    /**
     * @XmlAttribute
     * @SerializedName("Algorithm")
     */
    private $uri = "http://www.w3.org/2001/10/xml-exc-c14n#";

    public function getUri() {
        return $this->uri;
    }

    public function transform($value){
        $dom = new \DOMDocument();
        $dom->loadXML($value);
        return $dom->C14N($exclusive=true);
    }
}