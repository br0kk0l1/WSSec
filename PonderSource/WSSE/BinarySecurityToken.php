<?php

namespace PonderSource\WSSE;

use JMS\Serializer\Annotation\{XmlAttribute, SerializedName, XmlValue, Exclude};
/**
 * @XmlNamespace(uri="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd");
 */
class BinarySecurityToken {
    /**
     * @XmlAttribute
     * @SerializedName('EncodingType')
     */
    private $encodingType = 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-soap-message-security-1.0#Base64Binary';

    /**
     * @XmlAttribute
     * @SerializedName('ValueType')
     */
    private $valueType = 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-x509-token-profile-1.0#x509v3';

    /**
     * @XmlAttribute
     * @SerializedName('wsu:Id')
     */
    private $id;
    
    /**
     * @Exclude
     */
    private $x509Certificate;
    
    /**
     * @XmlValue(cdata=false)
     */
    private $encryptionToken;

    public function __construct(){}

    public function setEncoding($encoding){
        $this->encodingType = $encoding;
        return $this;
    }
    public function getEncoding(){
        return $this->encodingType;
    }
    public function setValueType($valueType){
        $this->valueType = $valueType;
        return $this;
    }
    public function getValueType(){
        return $this->valueType;
    }
    public function setId($id){
        $this->id = $id;
        return $this;
    }
    public function getId(){
        return $this->id;
    }
    public function setCertificate($x509){
        $this->x509Certificate = $x509;
        $this->encryptionToken = $x509->saveX509($x509->getCurrentCert());
        return $this;
    }
    public function getCertificate(){
        if(isset($this->x509Certificate)){
            return $this->x509Certificate;
        } else if(isset($this->encryptionToken)){
            $this->x509Certificate = new X509();
            $this->x509Certificate->loadX509($this->encryptionToken);
            return $this->x509Certificate;
        } else {
            return null;
        }
    }
}