<?php
namespace AppBundle\Document;

use AppBundle\Model\Player as PlayerModel;

class Player
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $guid;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var bool
     */
    private $offline;

    /**
     * @param string $guid
     * @param string $name
     * @param string $email
     */
    public function __construct($guid, $name, $email)
    {
        $this->guid = $guid;
        $this->name = $name;
        $this->email = $email;
        $this->offline = false;
    }

    /**
     * @param PlayerModel $playerModel
     *
     * @return Player
     */
    public static function createFromModel(PlayerModel $playerModel) {
        return new self($playerModel->getGuid(), $playerModel->getName(), $playerModel->getEmail());
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getGuid(): string
    {
        return $this->guid;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return bool
     */
    public function isOffline(): bool
    {
        return $this->offline;
    }

    /**
     * @param bool $offline
     */
    public function setOffline(bool $offline)
    {
        $this->offline = $offline;
    }
}