<?php
    
namespace APIHub\Client\Interceptor;

Class KeyHandler{

    private $private_key = null;
    private $public_key = null;

    public function __construct($keypair_route = null, $cdc_cert_route = null, $password = ""){
        $keypair_file = __DIR__."/keypair.p12";
        $cert_file = __DIR__."/cdc_cert.pem";
        if ($keypair_route != null && $cdc_cert_route != null) {
            $keypair_file = $keypair_route;
            $cert_file = $cdc_cert_route;
        }
        $pkcs12 = array();
        try{
            $file_pkcs12 = file_get_contents($keypair_file);
            $file_cert = file_get_contents($cert_file);
            openssl_pkcs12_read($file_pkcs12, $pkcs12, $password);
            $this->private_key = openssl_pkey_get_private($pkcs12['pkey']);
            $this->public_key = openssl_pkey_get_public($file_cert);
        }
        catch(Exception $e){
            throw new Exception("Error retrieving file pkcs12", 1);
        }
    }

    public function getSignatureFromPrivateKey($toSign){
        $signature_text = null;
        
        try{
            if ($toSign == null || !$this->private_key) {
                throw new Exception("Could not read the private key", 1);
            }
            else{
                openssl_sign($toSign, $signature, $this->private_key, OPENSSL_ALGO_SHA256);
                $signature_text = bin2hex($signature);
            }
            
        }
        catch(Exception $e){
            return null;
        }
        

        return $signature_text;
    }

    public function getVerificationFromPublicKey($data, $signature){
        $is_verified = false;
        try{
            $signature = hex2bin($signature);
            if (!$this->public_key) {
                echo "Could not read the public key\n";
            }
            else{
                $result = openssl_verify($data, $signature, $this->public_key, OPENSSL_ALGO_SHA256);
                $result == 1 ? $is_verified = true : $is_verified = false;
            }
        }catch (Exception $e){
            return $is_verified;
        }
        
        return $is_verified;
    }

    public function close(){
        return openssl_free_key($this->private_key) && openssl_free_key($this->public_key);
    }
}

?>