<?php

namespace ChartItMD\Model\Proxy\__CG__\ChartItMD\Model\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Patient extends \ChartItMD\Model\Entity\Patient implements \Doctrine\ORM\Proxy\Proxy {
    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null) {
        $this->__initializer__ = $initializer;
        $this->__cloner__ = $cloner;
    }
    /**
     *
     */
    public function __clone() {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }
    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner() {
        return $this->__cloner__;
    }
    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer() {
        return $this->__initializer__;
    }
    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties() {
        return self::$lazyPropertiesDefaults;
    }
    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized() {
        return $this->__isInitialized__;
    }
    /**
     * Forces initialization of the proxy
     */
    public function __load() {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }
    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null) {
        $this->__cloner__ = $cloner;
    }
    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized) {
        $this->__isInitialized__ = $initialized;
    }
    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null) {
        $this->__initializer__ = $initializer;
    }
    /**
     *
     * @return array
     */
    public function __sleep() {
        if ($this->__isInitialized__) {
            return [
                '__isInitialized__',
                '' . "\0" . 'ChartItMD\\Model\\Entity\\Patient' . "\0" . 'createdAt',
                '' . "\0" . 'ChartItMD\\Model\\Entity\\Patient' . "\0" . 'dateOfBirth',
                '' . "\0" . 'ChartItMD\\Model\\Entity\\Patient' . "\0" . 'firstName',
                '' . "\0" . 'ChartItMD\\Model\\Entity\\Patient' . "\0" . 'gender',
                '' . "\0" . 'ChartItMD\\Model\\Entity\\Patient' . "\0" . 'heights',
                '' . "\0" . 'ChartItMD\\Model\\Entity\\Patient' . "\0" . 'id',
                '' . "\0" . 'ChartItMD\\Model\\Entity\\Patient' . "\0" . 'lastName',
                '' . "\0" . 'ChartItMD\\Model\\Entity\\Patient' . "\0" . 'updatedAt',
                '' . "\0" . 'ChartItMD\\Model\\Entity\\Patient' . "\0" . 'vitalSigns',
                '' . "\0" . 'ChartItMD\\Model\\Entity\\Patient' . "\0" . 'weights',
            ];
        }
        return [
            '__isInitialized__',
            '' . "\0" . 'ChartItMD\\Model\\Entity\\Patient' . "\0" . 'createdAt',
            '' . "\0" . 'ChartItMD\\Model\\Entity\\Patient' . "\0" . 'dateOfBirth',
            '' . "\0" . 'ChartItMD\\Model\\Entity\\Patient' . "\0" . 'firstName',
            '' . "\0" . 'ChartItMD\\Model\\Entity\\Patient' . "\0" . 'gender',
            '' . "\0" . 'ChartItMD\\Model\\Entity\\Patient' . "\0" . 'heights',
            '' . "\0" . 'ChartItMD\\Model\\Entity\\Patient' . "\0" . 'id',
            '' . "\0" . 'ChartItMD\\Model\\Entity\\Patient' . "\0" . 'lastName',
            '' . "\0" . 'ChartItMD\\Model\\Entity\\Patient' . "\0" . 'updatedAt',
            '' . "\0" . 'ChartItMD\\Model\\Entity\\Patient' . "\0" . 'vitalSigns',
            '' . "\0" . 'ChartItMD\\Model\\Entity\\Patient' . "\0" . 'weights',
        ];
    }
    /**
     *
     */
    public function __wakeup() {
        if (!$this->__isInitialized__) {
            $this->__initializer__ = function (Patient $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);
                $existingProperties = get_object_vars($proxy);
                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if (!array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };
        }
    }
    /**
     * {@inheritDoc}
     */
    public function getCreatedAt(): \DateTimeImmutable {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', []);
        return parent::getCreatedAt();
    }
    /**
     * {@inheritDoc}
     */
    public function getDateOfBirth(): \DateTime {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDateOfBirth', []);
        return parent::getDateOfBirth();
    }
    /**
     * {@inheritDoc}
     */
    public function getFirstName(): string {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFirstName', []);
        return parent::getFirstName();
    }
    /**
     * {@inheritDoc}
     */
    public function getGender(): \ChartItMD\Model\Entity\Gender {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGender', []);
        return parent::getGender();
    }
    /**
     * {@inheritDoc}
     */
    public function getHeights(): \Doctrine\Common\Collections\Collection {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHeights', []);
        return parent::getHeights();
    }
    /**
     * {@inheritDoc}
     */
    public function getId(): string {
        if ($this->__isInitialized__ === false) {
            return parent::getId();
        }
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);
        return parent::getId();
    }
    /**
     * {@inheritDoc}
     */
    public function getLastName(): string {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLastName', []);
        return parent::getLastName();
    }
    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt(): ?\DateTime {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedAt', []);
        return parent::getUpdatedAt();
    }
    /**
     * {@inheritDoc}
     */
    public function getVitalSigns(): \Doctrine\Common\Collections\Collection {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVitalSigns', []);
        return parent::getVitalSigns();
    }
    /**
     * {@inheritDoc}
     */
    public function getWeights(): \Doctrine\Common\Collections\Collection {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWeights', []);
        return parent::getWeights();
    }
    /**
     * {@inheritDoc}
     */
    public function preUpdate(): void {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'preUpdate', []);
        parent::preUpdate();
    }
    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;
    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;
    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];
}
