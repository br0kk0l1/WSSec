<?php

require __DIR__ . '/vendor/autoload.php';

use PonderSource\WSSec\DigestMethod\SHA256;
use PonderSource\WSSec\CanonicalizationMethod\C14NExclusive;
use PonderSource\WSSec\DSigReference;
use PonderSource\WSSE\{RSAOEAPEncryptionMethod, AES128GCMEncryptionMethod,SwAContentTransform,Security,BinarySecurityToken,EncryptedKey,EncryptionMethod,DigestMethod,MGF,KeyInfo,SecurityTokenReference,WSSecReference,CipherData,CipherValue,CipherReference,ReferenceList,DataReference,EncryptedData,Signature,SignatureMethod,SignedInfo,CanonicalizationMethod,C14NExcCanonicalization,RsaSha256SignatureMethod};
use JMS\Serializer\SerializerBuilder;
use phpseclib3\Crypt\{RSA, Random};
use phpseclib3\File\X509;

$clientPrivateKey = RSA::createKey();
$clientPublicKey = $clientPrivateKey->getPublicKey();
$issuer = new X509;
$issuer->setPrivateKey($clientPrivateKey);
$issuer->setDN([
    'C' => 'Gondor',
    'O' => 'Humanity',
    'CN' => 'Denethor',
    'L' => 'Minas Tirith'
]);
$subject = new X509;
$subject->setPublicKey($clientPublicKey);
$subject->setDN([
    'C' => 'Gondor',
    'O' => 'Humanity',
    'CN' => 'Hirgon',
    'L' => 'Minas Tirith'
]);
$x509 = new X509;
$result = $x509->sign($issuer, $subject);
$clientCertificate = $x509->loadX509($x509->saveX509($result));

$serverPrivateKey = RSA::createKey();
$serverCertificate = new X509;
$serverCertificate->setPublicKey($serverPrivateKey->getPublicKey());
$serverCertificate->setPrivateKey($serverPrivateKey);

$encryptionKey = Random::string(32);

$sha256 = new SHA256();
$c14ne = new C14NExclusive();

$references = [
    new DSigReference('#someid', '<some><content/></some>', [$c14ne], $sha256),
    new DSigReference('#beacons', '<Arrow color="red"/>', [$c14ne], $sha256)
];

$sec = new Security();
$sec->generateSignature($clientPrivateKey, $x509, $references, new C14NExcCanonicalization(), new RsaSha256SignatureMethod());
$res = $sec->encryptData($encryptionKey, $x509, 'cid:whatever-man@cid', 'data is coming');

$serializer = SerializerBuilder::create()->build();
$xmlContent = $serializer->serialize($sec, 'xml');
$dom = new DOMDocument();
$dom->loadXml($xmlContent);
var_dump($dom->C14N($exclusive=true));
