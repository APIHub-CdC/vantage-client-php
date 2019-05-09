<?php
    
namespace APIHub\Client\Interceptor;

use \Monolog\Logger;
use \Monolog\Formatter\LineFormatter;
use \Monolog\Handler\StreamHandler;

use \APIHub\Client\Interceptor\MyLogger;

Class KeyHandler{

    private $private_key = null;
    private $public_key = null;
    private $logger = null;

    public function __construct($keypair_route = null, $cdc_cert_route = null, $password = ""){
        $this->logger = new MyLogger('KeyHandler');
        
        $keypair_file = __DIR__."/keypair.p12";
        $cert_file = __DIR__."/cdc_cert.pem";
        if ($keypair_route != null && $cdc_cert_route != null) {
            $keypair_file = $keypair_route;
            $cert_file = $cdc_cert_route;
        }
        $this->logger->info("Keypair file is: ".$keypair_file);
        $this->logger->info("CDC certificate is: ".$cert_file);
        $pkcs12 = array();

        try{
            $file_pkcs12 = file_get_contents($keypair_file);
            if (isset($file_pkcs12)) {
                openssl_pkcs12_read($file_pkcs12, $pkcs12, $password);
                if (isset($pkcs12['pkey'])) {
                    $this->logger->info("Private key loaded");
                    $this->private_key = openssl_pkey_get_private($pkcs12['pkey']);
                }
                else{
                    $this->logger->error("Could not read private key, please review your configuration");
                    exit(1);
                }
            }
            else{
                $this->logger->error("Could not read pkcs12 file, please review your configuration");
                exit(1);
            }
            $file_cert = file_get_contents($cert_file);
            if (isset($file_cert)) {
                $this->logger->info("Public key loaded");
                $this->public_key = openssl_pkey_get_public($file_cert);
            }
            else{
                $this->logger->error("Could not read public key, please review your configuration");
                exit(1);
            }
            
        }
        catch(Exception $e){
            $this->logger->error('Exception at __construct: '.$e->getMessage().PHP_EOL);
        }
    }

    public function getSignatureFromPrivateKey($toSign){
        $signature_text = null;
        
        try{
            if ($toSign == null) {
                $this->logger->error("Empty object");
                exit(1);
            }
            else if ($this->private_key == null) {
                $this->logger->error("Could not read private key, please review your configuration");
                exit(1);
            }
            else{
                openssl_sign($toSign, $signature, $this->private_key, OPENSSL_ALGO_SHA256);
                $signature_text = bin2hex($signature);
                if (isset($signature_text)) {
                    $this->logger->info("The signature is: ".$signature_text);
                }
            }
            
        }
        catch(Exception $e){
            $this->logger->error('Exception when calling getSignatureFromPrivateKey: '.$e->getMessage().PHP_EOL);
        }

        return $signature_text;
    }

    public function getVerificationFromPublicKey($data, $signature){
        $is_verified = false;
        try{
            $signature = hex2bin($signature);
            if (!isset($signature)) {
                $this->logger->error("Signature not given or is malformed");
            }
            else if ($this->public_key == null) {
                $this->logger->error("Could not read public key, please review your configuration");
                exit(1);
            }
            else{
                $result = openssl_verify($data, $signature, $this->public_key, OPENSSL_ALGO_SHA256);
                $result == 1 ? $is_verified = true : $is_verified = false;
            }
        }catch (Exception $e){
            $this->logger->error('Exception when calling getVerificationFromPublicKey: '.$e->getMessage().PHP_EOL);
        }
        
        return $is_verified;
    }

    public function close(){
        return openssl_free_key($this->private_key) && openssl_free_key($this->public_key);
    }
}

?>