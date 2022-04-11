<?php 

namespace PonderSource\WSSec\CanonicalizationMethod;

use JMS\Serializer\Annotation\{XmlRoot, Type,XmlNamespace,XmlAttribute,SerializedName,XmlValue,XmlElement};
use PonderSource\WSSec\InclusiveNamespaces;
use PonderSource\WSSec\Namespaces;

/**
 * @XmlNamespace(uri=Namespaces::DS, prefix="ds")
 * @XmlNamespace(uri=Namespaces::EC, prefix="ec")
 * @XmlRoot("ds:CanonicalizationMethod")
 */
class C14NExclusive implements ICanonicalizationMethod {
    /**
     * @XmlAttribute
     * @Type("string")
     */
    private $uri = "http://www.w3.org/2001/10/xml-exc-c14n#";

    /**
     * @SerializedName("InclusiveNamespaces")
     * @XmlElement(cdata=false, namespace=Namespaces::EC)
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