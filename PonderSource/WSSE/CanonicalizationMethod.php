<?php

namespace PonderSource\WSSE;

interface CanonicalizationMethod {
    public function getAlgorithmUri();
    public function getChildElements();
    public function applyAlgorithm($value);
}