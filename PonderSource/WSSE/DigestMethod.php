<?php

namespace PonderSource\WSSE;

interface DigestMethod {
    public function getUri();
    public function getDigest($value);
}