<?php
/**
 * *
 *  * Magepow
 *  * @category    Magepow
 *  * @copyright   Copyright (c) 2021 Magepow (http://www.magepow.com/)
 *  * @license     http://www.magepow.com/license-agreement.html
 *  * @Author: Benjamin
 *  * @@Create Date: 11/05/21 2:42 PM
 *  * @@Modify Date: 11/26/21 2:40 PM
 *
 */
namespace Magepow\WhatsappContact\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

    /**
     * @var array
     */
    protected $configModule;
    protected $collectionFactory;
    protected $_store;


    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Store\Api\Data\StoreInterface $store,
        \Magepow\WhatsappContact\Model\ResourceModel\Whatsappcontact\CollectionFactory $collectionFactory
    )
    {   
        parent::__construct($context);
        $this->_store = $store;
        $this->configModule = $this->getConfig(strtolower($this->_getModuleName()));
        $this->collectionFactory = $collectionFactory;
    }

    public function getConfig($cfg='')
    {
        if($cfg) return $this->scopeConfig->getValue( $cfg, \Magento\Store\Model\ScopeInterface::SCOPE_STORE );
        return $this->scopeConfig;
    }

    public function getConfigModule($cfg='', $value=null)
    {
        $values = $this->configModule;
        if( !$cfg ) return $values;
        $config  = explode('/', $cfg);
        $end     = count($config) - 1;
        foreach ($config as $key => $vl) {
            if( isset($values[$vl]) ){
                if( $key == $end ) {
                    $value = $values[$vl];
                }else {
                    $values = $values[$vl];
                }
            } 

        }
        return $value;
    }

    public function positionButton()
    {   
        $top = $this->getConfigModule('general/top');
        $right = $this->getConfigModule('general/right');
        $left = $this->getConfigModule('general/left');
        $bottom = $this->getConfigModule('general/bottom');
        $button_type = $this->getConfigModule('general/button_type');
        $text = $this->getConfigModule('general/text');
        $close = $this->getConfigModule('general/close');
        $chatbox = $this->getConfigModule('general/chatboxtext');
        $data[]="";
        $data['title_top'] = '';
        $data['title_left'] = '';
        $data['title_right'] = '';

        $data['chat_top'] = '';
        $data['chat_right'] = '';
        $data['chat_left'] = '';
        $data['chat_bottom'] = '';

        if ($top <= '0' || $top == '') :
            $top = '';
        endif;
        if ($left <= '0' || $left == '') :
            $left = '';
        endif;
        if ($bottom <= '0') :
            $bottom = '25';
        endif;
        if (($left <= '0') && ($right <= '0')) :
            $right = '25';
        endif;
        $data['close_top'] = '';
        $data['close_right'] = '';
        $data['close_bottom'] = '';
        $data['close_left'] = '';
        $data['close_right_mobile'] = '';
        if ($button_type == "chatbox") :
            if ($chatbox == '') :
                $chatbox = 'Chat with us on WhatsApp';
            endif;
            if ($top != '' && $top > '0') :
                $data['chat_top'] = (int)($top) + 60;
            else :
                $data['chat_top'] = '';
                $data['chat_bottom'] = (int)($bottom) + 60;
            endif;
            if ($right != '' && $right > '0') :
                $data['chat_right'] = (int)($right);
                $left = '';
            else :
                $data['chat_right'] = '';
                $data['chat_left'] = (int)($left);
            endif;
        elseif ($button_type == "icon") :
            if ($text == '') :
                $text = 'WhatsApp Contact';
            endif;
            $data['title_top'] = '20';
            if ($right !='' && $right > '0'):
                $data['title_left'] = '60';
            endif;
            if($left != '' && $left > '0'):
                $data['title_right'] = '60';
            endif;
            if ($close) :
                if ($top != '' && $top > '0') :
                    $data['close_top'] = (int)($top) - 3;
                    $data['close_bottom'] = '';
                else :
                    $data['close_top'] = '';
                    $data['close_bottom'] = (int)($bottom) + 50;
                endif;
                if ($right != '' && $right > '0') :
                    $data['close_right'] = (int)($right) - 5;
                    $data['close_right_mobile'] = (int)($right) - 10;
                    $data['title_right'] = '60';
                    $data['close_left'] = '';
                else :
                    $data['close_left'] = (int)($left) + 55;
                    $data['title_left'] = '60';
                endif;
            endif;
        endif;
        return $data;
    }

    public function getDeviceType()
    {
        if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$_SERVER['HTTP_USER_AGENT'])
                ||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($_SERVER['HTTP_USER_AGENT'],0,4))) :
            $browser = "mobile";
        else :
            $browser = "desktop";
        endif;
        return $browser;
    }

    public function getChat()
    {
        try {
            $data = $this->getConfigModule('general/mobile_number');
            $default_message = $this->getConfigModule('general/default_message');
            $data .="&text=".$default_message;
            return $data;
        } catch (\Exception $e) {
            $this->printLog($e->getMessage());
            return "";
        }
    }
    public function printLog($log)
    {
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/Whatsapp.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info($log);
    }

}