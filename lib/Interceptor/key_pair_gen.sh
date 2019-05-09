#!/bin/sh

PRIVATE_KEY_FILE=pri_key.pem
CERTIFICATE_FILE=certificate.pem
CERTIFICATE_CDC=cdc_cert.pem
SUBJECT=/C=MX/ST=MX/L=MX/O=CDC/CN=CDC
PKCS12_FILE=keypair.p12
ALIAS=circulo
# KEY_PASSWORD=your_password

# Borra todos los archivos
if [ -f ${PRIVATE_KEY_FILE} ]; then
	rm -rf ${PRIVATE_KEY_FILE}
fi

if [ -f ${CERTIFICATE_FILE} ]; then
	rm -rf ${CERTIFICATE_FILE}
fi

if [ -f ${PKCS12_FILE} ]; then
	rm -rf ${PKCS12_FILE}
fi

#Genera la llave privada.
if [ ! -f ${PRIVATE_KEY_FILE} ]; then
	openssl ecparam -name secp384r1 -genkey -out ${PRIVATE_KEY_FILE}
fi

#Genera el certificado público.
openssl req -new -x509 -days 365 \
	-key ${PRIVATE_KEY_FILE} \
	-out ${CERTIFICATE_FILE} \
	-subj "${SUBJECT}"

# Genera el archivo pkcs12 a partir de la llave privada y el certificado.
# Deberá empaquetar su llave privada y el certificado.
openssl pkcs12 -name ${ALIAS} \
	-export -out ${PKCS12_FILE} \
	-inkey ${PRIVATE_KEY_FILE} \
	-in ${CERTIFICATE_FILE} -password pass:${KEY_PASSWORD}
