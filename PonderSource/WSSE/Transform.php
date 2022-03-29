<?php

namespace PonderSource\WSSE;

interface Transform {
    public function getUri();
    public function transform($value);
}