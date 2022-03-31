<?php

namespace PonderSource\WSSec\Transform;

use JMS\Serializer\Annotation\{Type, XmlRoot,XmlNamespace,XmlAttribute,SerializedName};
/**
 * @XmlNamespace(uri="http://www.w3.org/2000/09/xmldsig#",prefix="ds")
 * @XmlRoot("ds:Transform")
 */
class C14NExclusive implements ITransform {
    /**
     * @XmlAttribute
     * @SerializedName("Algorithm")
     * @Type("string")
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