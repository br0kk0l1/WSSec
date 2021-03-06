<?php

namespace PonderSource\WSSec;

use PonderSource\WSSec\Namespaces;
use JMS\Serializer\Annotation\{XmlRoot, Type, XmlNamespace,XmlAttribute,SerializedName,XmlList,XmlElement};

/**
 * @XmlNamespace(uri=Namespaces::DS, prefix="ds")
 * @XmlRoot("ds:Reference")
 */
class DSigReference {

    /**
     * @XmlAttribute
     * @SerializedName("URI")
     * @Type("string")
     */
    private $uri;

    /**
     * @SerializedName("Transforms")
     * @XmlList(inline=true, entry="Transform", namespace=Namespaces::DS) 
     * @Type("array<PonderSource\WSSec\Transform>")
     */
    private $transforms;

    /**
     * @SerializedName("DigestMethod")
     * @XmlElement(cdata=false, namespace=Namespaces::DS)
     * @Type("PonderSource\WSSec\DigestMethod\SHA256")
     */
    private $digestMethod;

    /**
     * @SerializedName("DigestValue")
     * @XmlElement(cdata=false, namespace=Namespaces::DS)
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