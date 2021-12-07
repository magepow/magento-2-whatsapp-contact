<?php

namespace Magepow\WhatsappContact\Model;

use Magento\Framework\View\Element\AbstractBlock;
use Magento\Config\Model\Config\CommentInterface;

class Comment extends AbstractBlock implements CommentInterface
{
    public function getCommentText($elementValue)
    {
        $url = $this->_urlBuilder->getUrl('whatsappcontact/contactperson/index');
        return "<span>For box button type, manage WhatsApp Chat Agents from </span><a href='$url'>here.</a>";
    }
}