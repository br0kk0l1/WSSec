<?php

namespace PonderSource\WSSec;

use JMS\Serializer\Annotation\{Type, XmlRoot,XmlNamespace,XmlAttribute,SerializedName,XmlList};

/**
 * @XmlNamespace(uri="http://www.w3.org/2001/04/xmlenc#", prefix="xenc")
 * @XmlRoot("xenc:EncryptedKey")
 */
class EncryptedKey {
    /**
     * @XmlAttribute
     * @SerializedName("Id")
     * @Type("string")
     */
    private $id;

    /**
     * @SerializedName("xenc:EncryptionMethod") 
     * @Type("PonderSource\WSSec\EncryptionMethod\IEncryptionMethod")
     */
    private $encryptionMethod;

    /**
     * @SerializedName("ds:KeyInfo")
     * @Type("PonderSource\WSSec\KeyInfo")
     */
    private $keyInfo;

    /**
     * @SerializedName("xenc:CipherData")
     * @Type("PonderSource\WSSec\CipherData")
     */
    private $cipherData;

    /**
     * @XmlList(entry="xenc:DataReference")
     * @SerializedName("xenc:ReferenceList")
     * @Type("array<PonderSource\WSSec\DataReference>")
     */
    private $referenceList = [];

    public function __construct(){
        return $this;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }
    public function getId(){
        return $this->id;
    }
    public function setEncryptionMethod($encryptionMethod){
        $this->encryptionMethod = $encryptionMethod;
        return $this;
    }
    public function getEncryptionMethod(){
        return $this->encryptionMethod;
    }
    public function setKeyInfo($keyInfo){
        $this->keyInfo = $keyInfo;
        return $this;
    }
    public function getKeyInfo(){
        return $this->keyInfo;
    }
    public function setCipherData($cipherData){
        $this->cipherData = $cipherData;
        return $this;
    }
    public function getCipherData(){
        return $this->cipherData;
    }
    public function setReferenceList($referenceList){
        $this->referenceList = $referenceList;
        return $this;
    }
    public function getReferenceList(){
        return $this->referenceList;
    }
    public function addReference($reference){
        array_push($this->referenceList, $reference);
        return $this;
    }
    public function removeReference($reference){
        array_filter($this->referenceList, function($r) { return $r != $reference; });
        return $this;
    }

}