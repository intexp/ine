<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use UserBundle\Entity\User;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Parcel
 *
 * @ORM\Table(name="parcel", options={"collate"="utf8_general_ci", "charset"="utf8"})
 * @ORM\Entity
 * @UniqueEntity(fields="trackingCode", message="This tracking code is already in use. It must be unique.")
 */
class Parcel
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \UserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="sender_id", referencedColumnName="id", nullable=true)
     */
    private $sender;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255)
     * @Assert\NotBlank(message = "receiver.first_name.not_blank")
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255)
     * @Assert\NotBlank(message = "receiver.last_name.not_blank")
     */
    protected $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    protected $country;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    protected $city;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    protected $address;

    /**
     * @var string
     *
     * @ORM\Column(name="zip_code", type="string", length=255, nullable=true)
     */
    protected $zipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    protected $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile", type="string", length=255, nullable=true)
     */
    protected $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="tracking_code", type="string", length=255)
     */
    private $trackingCode;

    /**
     * @var string
     *
     * @ORM\Column(name="length", type="decimal")
     */
    private $length;

    /**
     * @var string
     *
     * @ORM\Column(name="height", type="decimal")
     */
    private $height;

    /**
     * @var string
     *
     * @ORM\Column(name="width", type="decimal")
     */
    private $width;

    /**
     * @var string
     *
     * @ORM\Column(name="weight", type="decimal")
     */
    private $weight;

    /**
     * @var string
     *
     * @ORM\Column(name="volume", type="decimal")
     */
    private $volume;

    /**
     * @var string
     *
     * @ORM\Column(name="volume_weight", type="decimal")
     */
    private $volumeWeight;

    /**
     * @var string
     *
     * @ORM\Column(name="amount_due", type="decimal")
     */
    private $amountDue;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=255)
     */
    private $currency;

    /**
     * @var string
     *
     * @ORM\Column(name="content_value", type="decimal")
     */
    private $contentValue;

    /**
     * @var string
     *
     * @ORM\Column(name="content_value_currency", type="string", length=255)
     */
    private $contentValueCurrency;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", name="declaration_date")
     */
    private $declarationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", name="in_sender_office_date")
     */
    private $inSenderOfficeDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", name="send_date")
     */
    private $sendDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", name="in_destination_office_date")
     */
    private $inDestinationOfficeDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", name="delivery_date")
     */
    private $deliveryDate;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set trackingCode
     *
     * @param string $trackingCode
     * @return Parcel
     */
    public function setTrackingCode($trackingCode)
    {
        $this->trackingCode = $trackingCode;

        return $this;
    }

    /**
     * Get trackingCode
     *
     * @return string
     */
    public function getTrackingCode()
    {
        return $this->trackingCode;
    }

    /**
     * Set length
     *
     * @param string $length
     * @return Parcel
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return string
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set height
     *
     * @param string $height
     * @return Parcel
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set width
     *
     * @param string $width
     * @return Parcel
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set weight
     *
     * @param string $weight
     * @return Parcel
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set volume
     *
     * @param string $volume
     * @return Parcel
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;

        return $this;
    }

    /**
     * Get volume
     *
     * @return string
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * Set amountDue
     *
     * @param string $amountDue
     * @return Parcel
     */
    public function setAmountDue($amountDue)
    {
        $this->amountDue = $amountDue;

        return $this;
    }

    /**
     * Get amountDue
     *
     * @return string
     */
    public function getAmountDue()
    {
        return $this->amountDue;
    }

    /**
     * Set sender
     *
     * @param \UserBundle\Entity\User $sender
     * @return Parcel
     */
    public function setSender(User $sender = null)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get sender
     *
     * @return \UserBundle\Entity\User 
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Parcel
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Parcel
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Parcel
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Parcel
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Parcel
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     * @return Parcel
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string 
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Parcel
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     * @return Parcel
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string 
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set volumeWeight
     *
     * @param string $volumeWeight
     * @return Parcel
     */
    public function setVolumeWeight($volumeWeight)
    {
        $this->volumeWeight = $volumeWeight;

        return $this;
    }

    /**
     * Get volumeWeight
     *
     * @return string 
     */
    public function getVolumeWeight()
    {
        return $this->volumeWeight;
    }

    /**
     * Set currency
     *
     * @param string $currency
     * @return Parcel
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string 
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set contentValue
     *
     * @param string $contentValue
     * @return Parcel
     */
    public function setContentValue($contentValue)
    {
        $this->contentValue = $contentValue;

        return $this;
    }

    /**
     * Get contentValue
     *
     * @return string 
     */
    public function getContentValue()
    {
        return $this->contentValue;
    }

    /**
     * Set contentValueCurrency
     *
     * @param string $contentValueCurrency
     * @return Parcel
     */
    public function setContentValueCurrency($contentValueCurrency)
    {
        $this->contentValueCurrency = $contentValueCurrency;

        return $this;
    }

    /**
     * Get contentValueCurrency
     *
     * @return string 
     */
    public function getContentValueCurrency()
    {
        return $this->contentValueCurrency;
    }

    /**
     * Set declarationDate
     *
     * @param \DateTime $declarationDate
     * @return Parcel
     */
    public function setDeclarationDate($declarationDate)
    {
        $this->declarationDate = $declarationDate;

        return $this;
    }

    /**
     * Get declarationDate
     *
     * @return \DateTime 
     */
    public function getDeclarationDate()
    {
        return $this->declarationDate;
    }

    /**
     * Set inSenderOfficeDate
     *
     * @param \DateTime $inSenderOfficeDate
     * @return Parcel
     */
    public function setInSenderOfficeDate($inSenderOfficeDate)
    {
        $this->inSenderOfficeDate = $inSenderOfficeDate;

        return $this;
    }

    /**
     * Get inSenderOfficeDate
     *
     * @return \DateTime 
     */
    public function getInSenderOfficeDate()
    {
        return $this->inSenderOfficeDate;
    }

    /**
     * Set sendDate
     *
     * @param \DateTime $sendDate
     * @return Parcel
     */
    public function setSendDate($sendDate)
    {
        $this->sendDate = $sendDate;

        return $this;
    }

    /**
     * Get sendDate
     *
     * @return \DateTime 
     */
    public function getSendDate()
    {
        return $this->sendDate;
    }

    /**
     * Set inDestinationOfficeDate
     *
     * @param \DateTime $inDestinationOfficeDate
     * @return Parcel
     */
    public function setInDestinationOfficeDate($inDestinationOfficeDate)
    {
        $this->inDestinationOfficeDate = $inDestinationOfficeDate;

        return $this;
    }

    /**
     * Get inDestinationOfficeDate
     *
     * @return \DateTime 
     */
    public function getInDestinationOfficeDate()
    {
        return $this->inDestinationOfficeDate;
    }

    /**
     * Set deliveryDate
     *
     * @param \DateTime $deliveryDate
     * @return Parcel
     */
    public function setDeliveryDate($deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;

        return $this;
    }

    /**
     * Get deliveryDate
     *
     * @return \DateTime 
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }
}
