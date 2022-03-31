<?php 

namespace PonderSource\WSSec\CanonicalizationMethod;

use JMS\Serializer\Annotation\{Type,XmlNamespace,XmlAttribute,SerializedName,XmlValue,XmlElement};
use PonderSource\WSSec\InclusiveNamespaces;

/**
 * @XmlNamespace(uri="http://www.w3.org/2000/09/xmldsig#")
 * @XmlNamespace(uri="http://www.w3.org/2001/10/xml-exc-c14n#", prefix="ec")
 */
class C14NExclusive implements ICanonicalizationMethod {
    /**
     * @XmlAttribute
     * @Type("string")
     */
    private $uri = "http://www.w3.org/2001/10/xml-exc-c14n#";

    /**
     * @SerializedName("ec:InclusiveNamespaces")
     * @XmlElement(cdata=false)
     * @Type("PonderSource\WSSec\InclusiveNamespaces")
     */
    private $childElements;

    public function __construct(){
        $this->childElements = new InclusiveNamespaces();
    }

    public function getAlgorithmUri(){
        return $this->uri;
    }
    public function getChildElements(){
        return $childElements;
    }
    public function applyAlgorithm($value){
        $dom = new \DOMDocument();
        $dom->loadXml($value);
        return $dom->C14N($exclusive=true);
    }
}