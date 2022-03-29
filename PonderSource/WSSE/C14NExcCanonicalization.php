<?php 

namespace PonderSource\WSSE;

use JMS\Serializer\Annotation\{XmlNamespace,XmlAttribute,SerializedName,XmlValue,XmlElement};

/**
 * @XmlNamespace(uri="http://www.w3.org/2000/09/xmldsig#")
 */
class C14NExcCanonicalization implements CanonicalizationMethod {
    /**
     * @XmlAttribute
     */
    private $uri = "http://www.w3.org/2001/10/xml-exc-c14n#";

    /**
     * @SerializedName("InclusiveNamespaces")
     * @XmlElement(cdata=false)
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