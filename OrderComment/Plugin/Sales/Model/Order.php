<?php
namespace Codilar\OrderComment\Plugin\Sales\Model;

use Magento\Backend\Model\Auth\Session;
use Magento\Sales\Api\Data\OrderStatusHistoryInterface;

/**
 * Class Order
 * @package Codilar\OrderComment\Plugin\Sales\Model
 */
class Order
{
    protected Session $authSession;

    public function __construct(
        Session $authSession
    ){
        $this->authSession = $authSession;
    }

    /**
     * Add a comment to order status history.
     *
     * add admin name in comment
     *
     * @param string $comment
     * @param bool|string $status
     * @param bool $isVisibleOnFront
     * @return array
     */
    public function beforeAddCommentToStatusHistory(string $comment, $status, bool
        $isVisibleOnFront): array
    {
        $username = $this->authSession->getUser()->getFirstName()." ".$this->authSession->getUser()->getLastName();
        $comment = $comment . " <span style='color:deeppink'>(By ".$username.")</span>";
        return [$comment, $status, $isVisibleOnFront];
    }
}
