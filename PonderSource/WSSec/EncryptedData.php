<?php

namespace PonderSource\WSSec;

use JMS\Serializer\Annotation\{XmlRoot, XmlNamespace,XmlAttribute,SerializedName,Type};

/**
 * @XmlNamespace(uri="http://www.w3.org/2001/04/xmlenc#", prefix="xenc")
 * @XmlRoot("xenc:EncryptedData")
 */
class EncryptedData {
    /**
     * @Type("string")
     * @XmlAttribute
     * @SerializedName("Id")
     */
    private $id;
    /**
     * @Type("string")
     * @XmlAttribute
     * @SerializedName("MimeType")
     */
    private $mimeType;
    /**
     * @Type("string")
     * @XmlAttribute
     * @SerializedName("Type")
     */
    private $type;
    /**
     * @Type("PonderSource\WSSec\EncryptionMethod\IEncryptionMethod")
     * @SerializedName("xenc:EncryptionMethod")
     */
    private $encryptionMethod;
    /**
     * @Type("PonderSource\WSSec\KeyInfo")
     * @SerializedName("ds:KeyInfo")
     */
    private $keyInfo;
    /**
     * @Type("PonderSource\WSSec\CipherData")
     * @SerializedName("xenc:CipherData")
     */
    private $cipherData;

    public function __construct($id=null, $mimeType=null, $dataType=null, $encryptionMethod=null, $keyInfo=null, $cipherData=null){
        $this->id = $id;
        $this->mimeType = $mimeType;
        $this->type = $dataType;
        $this->encryptionMethod = $encryptionMethod;
        $this->keyInfo = $keyInfo;
        $this->cipherData = $cipherData;
        return $this;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getMimeType() {
        return $this->mimeType;
    }

    public function setMimeType($mimeType) {
        $this->mimeType = $mimeType;
        return $this;
    }

    public function getDataType(){
        return $this->dataType;
    }

    public function setDataType($dataType){
        $this->dataType = $dataType;
        return $this;
    }

    public function getEncryptionMethod(){
        return $this->encryptionMethod;
    }

    public function setEncryptionMethod($encryptionMethod){
        $this->encryptionMethod = $encryptionMethod;
        return $this;
    }

    public function getKeyInfo(){
        return $this->keyInfo;
    }

    public function setKeyInfo($keyInfo){
        $this->keyInfo = $keyInfo;
        return $this;
    }

    public function getCipherData(){
        return $this->cipherData;
    }

    public function setCipherData($cipherData){
        $this->cipherData = $cipherData;
        return $this;
    }
}