<?php

namespace PonderSource\WSSec;

use JMS\Serializer\Annotation\{Type, XmlNamespace,XmlAttribute,SerializedName,XmlList,XmlElement};

/**
 * @XmlNamespace(uri="http://www.w3.org/2000/09/xmldsig#")
 */
class DSigReference {

    /**
     * @XmlAttribute
     * @SerializedName("URI")
     * @Type("string")
     */
    private $uri;

    /**
     * @XmlList(entry="ds:Transform") 
     * @SerializedName("ds:Transforms")
     * @Type("array<PonderSource\WSSec\Transform\ITransform>")
     */
    private $transforms;

    /**
     * @SerializedName("ds:DigestMethod")
     * @XmlElement(cdata=false, namespace="http://www.w3.org/2000/09/xmldsig#")
     * @Type("PonderSource\WSSec\DigestMethod\IDigestMethod")
     */
    private $digestMethod;

    /**
     * @SerializedName("ds:DigestValue")
     * @XmlElement(cdata=false, namespace="http://www.w3.org/2000/09/xmldsig#")
     * @Type("string")
     */
    private $digestValue;

    public function __construct($uri, $content, $transforms, $digestMethod){
        $this->uri = $uri;
        $this->digestMethod = $digestMethod;
        $this->transforms = $transforms;
        foreach($transforms as $transform){
            $content = $transform->transform($content);
        }
        $this->digestValue = $digestMethod->getDigest($content);
    }
}