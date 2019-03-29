<?php
    
    namespace APIHub\Client\Interceptor;
    
    use \GuzzleHttp\Middleware;
    use \GuzzleHttp\Psr7\Stream;
    use \Psr\Http\Message\RequestInterface as streamRequest;
    use \Psr\Http\Message\ResponseInterface as streamResponse;

    use \APIHub\Client\Interceptor\KeyHandler;
    use \APIHub\Client\Model\Errors;
    use \APIHub\Client\Model\Error;

    class MiddlewareEvents
    {
        
        function __construct(\APIHub\Client\Interceptor\KeyHandler $signer)
        {
            $this->signer = $signer;
        }

        function add_signature_header($header){
            return \GuzzleHttp\Middleware::mapRequest(function (streamRequest $request) use ($header){
                try{
                    $stream = $request->getBody();
                    $payload = $stream->getContents();
                    $stream->rewind();
                    $signature = $this->signer->getSignatureFromPrivateKey($payload);
                }catch (Exception $e) {
                    throw new ApiException(
                        "[{$e->getCode()}] {$e->getMessage()}",
                        $e->getCode(),
                        $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                        $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                    );
                }

                return $request->withHeader($header, $signature);
            });
        }

        function verify_signature_header($header){
            return \GuzzleHttp\Middleware::mapResponse(function (streamResponse $response) use ($header){
                $is_verified = false;
                try{
                    if(isset($response->getHeaders()[$header][0])){
                        $stream = $response->getBody();
                        $payload = $stream->getContents();
                        $stream->rewind();
                        $signature = $response->getHeaders()[$header][0];                   
                        $is_verified = $this->signer->getVerificationFromPublicKey($payload, $signature);

                        if(!$is_verified){
                            $new_stream = build_error("403", "No se pudo verificar x-signature de la respuesta");
                            $new_response = $response->withBody($new_stream)->withStatus(403);
                            
                            return $new_response;
                        }
                    }
                    else{
                        return $response;
                    }
                    
                }
                catch (Exception $e) {
                    $new_response = build_error("500", "No se pudo verificar x-signature de la respuesta, no es válida");
                    $new_response = $response->withBody($new_stream)->withStatus(500);
                            
                    return $new_response;
                }

                return $response;
            });
        }
    }

    function build_error($code, $message){
        $error = new \APIHub\Client\Model\Error([
            "code" => $code,
            "message" => $message
        ]);
        $errors = new \APIHub\Client\Model\Errors(["errors" => [$error]]);

        $resource = fopen('data://text/plain,' . $errors,'r');
        $new_reponse = new \GuzzleHttp\Psr7\Stream($resource);
        
        return $new_reponse;
    }
?>