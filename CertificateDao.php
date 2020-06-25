<?php
interface CertificateDao
{
    public function addCertificate($img,$b,$ceid);
    
    public function getCertificate($sid,$conn);
    
}
