<?php

namespace APIHub\Client\Model;

use \ArrayAccess;
use \APIHub\Client\ObjectSerializer;


class Peticion implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    protected static $apihubModelName = 'Peticion';

    protected static $apihubTypes = [
        'folio' => 'int',
        'numero_cuenta' => 'string',
        'tipo_contrato' => 'string',
        'tipo_cuenta' => 'string',
        'tipo_frecuencia' => 'string',
        'periodos_vencidos' => 'string',
        'dias_atraso' => 'int',
        'saldo' => 'float',
        'fecha_apertura' => 'string',
        'apellido_parterno' => 'string',
        'apellido_materno' => 'string',
        'nombres' => 'string',
        'fecha_nacimiento' => 'string',
        'rfc' => 'string',
        'direccion' => 'string',
        'colonia_poblacion' => 'string',
        'delegacion_municipio' => 'string',
        'ciudad' => 'string',
        'estado' => 'string',
        'cp' => 'string'
    ];

    protected static $apihubFormats = [
        'folio' => 'int64',
        'numero_cuenta' => null,
        'tipo_contrato' => null,
        'tipo_cuenta' => null,
        'tipo_frecuencia' => null,
        'periodos_vencidos' => null,
        'dias_atraso' => null,
        'saldo' => null,
        'fecha_apertura' => 'DD/MM/YYYY',
        'apellido_parterno' => null,
        'apellido_materno' => null,
        'nombres' => null,
        'fecha_nacimiento' => 'DD/MM/YYYY',
        'rfc' => null,
        'direccion' => null,
        'colonia_poblacion' => null,
        'delegacion_municipio' => null,
        'ciudad' => null,
        'estado' => null,
        'cp' => null
    ];

    public static function apihubTypes()
    {
        return self::$apihubTypes;
    }

    public static function apihubFormats()
    {
        return self::$apihubFormats;
    }

    protected static $attributeMap = [
        'folio' => 'folio',
        'numero_cuenta' => 'numeroCuenta',
        'tipo_contrato' => 'tipoContrato',
        'tipo_cuenta' => 'tipoCuenta',
        'tipo_frecuencia' => 'tipoFrecuencia',
        'periodos_vencidos' => 'periodosVencidos',
        'dias_atraso' => 'diasAtraso',
        'saldo' => 'saldo',
        'fecha_apertura' => 'fechaApertura',
        'apellido_parterno' => 'apellidoParterno',
        'apellido_materno' => 'apellidoMaterno',
        'nombres' => 'nombres',
        'fecha_nacimiento' => 'fechaNacimiento',
        'rfc' => 'rfc',
        'direccion' => 'direccion',
        'colonia_poblacion' => 'coloniaPoblacion',
        'delegacion_municipio' => 'delegacionMunicipio',
        'ciudad' => 'ciudad',
        'estado' => 'estado',
        'cp' => 'cp'
    ];

    protected static $setters = [
        'folio' => 'setFolio',
        'numero_cuenta' => 'setNumeroCuenta',
        'tipo_contrato' => 'setTipoContrato',
        'tipo_cuenta' => 'setTipoCuenta',
        'tipo_frecuencia' => 'setTipoFrecuencia',
        'periodos_vencidos' => 'setPeriodosVencidos',
        'dias_atraso' => 'setDiasAtraso',
        'saldo' => 'setSaldo',
        'fecha_apertura' => 'setFechaApertura',
        'apellido_parterno' => 'setApellidoParterno',
        'apellido_materno' => 'setApellidoMaterno',
        'nombres' => 'setNombres',
        'fecha_nacimiento' => 'setFechaNacimiento',
        'rfc' => 'setRfc',
        'direccion' => 'setDireccion',
        'colonia_poblacion' => 'setColoniaPoblacion',
        'delegacion_municipio' => 'setDelegacionMunicipio',
        'ciudad' => 'setCiudad',
        'estado' => 'setEstado',
        'cp' => 'setCp'
    ];

    protected static $getters = [
        'folio' => 'getFolio',
        'numero_cuenta' => 'getNumeroCuenta',
        'tipo_contrato' => 'getTipoContrato',
        'tipo_cuenta' => 'getTipoCuenta',
        'tipo_frecuencia' => 'getTipoFrecuencia',
        'periodos_vencidos' => 'getPeriodosVencidos',
        'dias_atraso' => 'getDiasAtraso',
        'saldo' => 'getSaldo',
        'fecha_apertura' => 'getFechaApertura',
        'apellido_parterno' => 'getApellidoParterno',
        'apellido_materno' => 'getApellidoMaterno',
        'nombres' => 'getNombres',
        'fecha_nacimiento' => 'getFechaNacimiento',
        'rfc' => 'getRfc',
        'direccion' => 'getDireccion',
        'colonia_poblacion' => 'getColoniaPoblacion',
        'delegacion_municipio' => 'getDelegacionMunicipio',
        'ciudad' => 'getCiudad',
        'estado' => 'getEstado',
        'cp' => 'getCp'
    ];

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    public static function setters()
    {
        return self::$setters;
    }

    public static function getters()
    {
        return self::$getters;
    }

    public function getModelName()
    {
        return self::$apihubModelName;
    }

    const ESTADO_AGS = 'AGS';
    const ESTADO_BC = 'BC';
    const ESTADO_BCS = 'BCS';
    const ESTADO_CAMP = 'CAMP';
    const ESTADO_COAH = 'COAH';
    const ESTADO_COL = 'COL';
    const ESTADO_CHIS = 'CHIS';
    const ESTADO_CHIH = 'CHIH';
    const ESTADO_CDMX = 'CDMX';
    const ESTADO_DGO = 'DGO';
    const ESTADO_GTO = 'GTO';
    const ESTADO_GRO = 'GRO';
    const ESTADO_HGO = 'HGO';
    const ESTADO_JAL = 'JAL';
    const ESTADO_MEX = 'MEX';
    const ESTADO_MICH = 'MICH';
    const ESTADO_MOR = 'MOR';
    const ESTADO_NAY = 'NAY';
    const ESTADO_NL = 'NL';
    const ESTADO_OAX = 'OAX';
    const ESTADO_PUE = 'PUE';
    const ESTADO_QRO = 'QRO';
    const ESTADO_QROO = 'QROO';
    const ESTADO_SLP = 'SLP';
    const ESTADO_SIN = 'SIN';
    const ESTADO_SON = 'SON';
    const ESTADO_TAB = 'TAB';
    const ESTADO_TAMP = 'TAMP';
    const ESTADO_TLAX = 'TLAX';
    const ESTADO_VER = 'VER';
    const ESTADO_YUC = 'YUC';
    const ESTADO_ZAC = 'ZAC';
    
    public function getEstadoAllowableValues()
    {
        return [
            self::ESTADO_AGS,
            self::ESTADO_BC,
            self::ESTADO_BCS,
            self::ESTADO_CAMP,
            self::ESTADO_COAH,
            self::ESTADO_COL,
            self::ESTADO_CHIS,
            self::ESTADO_CHIH,
            self::ESTADO_CDMX,
            self::ESTADO_DGO,
            self::ESTADO_GTO,
            self::ESTADO_GRO,
            self::ESTADO_HGO,
            self::ESTADO_JAL,
            self::ESTADO_MEX,
            self::ESTADO_MICH,
            self::ESTADO_MOR,
            self::ESTADO_NAY,
            self::ESTADO_NL,
            self::ESTADO_OAX,
            self::ESTADO_PUE,
            self::ESTADO_QRO,
            self::ESTADO_QROO,
            self::ESTADO_SLP,
            self::ESTADO_SIN,
            self::ESTADO_SON,
            self::ESTADO_TAB,
            self::ESTADO_TAMP,
            self::ESTADO_TLAX,
            self::ESTADO_VER,
            self::ESTADO_YUC,
            self::ESTADO_ZAC,
        ];
    }
    
    protected $container = [];

    public function __construct(array $data = null)
    {
        $this->container['folio'] = isset($data['folio']) ? $data['folio'] : null;
        $this->container['numero_cuenta'] = isset($data['numero_cuenta']) ? $data['numero_cuenta'] : null;
        $this->container['tipo_contrato'] = isset($data['tipo_contrato']) ? $data['tipo_contrato'] : null;
        $this->container['tipo_cuenta'] = isset($data['tipo_cuenta']) ? $data['tipo_cuenta'] : null;
        $this->container['tipo_frecuencia'] = isset($data['tipo_frecuencia']) ? $data['tipo_frecuencia'] : null;
        $this->container['periodos_vencidos'] = isset($data['periodos_vencidos']) ? $data['periodos_vencidos'] : null;
        $this->container['dias_atraso'] = isset($data['dias_atraso']) ? $data['dias_atraso'] : null;
        $this->container['saldo'] = isset($data['saldo']) ? $data['saldo'] : null;
        $this->container['fecha_apertura'] = isset($data['fecha_apertura']) ? $data['fecha_apertura'] : null;
        $this->container['apellido_parterno'] = isset($data['apellido_parterno']) ? $data['apellido_parterno'] : null;
        $this->container['apellido_materno'] = isset($data['apellido_materno']) ? $data['apellido_materno'] : null;
        $this->container['nombres'] = isset($data['nombres']) ? $data['nombres'] : null;
        $this->container['fecha_nacimiento'] = isset($data['fecha_nacimiento']) ? $data['fecha_nacimiento'] : null;
        $this->container['rfc'] = isset($data['rfc']) ? $data['rfc'] : null;
        $this->container['direccion'] = isset($data['direccion']) ? $data['direccion'] : null;
        $this->container['colonia_poblacion'] = isset($data['colonia_poblacion']) ? $data['colonia_poblacion'] : null;
        $this->container['delegacion_municipio'] = isset($data['delegacion_municipio']) ? $data['delegacion_municipio'] : null;
        $this->container['ciudad'] = isset($data['ciudad']) ? $data['ciudad'] : null;
        $this->container['estado'] = isset($data['estado']) ? $data['estado'] : null;
        $this->container['cp'] = isset($data['cp']) ? $data['cp'] : null;
    }

    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['folio'] === null) {
            $invalidProperties[] = "'folio' can't be null";
        }
        if ($this->container['numero_cuenta'] === null) {
            $invalidProperties[] = "'numero_cuenta' can't be null";
        }
        if ($this->container['tipo_contrato'] === null) {
            $invalidProperties[] = "'tipo_contrato' can't be null";
        }
        if ($this->container['tipo_cuenta'] === null) {
            $invalidProperties[] = "'tipo_cuenta' can't be null";
        }
        if ($this->container['tipo_frecuencia'] === null) {
            $invalidProperties[] = "'tipo_frecuencia' can't be null";
        }
        if ($this->container['periodos_vencidos'] === null) {
            $invalidProperties[] = "'periodos_vencidos' can't be null";
        }
        if ($this->container['dias_atraso'] === null) {
            $invalidProperties[] = "'dias_atraso' can't be null";
        }
        if (($this->container['dias_atraso'] < 1)) {
            $invalidProperties[] = "invalid value for 'dias_atraso', must be bigger than or equal to 1.";
        }

        if ($this->container['saldo'] === null) {
            $invalidProperties[] = "'saldo' can't be null";
        }
        if ($this->container['fecha_apertura'] === null) {
            $invalidProperties[] = "'fecha_apertura' can't be null";
        }
        if (!is_null($this->container['rfc']) && !preg_match("/^([A-ZÑ,&amp;]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\\\\d]{3})?$/", $this->container['rfc'])) {
            $invalidProperties[] = "invalid value for 'rfc', must be conform to the pattern /^([A-ZÑ,&amp;]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\\\\d]{3})?$/.";
        }

        $allowedValues = $this->getEstadoAllowableValues();
        if (!is_null($this->container['estado']) && !in_array($this->container['estado'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'estado', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        return $invalidProperties;
    }

    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }

    public function getFolio()
    {
        return $this->container['folio'];
    }

    public function setFolio($folio)
    {
        $this->container['folio'] = $folio;

        return $this;
    }

    public function getNumeroCuenta()
    {
        return $this->container['numero_cuenta'];
    }

    public function setNumeroCuenta($numero_cuenta)
    {
        $this->container['numero_cuenta'] = $numero_cuenta;

        return $this;
    }

    public function getTipoContrato()
    {
        return $this->container['tipo_contrato'];
    }

    public function setTipoContrato($tipo_contrato)
    {
        $this->container['tipo_contrato'] = $tipo_contrato;

        return $this;
    }

    public function getTipoCuenta()
    {
        return $this->container['tipo_cuenta'];
    }

    public function setTipoCuenta($tipo_cuenta)
    {
        $this->container['tipo_cuenta'] = $tipo_cuenta;

        return $this;
    }

    public function getTipoFrecuencia()
    {
        return $this->container['tipo_frecuencia'];
    }

    public function setTipoFrecuencia($tipo_frecuencia)
    {
        $this->container['tipo_frecuencia'] = $tipo_frecuencia;

        return $this;
    }

    public function getPeriodosVencidos()
    {
        return $this->container['periodos_vencidos'];
    }

    public function setPeriodosVencidos($periodos_vencidos)
    {
        $this->container['periodos_vencidos'] = $periodos_vencidos;

        return $this;
    }

    public function getDiasAtraso()
    {
        return $this->container['dias_atraso'];
    }

    public function setDiasAtraso($dias_atraso)
    {

        if (($dias_atraso < 1)) {
            throw new \InvalidArgumentException('invalid value for $dias_atraso when calling Peticion., must be bigger than or equal to 1.');
        }

        $this->container['dias_atraso'] = $dias_atraso;

        return $this;
    }

    public function getSaldo()
    {
        return $this->container['saldo'];
    }

    public function setSaldo($saldo)
    {
        $this->container['saldo'] = $saldo;

        return $this;
    }

    public function getFechaApertura()
    {
        return $this->container['fecha_apertura'];
    }

    public function setFechaApertura($fecha_apertura)
    {
        $this->container['fecha_apertura'] = $fecha_apertura;

        return $this;
    }

    public function getApellidoParterno()
    {
        return $this->container['apellido_parterno'];
    }

    public function setApellidoParterno($apellido_parterno)
    {
        $this->container['apellido_parterno'] = $apellido_parterno;

        return $this;
    }

    public function getApellidoMaterno()
    {
        return $this->container['apellido_materno'];
    }

    public function setApellidoMaterno($apellido_materno)
    {
        $this->container['apellido_materno'] = $apellido_materno;

        return $this;
    }

    public function getNombres()
    {
        return $this->container['nombres'];
    }

    public function setNombres($nombres)
    {
        $this->container['nombres'] = $nombres;

        return $this;
    }

    public function getFechaNacimiento()
    {
        return $this->container['fecha_nacimiento'];
    }

    public function setFechaNacimiento($fecha_nacimiento)
    {
        $this->container['fecha_nacimiento'] = $fecha_nacimiento;

        return $this;
    }

    public function getRfc()
    {
        return $this->container['rfc'];
    }

    public function setRfc($rfc)
    {

        if (!is_null($rfc) && (!preg_match("/^([A-ZÑ,&amp;]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\\\\d]{3})?$/", $rfc))) {
            throw new \InvalidArgumentException("invalid value for $rfc when calling Peticion., must conform to the pattern /^([A-ZÑ,&amp;]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\\\\d]{3})?$/.");
        }

        $this->container['rfc'] = $rfc;

        return $this;
    }

    public function getDireccion()
    {
        return $this->container['direccion'];
    }

    public function setDireccion($direccion)
    {
        $this->container['direccion'] = $direccion;

        return $this;
    }

    public function getColoniaPoblacion()
    {
        return $this->container['colonia_poblacion'];
    }

    public function setColoniaPoblacion($colonia_poblacion)
    {
        $this->container['colonia_poblacion'] = $colonia_poblacion;

        return $this;
    }

    public function getDelegacionMunicipio()
    {
        return $this->container['delegacion_municipio'];
    }

    public function setDelegacionMunicipio($delegacion_municipio)
    {
        $this->container['delegacion_municipio'] = $delegacion_municipio;

        return $this;
    }

    public function getCiudad()
    {
        return $this->container['ciudad'];
    }

    public function setCiudad($ciudad)
    {
        $this->container['ciudad'] = $ciudad;

        return $this;
    }

    public function getEstado()
    {
        return $this->container['estado'];
    }

    public function setEstado($estado)
    {
        $allowedValues = $this->getEstadoAllowableValues();
        if (!is_null($estado) && !in_array($estado, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'estado', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['estado'] = $estado;

        return $this;
    }

    public function getCp()
    {
        return $this->container['cp'];
    }

    public function setCp($cp)
    {
        $this->container['cp'] = $cp;

        return $this;
    }

    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


